<?php

namespace elfib\MouvementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use elfib\MouvementBundle\Entity\livraisonMP;
use elfib\MouvementBundle\Form\livraisonMPType;
use elfib\MouvementBundle\Entity\commandePF;
use elfib\MouvementBundle\Form\commandePFType;

class MouvementController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $livraisonMP = $em->getRepository('elfibMouvementBundle:livraisonMP')->findAll();
        $commandePF  = $em->getRepository('elfibMouvementBundle:commandePF')->findAll();
        $livraisonPF = $em->getRepository('elfibMouvementBundle:livraisonPF')->findAll();
        $commandeMP  = $em->getRepository('elfibMouvementBundle:commandeMP')->findAll();

        return $this->render('elfibMouvementBundle:Mouvement:index.html.twig',
          array(
            'livraisonMPs' => $livraisonMP,
            'commandePFs'  => $commandePF,
            'livraisonPFs' => $livraisonPF,
            'commandeMPs'  => $commandeMP,
          ));
    }

    public function addMPAction()
    {
        $livraisonMP = new livraisonMP();
        $livraisonMP->setDateCreation(new \DateTime());
        $livraisonMP->setDataExecution(new \DateTime());
        $form = $this->createForm(new livraisonMPType, $livraisonMP);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {

                $emplacement = $livraisonMP->getEmplacementArrive();
                $emplacement->setCurrentOccupancy($emplacement->getCurrentOccupancy() + $livraisonMP->getQuantite());
                $emplacement->setNomenclature($livraisonMP->getMatierePremiere());
                $emplacement->setDateEntre(new \DateTime());
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($livraisonMP, $emplacement);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'Bon de livraison ajouté !');
                return $this->redirect($this->generateUrl('elfib_mouvement_homepage'));
            }
            $this->get('session')->getFlashBag()->add('danger', 'Formulaire invalide');
        }

        return $this->render('elfibMouvementBundle:Mouvement:addMP.html.twig', array(
        "form" => $form->createView(),
      ));
    }

    public function commandePFAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandePF = new CommandePF();
        $commandePF->setDateCreation(new \DateTime());
        $commandePF->setDateCreation(new \DateTime());
        $commandePF->setTypeMouvement('demandeFabrication');
        //$commandePF->setExpediteur($em->getRepository('elfibCommercialBundle:Client')->findBy(array('id' => 3)));


        $form = $this->createForm(new commandePFType, $commandePF);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($commandePF);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'Bon de commande enregistré');
                return $this->redirect($this->generateUrl('elfib_mouvement_homepage'));
            }
        }

        return $this->render('elfibMouvementBundle:Mouvement:commandePF.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    //Get the emplacement where 
    public function getEmplacementDepart($commandePF)
    {
        $em = $this->getDoctrine()->getManager();
        $emplacement = $em->getRepository('elfibStockBundle:Emplacements')
                        ->findByNomenclature($commandePF->getNomenclature());

        die(var_dump($emplacement));
        return $emplacement;
    }

    public function fabricationAction(commandePF $commandePF)
    {
        // Récup la nomenclature correspondante.
        $nomenclature = $commandePF->getProduitFini();

        // Pour chaque produit à fabriqué
        $listeComposant = $nomenclature->getComposants();

        foreach ($listeComposant as $composant) {
            var_dump($composant->getMatierePremiere()->getLibelle());
            var_dump($composant->getQuantite());
        }
        die();
        // On retire des MP les composants
        // --> On chercher ou sont les MPs.
        // On remplit le stock de destination.

    }
}

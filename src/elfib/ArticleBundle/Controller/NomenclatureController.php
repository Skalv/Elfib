<?php

namespace elfib\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use elfib\ArticleBundle\Entity\Nomenclatures;
use elfib\ArticleBundle\Form\NomenclaturesType;
use elfib\ArticleBundle\Entity\MatierePremiere;
use elfib\ArticleBundle\Form\MatierePremiereType;
use elfib\ArticleBundle\Entity\ProduitFini;
use elfib\ArticleBundle\Form\ProduitFiniType;


class NomenclatureController extends Controller
{
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      /*Normenclature*/
      $matierePremieres = $em->getRepository('elfibArticleBundle:MatierePremiere')->findAll();
      $produitFinit = $em->getRepository('elfibArticleBundle:ProduitFini')->findAll();

      return $this->render('elfibArticleBundle:Nomenclatures:index.html.twig', array(
        'matierePremieres' => $matierePremieres,
        'produitFinit' => $produitFinit
      ));
    }

    public function ajoutPFAction()
    {
      $nomenclature = new ProduitFini();
      $form = $this->createForm(new ProduitFiniType, $nomenclature);
      
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          
          $nomenclature->setDateCreation(new \DateTime());
          $nomenclature->GenerateQRCode();

          foreach ($nomenclature->getComposants() as $composant) {
            $composant->setProduitFini($nomenclature);
            $em->persist($composant);
          }

          $em->persist($nomenclature);
          $em->flush();


          $this->get('session')->getFlashBag()->add('info', 'Produit ajouté.');
          return $this->redirect($this->generateUrl('elfib_nomenclature_homepage'));
        }
      }

      return $this->render('elfibArticleBundle:Nomenclatures:ajout.html.twig', array(
        "form" => $form->createView(),
        "type" => "produitFini"
      ));
    }

    public function ajoutMPAction()
    {
      $nomenclature = new MatierePremiere();
      $form = $this->createForm(new MatierePremiereType, $nomenclature);

      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          
          $nomenclature->setDateCreation(new \DateTime());
          $nomenclature->GenerateQRCode();

          $em->persist($nomenclature);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Matière première ajouté.');
          return $this->redirect($this->generateUrl('elfib_nomenclature_homepage'));
        }
      }

      return $this->render('elfibArticleBundle:Nomenclatures:ajout.html.twig', array(
        "form" => $form->createView(),
        "type" => "matierePremiere"
      ));
    }

    public function desactiverAction() {
      $request = $this->get('request');
    }

    public function voirAction(Nomenclatures $nomenclature)
    {
      return $this->render('elfibArticleBundle:Nomenclatures:voir.html.twig', array(
        "nomenclature" => $nomenclature
      ));
    }
}

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

    public function ajoutAction($type)
    {
      if ($type == "produitFini") {
        $nomenclature = new ProduitFini();
        $form = $this->createForm(new ProduitFiniType, $nomenclature);
      } elseif ($type == "matierePremiere") {
        $nomenclature = new MatierePremiere();
        $form = $this->createForm(new MatierePremiereType, $nomenclature);
      }

      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $nomenclature->setDateCreation(new \DateTime());
          $em->persist($nomenclature);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Produit ajouté.');
          return $this->redirect($this->generateUrl('elfib_nomenclature_homepage'));
        }
      }

      return $this->render('elfibArticleBundle:Nomenclatures:ajout.html.twig', array(
        "form" => $form->createView(),
        "type" => $type
      ));
    }

    public function desactiverAction() {
      $request = $this->get('request');
    }
}

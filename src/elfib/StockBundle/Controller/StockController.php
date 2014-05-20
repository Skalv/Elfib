<?php

namespace elfib\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use elfib\StockBundle\Entity\Emplacements;
use elfib\StockBundle\Form\EmplacementsType;
use elfib\StockBundle\Entity\Magasins;
use elfib\StockBundle\Form\MagasinsType;

class StockController extends Controller
{
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();

      /* Magasins */
      $magasins = $em->getRepository('elfibStockBundle:Magasins')->findByActif(true);
      $magasin = new Magasins();
      $magasinForm = $this->createForm(new MagasinsType, $magasin, array(
        'action' => $this->generateUrl('elfib_magasin_ajout')
      ));

      /* Emplacement */
      $emplacements = $em->getRepository('elfibStockBundle:Emplacements')
        ->findByActif(true);
      $emplacement = new Emplacements();
      $emplacementForm = $this->createForm(new EmplacementsType, $emplacement, array(
        'action' => $this->generateUrl('elfib_emplacement_ajout')
      ));

      return $this->render('elfibStockBundle:Stock:index.html.twig', array(
        "magasins" => $magasins,
        "magasinForm" => $magasinForm->createView(),
        "emplacements" => $emplacements,
        'emplacementForm' => $emplacementForm->createView(),
      ));
    }

    /**
     * Emplacements
     */

    /* Ajout emplacement */
    public function emplacementAjoutAction()
    {
      $emplacement = new Emplacements();
      $form = $this->createForm(new EmplacementsType, $emplacement);
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $emplacement->setActif(true);
          $em->persist($emplacement);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Emplacement ajouté.');
          return $this->redirect($this->generateUrl('elfib_stock_homepage'));
        }
      }

      return $this->render('elfibCommercialBundle:Emplacements:_ajout.html.twig', array(
        "form" => $form->createView(),
        "action" => "Ajouter"
      ));
    }

    /*Modification emplacement*/
    public function emplacementModifierAction(Emplacements $emplacement)
    {
      $form = $this->createForm(new EmplacementsType, $emplacement);
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($emplacement);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Emplacement modifié.');
          return $this->redirect($this->generateUrl('elfib_stock_homepage'));
        }
      }

      return $this->render('elfibStockBundle:Emplacements:modifier.html.twig', array(
        "form" => $form->createView()
      ));
    }

    /*Supprimer emplacement*/
    public function emplacementSupprimerAction(Emplacements $emplacement)
    {
      $em  = $this->getDoctrine()->getManager();
      if ($emplacement->hasNomenclature()) {
        $this->get('session')->getFlashBag()->add('info', 'Cet emplacement n\'est pas vide !');
      } else {
        $em->remove($emplacement);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('info', 'Emplacement supprimé.');
      }

      return $this->redirect($this->generateUrl('elfib_stock_homepage'));
    }

    /**
     * Mouvements
     */

    /*Ajout mouvements*/
    public function mouvementAjoutAction()
    {
      $mouvement = new Mouvements();
      $form = $this->createForm(new EmplacementsType, $mouvement);
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($mouvement);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'mouvement éffectué.');
          return $this->redirect($this->generateUrl('elfib_stock_homepage'));
        }
      }

      return $this->render('elfibCommercialBundle:Emplacement:ajout.html.twig', array(
        "form" => $form->createView(),
        "action" => "Ajouter"
      ));
    }
}

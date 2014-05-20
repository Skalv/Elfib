<?php

namespace elfib\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use elfib\StockBundle\Entity\Magasins;
use elfib\StockBundle\Form\MagasinsType;

class MagasinController extends Controller
{
  /* Ajout d'un magasin */
  public function ajoutAction()
  {
    $magasin = new Magasins();
    $form = $this->createForm(new MagasinsType, $magasin);
    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $magasin->setActif(true);
        $em->persist($magasin);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Magasin ajouté.');
        return $this->redirect($this->generateUrl('elfib_stock_homepage'));
      }
    }

    return $this->render('elfibCommercialBundle:Magasin:ajout.html.twig', array(
      "form" => $form->createView(),
      "action" => "Ajouter"
    ));
  }

  /*Modification d'un magasin*/
  public function modifierAction(Magasins $magasin)
  {
    $form = $this->createForm(new MagasinsType, $magasin);
    $request = $this->get('request');
    if ($request->getMethod() == 'POST') {
      $form->bind($request);
      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($magasin);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Magasin modifié.');
        return $this->redirect($this->generateUrl('elfib_stock_homepage'));
      }
    }

    return $this->render('elfibStockBundle:Magasins:modifier.html.twig', array(
      "form" => $form->createView()
    ));
  }

  /*Désactivation d'un magasin*/
  public function desactiverAction(Magasins $magasin)
  {
    $em = $this->getDoctrine()->getManager();
    if ($magasin->hasEmplacement()) {
      $this->get('session')->getFlashBag()->add('error', 'Le magasin contient des emplacements.');
    } else {
      $magasin->setActif(false);
      $em->persist($magasin);
      $em->flush();
      
      $this->get('session')->getFlashBag()->add('info', 'Magasin désactivé.');
    }

    return $this->redirect($this->generateUrl('elfib_stock_homepage'));
  }

  /*activation d'un magasin*/
  public function activerAction(Magasins $magasin)
  {
    $em = $this->getDoctrine()->getManager();
    $magasin->setActif(true);
    $em->persist($magasin);
    $em->flush();

    $this->get('session')->getFlashBag()->add('info', 'Magasin activé.');
    return $this->redirect($this->generateUrl('elfib_stock_homepage'));
  }
}
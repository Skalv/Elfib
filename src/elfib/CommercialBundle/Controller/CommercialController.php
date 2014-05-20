<?php

namespace elfib\CommercialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use elfib\CommercialBundle\Entity\Fournisseurs;
use elfib\CommercialBundle\Form\FournisseursType;
use elfib\CommercialBundle\Entity\Clients;
use elfib\CommercialBundle\Form\ClientsType;

class CommercialController extends Controller
{
    /*Page d'accueil de l'application*/
    public function indexAction()
    {
      $name = 'Florent';
      return $this->render('elfibCommercialBundle:Commercial:index.html.twig', array('name' => $name));
    }

    /*
     * FOURNISSEURS
     */

    /*Page d'accueil des fournisseurs*/
    public function fournisseurIndexAction()
    {
      $fournisseurs = $this->getDoctrine()->getManager()
                      ->getRepository('elfibCommercialBundle:Fournisseurs')
                      ->findAll();

      return $this->render('elfibCommercialBundle:Fournisseur:index.html.twig',array(
        "fournisseurs" => $fournisseurs,
      ));
    }

    /* Ajout de fournisseur */
    public function fournisseurAjoutAction()
    {
      $fournisseur = new Fournisseurs();
      $form = $this->createForm(new FournisseursType, $fournisseur);
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $fournisseur->setActif(true);

          $em = $this->getDoctrine()->getManager();
          $em->persist($fournisseur);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Fournisseur ajouté.');
          return $this->redirect($this->generateUrl('elfib_commercial_fournisseur_index'));
        }
      }

      return $this->render('elfibCommercialBundle:Fournisseur:ajout.html.twig', array(
        "form" => $form->createView(),
        "action" => "Ajouter"
      ));
    }

    /*Modification d'un fournisseur*/
    public function fournisseurModifierAction(Fournisseurs $fournisseur)
    {
      $form = $this->createForm(new FournisseursType, $fournisseur);
      $request = $this->get('request');
      if ($request->getMethod() == "POST") {
        $form->bind($request);
        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($fournisseur);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Fournisseur modifié.');
          return $this->redirect($this->generateUrl('elfib_commercial_fournisseur_index'));
        }
      }

      return $this->render('elfibCommercialBundle:Fournisseur:ajout.html.twig', array(
        "action" => "Modifier",
        "form" => $form->createView()
      ));
    }

    /*Suppression d'un fournisseur*/
    public function fournisseurSupprimerAction(Fournisseurs $fournisseur)
    {
      $em = $this->getDoctrine()->getManager();
      $fournisseur->setActif(false);
      $em->persist($fournisseur);
      $em->flush();

      $this->get('session')->getFlashBag()->add('info', 'Fournisseur désactivé');
      return $this->redirect($this->generateUrl('elfib_commercial_fournisseur_index'));
    }

    /*Suppression d'un fournisseur*/
    public function fournisseurActiverAction(Fournisseurs $fournisseur)
    {
      $em = $this->getDoctrine()->getManager();
      $fournisseur->setActif(true);
      $em->persist($fournisseur);
      $em->flush();

      $this->get('session')->getFlashBag()->add('info', 'Fournisseur activé');
      return $this->redirect($this->generateUrl('elfib_commercial_fournisseur_index'));
    }


    /**
     * CLIENTS
     */

    /* Page d'acceuil des clients */
    public function clientIndexAction()
    {
      $clients = $this->getDoctrine()->getManager()
                      ->getRepository('elfibCommercialBundle:Clients')
                      ->findAll();

      return $this->render('elfibCommercialBundle:Client:index.html.twig',array(
        "clients" => $clients,
      ));
    }

    /* Ajout d'un client*/
    public function clientAjoutAction()
    {
      $client = new Clients();
      $client->setActif(false);
      $form = $this->createForm(new ClientsType, $client);
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $client->setActif(true);
          $em = $this->getDoctrine()->getManager();
          $em->persist($client);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Client ajouté.');
          return $this->redirect($this->generateUrl('elfib_commercial_client_index'));
        }
      }

      return $this->render('elfibCommercialBundle:Client:ajout.html.twig', array(
        "form" => $form->createView(),
        "action" => "Ajouter"
      ));
    }

    /* Modifier un client */
    public function clientModifierAction(Clients $client)
    {
      $form = $this->createForm(new ClientsType, $client);
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);
        if ($form->isValid()) {
          $client->setActif(true);

          $em = $this->getDoctrine()->getManager();
          $em->persist($client);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Client modifié.');
          return $this->redirect($this->generateUrl('elfib_commercial_client_index'));
        }
      }

      return $this->render('elfibCommercialBundle:Client:ajout.html.twig', array(
        "form" => $form->createView(),
        "action" => "Modifier"
      ));
    }

    /* Suppression d'un client */
    public function clientSupprimerAction(Clients $client)
    {
      $em = $this->getDoctrine()->getManager();
      $client->setActif(false);
      $em->persist($client);
      $em->flush();

      $this->get('session')->getFlashBag()->add('info', 'Client désactivé');
      return $this->redirect($this->generateUrl('elfib_commercial_client_index'));
    }

    /* Activation d'un client */
    public function clientActiverAction(Clients $client)
    {
      $em = $this->getDoctrine()->getManager();
      $client->setActif(true);
      $em->persist($client);
      $em->flush();

      $this->get('session')->getFlashBag()->add('info', 'Client activé');
      return $this->redirect($this->generateUrl('elfib_commercial_client_index'));
    }
}

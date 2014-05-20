<?php

namespace elfib\MouvementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MouvementController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $livraisonMP = $em->getRepository('elfibMouvementBundle:livraisonMP')->findAll();
        $commandePF = $em->getRepository('elfibMouvementBundle:commandePF')->findAll();
        $livraisonPF = $em->getRepository('elfibMouvementBundle:livraisonPF')->findAll();
        $commandeMP = $em->getRepository('elfibMouvementBundle:commandeMP')->findAll();

        return $this->render('elfibMouvementBundle:Mouvement:index.html.twig',
          array(
            'livraisonMPs' => $livraisonMP,
            'commandePFs'  => $commandePF,
            'livraisonPFs' => $livraisonPF,
            'commandeMPs'  => $commandeMP,
          ));
    }
}

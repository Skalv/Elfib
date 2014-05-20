<?php

namespace elfib\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('elfibArticleBundle:Default:index.html.twig', array('name' => $name));
    }
}

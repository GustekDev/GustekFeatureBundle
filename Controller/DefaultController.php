<?php

namespace Gustek\FeatureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GustekFeatureBundle:Default:index.html.twig', array('name' => $name));
    }
}

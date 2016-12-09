<?php

namespace SeaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $categories = $this->container->get('category_service')->getCategories();
        return $this->render('SeaBundle:Default:index.html.twig',
            array('categories' => $categories)
        );
    }

    public function signinAction()
    {
        return $this->render('SeaBundle:Default:signin.html.twig');
    }

    public function loginAction()
    {
        return $this->render('SeaBundle:Default:login.html.twig');
    }

    public function aproposAction()
    {
        return $this->render('SeaBundle:Default:apropos.html.twig');
    }
}

<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function getCategoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('SeaBundle:Category')->findBy(
            array(),
            array('name' => 'ASC')
        );
        return new Response($this->container->get('serializer')->serialize($categories, 'json'));
    }

    public function getCategoryAction($categoryId)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('SeaBundle:Category')->find($categoryId);
        if(!is_object($category)){
            throw $this->createNotFoundException();
        }
        return new Response($this->container->get('serializer')->serialize($category, 'json'));
    }
}

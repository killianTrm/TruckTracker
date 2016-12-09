<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('SeaBundle:User')->findBy(
            array(),
            array('name' => 'ASC')
        );
        return new Response($this->container->get('serializer')->serialize($users, 'json'));
    }

    public function getUserAction($userId)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('SeaBundle:User')->find($userId);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        return new Response($this->container->get('serializer')->serialize($user, 'json'));
    }

    public function deleteAction($userId){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('SeaBundle:User')->find($userId);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        $em->remove($user);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}

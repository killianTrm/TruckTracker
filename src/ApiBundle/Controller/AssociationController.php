<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AssociationController extends Controller
{
    public function getAssociationsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $associations = $em->getRepository('SeaBundle:Association')->findBy(
            array('validate' => true),
            array('category' => 'ASC')
        );
        return new Response($this->container->get('serializer')->serialize($associations, 'json'));
    }

    public function getAssociationAction($associationId)
    {
        $em = $this->getDoctrine()->getManager();
        $association = $em->getRepository('SeaBundle:Association')->find($associationId);
        if(!is_object($association)){
            throw $this->createNotFoundException();
        }
        return new Response($this->container->get('serializer')->serialize($association, 'json'));
    }

    public function postAssociationAction(Request $request)
    {
        $associationJSON = $request->request->get('association');
        $em = $this->getDoctrine()->getManager();
        $association = $em->getRepository('SeaBundle:Association')->find($id);
        $association->bind($associationJSON);

        $em->persist($association);
        $em->flush();

        return new Response($this->container->get('serializer')->serialize($association, 'json'), 200, array(
            'Content-Type' => 'application/json'
        ));
    }
}
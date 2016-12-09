<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    public function getAddressesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $addresses = $em->getRepository('SeaBundle:Address')->findBy(
            array(),
            array('city' => 'ASC')
        );
        return new Response($this->container->get('serializer')->serialize($addresses, 'json'));
    }

    public function getAddressAction($addressId)
    {
        $em = $this->getDoctrine()->getManager();
        $address = $em->getRepository('SeaBundle:Address')->find($addressId);
        if(!is_object($address)){
            throw $this->createNotFoundException();
        }
        return new Response($this->container->get('serializer')->serialize($address, 'json'));
    }
}

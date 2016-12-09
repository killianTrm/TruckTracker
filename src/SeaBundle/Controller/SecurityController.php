<?php
/**
 * Created by PhpStorm.
 * User: killian
 * Date: 20/10/2016
 * Time: 15:38
 */

namespace SeaBundle\Controller;

namespace Yoda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;
// ...

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
//        $session = $request->getSession();
//
//        // get the login error if there is one
//        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
//            $error = $request->attributes->get(
//                SecurityContextInterface::AUTHENTICATION_ERROR
//            );
//        } else {
//            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
//            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
//        }
//
//        return $this->render(
//            'AcmeSecurityBundle:Security:login.html.twig',
//            array(
//                // last username entered by the user
//                'last_username' => $session->get(SecurityContextInterface::LAST_USERNAME),
//                'error' => $error,
//            )
//        );
    }
}
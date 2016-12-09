<?php

namespace SeaBundle\Controller;

use SeaBundle\Entity\Association;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SeaBundle\Service\AssociationService;
use Symfony\Component\HttpFoundation\Request;

class AssociationController extends Controller
{
    public function listAction()
    {
        $associations = $this->container->get('association_service')->getAssociations();
        return $this->render('SeaBundle:Association:list.html.twig',
            array('associations' => $associations)
        );
    }

    public function detailsAction($associationId)
    {
        $association = $this->container->get('association_service')->getAssociation($associationId);
        return $this->render('SeaBundle:Association:details.html.twig',
            array('association' => $association)
        );
    }

    public function researchAction(Request $request)
    {
        $allAssociations = $this->container->get('association_service')->getAssociations();

        $name = $request->request->get('name');
        $zipcode = $request->request->get('zipcode');
        $category = $request->request->get('category');

        $associationsZipcode = array();
        $associationsName = array();
        $associationsCategory = array();
        $sameAssociationIdentifiers = array();

        if(!empty($name) && $name !== "" && !is_null($name)){
            foreach ($allAssociations as $association){
                if (strpos($association->getName(), $name) !== false){
                    array_push($associationsName, $association->getId());
                    //$associationsName[$association->getId()] = $association;
                }
            }
        }

        if(!empty($zipcode) && $zipcode !== "" && !is_null($zipcode)){
            foreach ($allAssociations as $association){
                if ($association->getAddress()->getZipcode() == $zipcode){
                    array_push($associationsZipcode, $association->getId());
                    //$associationsZipcode[$association->getId()] = $association;
                }
            }
        }

        if(!empty($category) && $category !== "" && !is_null($category)){
            foreach ($allAssociations as $association){
                if ($association->getCategory()->getId() == $category){
                    array_push($associationsCategory, $association->getId());
                    //$associationsCategory[$association->getId()] = $association;
                }
            }
        }

        if (!empty($associationsZipcode) && empty($sameAssociationIdentifiers)){
            $sameAssociationIdentifiers = array_merge($associationsZipcode, $sameAssociationIdentifiers);
        }

        if (!empty($associationsName) && empty($sameAssociationIdentifiers)){
            $sameAssociationIdentifiers = array_merge($associationsName, $sameAssociationIdentifiers);
        }
        else if(!empty($associationsName) && !empty($sameAssociationIdentifiers)){
            $sameAssociationIdentifiers = array_intersect($associationsName, $sameAssociationIdentifiers);
        }

        if (!empty($associationsCategory) && empty($sameAssociationIdentifiers)){
            $sameAssociationIdentifiers = array_merge($associationsCategory, $sameAssociationIdentifiers);
        }
        else if (!empty($associationsCategory) && !empty($sameAssociationIdentifiers)){
            $sameAssociationIdentifiers = array_intersect($associationsCategory, $sameAssociationIdentifiers);
        }

        $associations = array();

        foreach ($sameAssociationIdentifiers as $currentId){
            $currentAssociation = $this->container->get('association_service')->getAssociation($currentId);
            array_push($associations, $currentAssociation);
        }


        return $this->render('SeaBundle:Association:results.html.twig', array(
                'associations' => $associations,
            )
        );
    }

    public function newAction()
    {
        //TODO: Add id of current user connected
        return $this->render('SeaBundle:Association:new.html.twig');
    }

    public function createAction()
    {

    }
}

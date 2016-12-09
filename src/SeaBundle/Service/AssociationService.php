<?php

namespace SeaBundle\Service;

use SeaBundle\Entity\Association;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AssociationService
{

    /**
     * APIService
     *
     * @var ApiService
     */
    private $apiService = null;

    /**
     * Constructor
     *
     * @param ApiService          $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }


    /**
     * Get all associations
     *
     * @return array of associations
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function getAssociations()
    {
        $apiResponse = $this->apiService->get(
            'api_associations',
            array(),
            'json'
        );

        if ($apiResponse->getHttpCode() == 403) {
            throw new AccessDeniedHttpException();
        } else if ($apiResponse->getHttpCode() != 200) {
            throw new HttpException(500, "apiResponse httpcode : " . $apiResponse->getHttpCode());
        }

        $associationsApi = $apiResponse->getContent();
        $associations = array();
        foreach ($associationsApi as $currentAssociation) {
            $association = new Association();
            $association->bind($currentAssociation);
            array_push($associations, $association);
        }
        return $associations;
    }

    /**
     * Get specific association
     * @param $id
     * @return Association
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function getAssociation($id)
    {
        $apiResponse = $this->apiService->get(
            'api_association',
            array('associationId' => $id),
            'json'
        );

        if ($apiResponse->getHttpCode() == 403) {
            throw new AccessDeniedHttpException();
        } else if ($apiResponse->getHttpCode() != 200) {
            throw new HttpException(500, "apiResponse httpcode : " . $apiResponse->getHttpCode());
        }
        $associationApi = $apiResponse->getContent();
        $association = new Association();
        $association->bind($associationApi);

        return $association;
    }


    /**
     * Add care template in a specified client
     *
     * @param int               $teamId               team identifier
     * @param  SaveCaretemplate  $careTemplate        new care template
     * @param string            $locale               connected user locale
     * @param int               $connectedUserId      connected user identifier
     * @param string|null       $connectedUserCpsRole user CPS role (if CPS authenticated)
     *
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function createCareTemplate($teamId, SaveCareTemplate $careTemplate, $locale, $connectedUserId, $connectedUserCpsRole = null)
    {
        $apiResponse = $this->apiService->post(
            'team_care_templates',
            array(
                'teamId' => $teamId
            ),
            json_encode($careTemplate),
            true,
            $connectedUserId,
            $locale,
            $connectedUserCpsRole
        );

        if ($apiResponse->getHttpCode() == 403) {
            throw new AccessDeniedHttpException();
        } else if ($apiResponse->getHttpCode() != 200) {
            throw new HttpException(500, "apiResponse httpcode : " . $apiResponse->getHttpCode());
        }

        $response = $apiResponse->getContent();
        $careTemplateId = $response['id'];

        return $careTemplateId;
    }

    /**
     * Update data from a specific association
     *
     * @param UpdateAssociation  $updatedAssociation
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function updateAssociation($updatedAssociation)
    {
        $apiResponse = $this->apiService->put(
            'update_association',
            array(),
            json_encode($updatedAssociation),
            true
        );

        if ($apiResponse->getHttpCode() == 403) {
            throw new AccessDeniedHttpException();
        } else if ($apiResponse->getHttpCode() != 204) {
            throw new HttpException(500, "apiResponse httpcode : " . $apiResponse->getHttpCode());
        }
    }
}
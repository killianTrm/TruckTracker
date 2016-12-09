<?php

namespace SeaBundle\Service;

use SeaBundle\Entity\Category;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoryService
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
     * Get all Categories
     *
     * @return array of categories
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function getCategories()
    {
        $apiResponse = $this->apiService->get(
            'api_categories',
            array(),
            'json'
        );

        if ($apiResponse->getHttpCode() == 403) {
            throw new AccessDeniedHttpException();
        } else if ($apiResponse->getHttpCode() != 200) {
            throw new HttpException(500, "apiResponse httpcode : " . $apiResponse->getHttpCode());
        }

        $categoriesApi = $apiResponse->getContent();
        $categories = array();
        foreach ($categoriesApi as $currentCategory) {
            $category = new Category();
            $category->bind($currentCategory);
            array_push($categories, $category);
        }
        return $categories;
    }

    /**
     * Get specific category
     * @param $id
     * @return Category
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function getCategory($id)
    {
        $apiResponse = $this->apiService->get(
            'api_category',
            array('categoryId' => $id),
            'json'
        );

        if ($apiResponse->getHttpCode() == 403) {
            throw new AccessDeniedHttpException();
        } else if ($apiResponse->getHttpCode() != 200) {
            throw new HttpException(500, "apiResponse httpcode : " . $apiResponse->getHttpCode());
        }
        $categoryApi = $apiResponse->getContent();
        $category = new Category();
        $category->bind($categoryApi);

        return $category;
    }
}
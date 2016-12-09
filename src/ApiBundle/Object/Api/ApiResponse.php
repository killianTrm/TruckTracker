<?php


namespace ApiBundle\Object\Api;

/**
 * Class ApiResponse
 * This class represents the data returned by a call to an API
 */
class ApiResponse
{
    /**
     * @var mixed content : the content object (array, single string etc..)
     */
    private $content;

    /**
     * @var int the http code (e.g 200, 204, 403 etc..)
     */
    private $httpCode;

    /**
     * @var array containing HTTP headers
     */
    private $headers;


    /**
     * The default constructor
     *
     * @param mixed $content
     * @param int   $httpCode
     * @param array $headers
     */
    public function __construct($content, $httpCode, array $headers)
    {
        $this->content = $content;
        $this->httpCode = $httpCode;
        $this->headers = $headers;
    }


    /**
     * Set content
     *
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set http code
     *
     * @param int $httpCode
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
    }

    /**
     * Get Http code
     *
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * Set headers
     *
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
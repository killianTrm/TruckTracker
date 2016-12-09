<?php


namespace ApiBundle\Exception;


use RuntimeException;

/**
 * Class that represents an exception that can occurs in ApiService
 *
 * @package SeaBundle\Exception
 */
class ApiException extends RuntimeException
{

    /**
     * The HTTP Status CODE
     * @var string
     */
    private $statusCode;

    /**
     * @param string     $statusCode
     * @param null       $message
     * @param \Exception $previous
     * @param int        $code
     */
    public function __construct($statusCode, $message = null, \Exception $previous = null, $code = 0)
    {
        $this->statusCode = $statusCode;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Return the HTTP status CODE
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


}
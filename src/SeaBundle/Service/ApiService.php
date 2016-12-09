<?php


namespace SeaBundle\Service;


use ApiBundle\Exception\ApiException;
use ApiBundle\Object\Api\ApiResponse;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * This service provides methods to call the Sea REST API
 */
class ApiService
{
    /**
     * Router symfony
     * @var Router
     */
    private $router = null;

    /**
     * Logger Symfony
     * @var Logger
     */
    private $logger = null;

    /**
     * Objet CURL
     * @var resource
     */
    private $curl = null;

    /**
     * Url that refers to the core of Sea
     * @var string
     */
    private $backendUrl = null;

    /**
     * Backend proxy host
     * @var null|String
     */
    private $proxyHost = null;


    /**
     * Option CURL
     * @var array $options
     */
    private $options = array(
        // Include the header in the output
        CURLOPT_HEADER => true, // CURLOPT_HEADER
        // Return the transfer as a string of the return value of curl_exec()
        // instead of outputting it out directly.
        CURLOPT_RETURNTRANSFER => true, // CURLOPT_RETURNTRANSFER
        // Stop cURL from verifying the peer's certificate. Alternate
        // certificates to verify against can be specified with the CURLOPT_CAINFO
        // option or a certificate directory can be specified with the
        // CURLOPT_CAPATH option.
        CURLOPT_SSL_VERIFYPEER => false, // CURLOPT_SSL_VERIFYPEER
        // The maximum number of seconds to allow cURL functions to execute.
        CURLOPT_TIMEOUT => 60, // CURLOPT_TIMEOUT
    );

    /**
     * array of header
     * @var array
     */
    private $headers = array(
        'json' => 'Content-type: application/json',
        'plain' => 'Content-type: text/plain',
        'html' => 'Content-type: text/html',
        'file' => 'Content-type: multipart/form-data'
    );

    /**
     * Constructor
     *
     * @param Router $router             router
     * @param Logger $logger             logger
     * @param string $backendUrl         the Sea core's base URL
     * @param String $proxyHost          backend proxy host, if any
     */
    public function __construct($router, $logger, $backendUrl, $proxyHost)
    {
        $this->router = $router;
        $this->logger = $logger;
        $this->backendUrl = $backendUrl;
        $this->proxyHost = $proxyHost;
    }


    /**
     * Call API with GET method
     *
     * @param string  $routeName       : the desired route name defined in the routing file
     * @param array   $routeParameters : [optional] the route parameters (if any) default array()
     * @param string  $type            : [optional] type of returned data e.g json
     *
     * @return ApiResponse
     */
    public function get($routeName, array $routeParameters = array(), $type = 'json')
    {
        $method = 'GET';

        //Retrieve resource from routing
        $resource = $this->router->generate($routeName, $routeParameters);

        return $this->callApi($method, $this->generateApiUrl($resource), null, $type);
    }


    /**
     * Call API with POST method
     *
     * @param string  $routeName       : the desired route name defined in the routing file
     * @param array   $routeParameters : [optional] the route parameters (if any) default array()
     * @param string  $data            : the data to send
     * @param string  $type            : [optional] type of returned data e.g json
     *
     * @return ApiResponse
     */
    public function post($routeName, array $routeParameters = array(), $data = '', $type = 'json')
    {
        $method = 'POST';

        //Retrieve resource from routing
        $resource = $this->router->generate($routeName, $routeParameters);

        return $this->callApi($method, $this->generateApiUrl($resource), $data, $type);
    }

    /**
     * Call API with PUT method
     *
     * @param string  $routeName       : the desired route name defined in the routing file
     * @param array   $routeParameters : [optional] the route parameters (if any) default array()
     * @param string  $data            : the data to send
     * @param string  $type            : [optional] type of returned data e.g json
     *
     * @return ApiResponse
     */
    public function put($routeName, array $routeParameters = array(), $data = '', $type = 'json')
    {
        $method = 'PUT';

        //Retrieve resource from routing
        $resource = $this->router->generate($routeName, $routeParameters);

        return $this->callApi($method, $this->generateApiUrl($resource), $data, $type);
    }

    /**
     * Call API with DELETE method on $url
     *
     * @param string  $routeName       : the desired route name defined in the routing file
     * @param array   $routeParameters : the route parameters (if any) default array()
     *
     * @return ApiResponse
     */
    public function delete($routeName, array $routeParameters = array())
    {
        $method = 'DELETE';

        //Retrieve resource from routing
        $resource = $this->router->generate($routeName, $routeParameters);

        return $this->callApi($method, $this->generateApiUrl($resource), null);
    }

    /**
     * get CURL object
     *
     * @return resource <p>CURL object</p>
     */
    private function getCurl()
    {
        // creation of CURL
        if (empty($this->curl)) {
            $ch = curl_init();
            curl_setopt_array($ch, $this->options);
            $this->curl = $ch;
        }

        return $this->curl;
    }

    /**
     * Generate Url with route, parameters.
     *
     * @param string  $fullResource  : the requested resource (e.g /v1/my/path/12?key=value)
     *
     * @return string generated URL
     */
    private function generateApiUrl($fullResource)
    {
        //Add the server host base path to the resource
        $url = $this->backendUrl . $fullResource;

        // split path / query string
        $data = parse_url($url);

        //Transform query phrase in array
        if (isset($data["query"])) {
            $query = $data["query"];
            $pairs = array();
            parse_str($query, $pairs);
        } else {
            $query = "";
            $pairs = array();
        }

        foreach ($pairs as $name => $value) {
            $name = urldecode($name);
            $params[$name] = $value;
        }

        $extraParam = "";

        // build final URL
        if ($extraParam != "") {
            if ($query != "") {
                $url = $url . "&";
            } else {
                $url = $url . "?";
            }
            $url = $url . $extraParam;
        }

        return $url;
    }

    /**
     * Return true if the given string is json content false otherwise
     *
     * @param string $string : the string to check
     *
     * @return bool
     */
    private function isJson($string)
    {
        $isJson = false;

        if (!empty($string)) {
            json_decode($string);
            $isJson = (json_last_error() == JSON_ERROR_NONE);
        }

        return $isJson;
    }

    /**
     * Parses HTTP headers into an associative array.
     * origin : http://www.php.net/manual/en/function.http-parse-headers.php#112917
     *
     * @param string $header string containing HTTP headers
     *
     * @return array Returns an array on success or FALSE on failure.
     */
    private function http_parse_headers($header)
    {
        $retVal = array();
        $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
        foreach ($fields as $field) {
            if (preg_match('/([^:]+): (.+)/m', $field, $match)) {
                $match[1] = preg_replace_callback("/(?<=^|[\x09\x20\x2D])./", function ($matches) {
                    return strtoupper($matches[0]);
                }, strtolower(trim($match[1])));
                if (isset($retVal[$match[1]])) {
                    if (!is_array($retVal[$match[1]])) {
                        $retVal[$match[1]] = array($retVal[$match[1]]);
                    }
                    $retVal[$match[1]][] = $match[2];
                } else {
                    $retVal[$match[1]] = trim($match[2]);
                }
            }
        }

        return $retVal;
    }


    /**
     * Call the API of Sea core with the following parameters
     *
     * @param string $method <p>Method : POST, GET, PUT, DELETE</p>
     * @param string $url    <p>Url of the resource</p>
     * @param object $data   [optional] <p>Data to send</p>
     * @param string $type   [optional] <p>type of returned data e.g json</p>
     *
     * @return ApiResponse the response object returned by the call
     * @throws ApiException
     */
    private function callApi($method, $url, $data = null, $type = 'json')
    {
        $this->logger->debug("REQUEST : " . $url);
        $this->logger->debug("METHOD : " . $method);

        $ch = $this->getCurl();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, (string) $method);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        //Give the HTTP header
        $header = array($this->headers[$type]);

        //Set Accept-Language header with fr locale
            $header[] = 'Accept-Language: fr';

        //Set proxy mode if defined
        if (!empty($this->proxyHost)) {
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
            curl_setopt($ch, CURLOPT_PROXY, $this->proxyHost);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        //The answer content
        $answer = curl_exec($ch);

        //The HTTP returned code
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //The raw code returned by curl
        $curlErrorNo = curl_errno($ch);

        // Extract the first digit of the http_code
        $codeClass = substr((string) $code, 0);

        //Print some logs
        $this->logger->debug("ANSWER : " . $answer);
        $this->logger->debug("HTTPCODE : " . $code);
        $this->logger->debug("CURLERROR : " . $curlErrorNo);


        //Manage curlerror and HTTP 3XX, 5XX returned codes as an error
        if ($curlErrorNo !== 0 || $codeClass == '3' || $codeClass == '5') {
            throw new ApiException($code, "Error occured while calling Api.");
        }

        if (404 == $code || $answer === '') {
            //Consider giving an empty content with 404 codes
            $body = '';
            $headerArray = array();
        } else {
            //Separate body and header from response
            //(Works with HTTP/1.1 100 Continue before other headers)
            $parts = explode("\r\n\r\nHTTP/", $answer);
            $parts = (count($parts) > 1 ? 'HTTP/' : '') . array_pop($parts);
            list($headers, $body) = explode("\r\n\r\n", $parts, 2);

            //Parse response headers
            $headerArray = $this->http_parse_headers($headers);

            //Decode answer
            if ($this->isJson($body)) {
                $body = json_decode($body, true);
            }
        }

        //Construct Response with the HttpCode and the Body
        $apiResponse = new ApiResponse($body, $code, $headerArray);

        return $apiResponse;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 01/06/17
 * Time: 12:30
 */

namespace MaronlIt\Zoom\WebinarConnector\Client;


use MaronlIt\Zoom\WebinarConnector\Config\APIConfig;
use MaronlIt\Zoom\WebinarConnector\Log\APILogger;

class CurlAPIClient implements APIClient
{
    /**
     * @var APIConfig
     */
    private $config;
    /**
     * @var APILogger
     */
    private $logger;

    /**
     * CurlAPIClient constructor.
     * @param APIConfig $config
     * @param APILogger $logger
     */
    public function __construct(APIConfig $config, APILogger $logger)
    {
        //
        $this->config = $config;
        $this->logger = $logger;
    }

    public function makePostCall($endpoint, array $data)
    {
        $request_url = $this->config->getAPIBaseUrl() . $endpoint;

        $data['api_key'] = $this->config->getApiKey();
        $data['api_secret'] = $this->config->getApiSecret();
        $data['data_type'] = $this->config->getDataType();

        $postFields = http_build_query($data);

        $curl_call = curl_init();
        curl_setopt($curl_call, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_call, CURLOPT_URL, $request_url);
        curl_setopt($curl_call, CURLOPT_POST, 1);
        curl_setopt($curl_call, CURLOPT_POSTFIELDS, $postFields);

        $response = curl_exec($curl_call);

        $status = curl_getinfo($curl_call, CURLINFO_HTTP_CODE);

        if (!$response) {
            // always a post with standard hearder no custom header foresee now
            $this->logger->addLog($endpoint, $request_url, $postFields, array(), 'POST', $status, $response, curl_error($curl_call));
            return false;
        }
        /*Return the data in JSON format*/
        $this->logger->addLog($endpoint, $request_url, $postFields, array(), 'POST', $status, $response, curl_error($curl_call));
        return $response;
    }
}
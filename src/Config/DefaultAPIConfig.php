<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 01/06/17
 * Time: 12:17
 */

namespace MaronlIt\Zoom\WebinarConnector\Config;


class DefaultAPIConfig implements APIConfig
{
    private $apiBaseUrl;
    private $apiSecret;
    private $apiKey;
    private $apiDataType;

    public function __construct(array $params)
    {
        $this->apiBaseUrl = false;
        $this->apiSecret = false;
        $this->apiKey = false;
        $this->apiDataType = false;

        if(is_array($params) && array_key_exists('ZOOM_API_BASE_URL', $params)) {
            $this->apiBaseUrl = $params['ZOOM_API_BASE_URL'];
        }
        if(is_array($params) && array_key_exists('ZOOM_API_SECRET', $params)) {
            $this->apiSecret = $params['ZOOM_API_SECRET'];
        }
        if(is_array($params) && array_key_exists('ZOOM_API_KEY', $params)) {
            $this->apiKey = $params['ZOOM_API_KEY'];
        }
        if(is_array($params) && array_key_exists('ZOOM_API_DATA_TYPE', $params)) {
            $this->apiDataType = $params['ZOOM_API_DATA_TYPE'];
        }
    }

    public function getAPIBaseUrl()
    {
        return $this->apiBaseUrl;
    }

    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getDataType()
    {
        return $this->apiDataType;
    }
}
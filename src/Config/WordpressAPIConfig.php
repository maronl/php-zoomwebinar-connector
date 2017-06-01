<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 01/06/17
 * Time: 12:17
 */

namespace MaronlIt\Zoom\WebinarConnector\Config;


class WordpressAPIConfig implements APIConfig
{

    public function getAPIBaseUrl()
    {
        if (defined('ZOOM_API_BASE_URL')) {
            return ZOOM_API_BASE_URL;
        }
        return false;
    }

    public function getApiSecret()
    {
        if (defined('ZOOM_API_SECRET')) {
            return ZOOM_API_SECRET;
        }
        return false;
    }

    public function getApiKey()
    {
        if (defined('ZOOM_API_KEY')) {
            return ZOOM_API_KEY;
        }
        return false;
    }

    public function getDataType()
    {
        if (defined('ZOOM_API_DATA_TYPE')) {
            return ZOOM_API_DATA_TYPE;
        }
        return false;
    }
}
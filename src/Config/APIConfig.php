<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 01/06/17
 * Time: 12:13
 */

namespace MaronlIt\Zoom\WebinarConnector\Config;


interface APIConfig
{
    public function getAPIBaseUrl();
    public function getApiSecret();
    public function getApiKey();
    public function getDataType();
}
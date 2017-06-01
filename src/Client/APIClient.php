<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 01/06/17
 * Time: 12:25
 */

namespace MaronlIt\Zoom\WebinarConnector\Client;


interface APIClient
{
    public function makePostCall($endpoint, array $data);
}
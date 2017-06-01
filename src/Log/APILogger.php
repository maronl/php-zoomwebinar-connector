<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 04/04/17
 * Time: 09:48
 */

namespace MaronlIt\Zoom\WebinarConnector\Log;


interface APILogger
{
    public function addLog(
      $endpoint = '',
      $data = array(),
      $header = array(),
      $method = '',
      $response_status = '',
      $response = '',
      $error = ''
    );
}
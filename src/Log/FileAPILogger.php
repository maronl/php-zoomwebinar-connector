<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 04/04/17
 * Time: 09:48
 */

namespace MaronlIt\Zoom\WebinarConnector\Log;


class FileAPILogger implements APILogger
{

    /**
     * @var
     */
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function addLog($endpoint = '', $request_url = '', $data = '', $header = array(), $method = '', $response_status = '', $response = '', $error = '')
    {
        $logText = PHP_EOL . "[" . date('Y-m-d H:i:s') . "]";
        $logText .= PHP_EOL . "endpoint: " . $endpoint;
        $logText .= PHP_EOL . "request url: " . $request_url;
        $logText .= PHP_EOL . "request header: " . serialize($header);
        $logText .= PHP_EOL . "request data: " . $data;
        $logText .= PHP_EOL . "request method: " . $method;
        $logText .= PHP_EOL . "response status: " . $response_status;
        $logText .= PHP_EOL . "response data: " . $response;
        $logText .= PHP_EOL . "response error: " . $error;
        $logText .= PHP_EOL . '___________________________________';
        $logText .= PHP_EOL;

        file_put_contents($this->fileName, $logText, FILE_APPEND);
    }

}
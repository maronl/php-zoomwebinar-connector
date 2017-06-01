<?php
/**
 * Created by PhpStorm.
 * User: maronl
 * Date: 04/04/17
 * Time: 09:48
 */

namespace MaronlIt\Zoom\WebinarConnector\Log;


class WordpressMysqlAPILogger implements APILogger
{

    /**
     * @var
     */
    private $table_name;

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
    }

    public function addLog($endpoint = '', $request_url = '', $data = '', $header = array(), $method = '', $response_status = '', $response = '', $error = '')
    {
        global $wpdb;

        $sql = "INSERT INTO " . $wpdb->prefix . $this->table_name." 
            (request_endpoint, request_url, request_data, request_header, request_method, response_status, response, response_error)
            VALUES (%s, %s, %s, %s, %s, %s, %s, %s);
            ";

        $sql = $wpdb->prepare($sql, $endpoint, $request_url, $data, serialize($header), $method, $response_status, $response, $error);

        if ($sql) {
            $wpdb->query($sql);
        }

    }

}
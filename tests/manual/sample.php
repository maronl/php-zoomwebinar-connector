<?php

use MaronlIt\Zoom\WebinarConnector\Client\CurlAPIClient;
use MaronlIt\Zoom\WebinarConnector\Config\DefaultAPIConfig;
use MaronlIt\Zoom\WebinarConnector\Log\FileAPILogger;

include_once '../../vendor/autoload.php';

// configure api connection and log file
$configData = [
  'ZOOM_API_BASE_URL' => 'https://api.zoom.us/v1/',
  'ZOOM_API_SECRET' => 'wm8eOsWsuXdu8dbjCx7fFdqgmJj3o0WfzuGe',
  'ZOOM_API_KEY' => 'ho2UZbjESjqT12BdDIX6rg',
  'ZOOM_API_DATA_TYPE' => 'JSON'
];

$config = new DefaultAPIConfig($configData);
$logger = new FileAPILogger('api.log');
$client = new CurlAPIClient($config, $logger);

// test list upcoming webinar with registration mandatory
$getListWebinar = [
  'host_id' => 'qOWweBShQwGZjPoC6yVh8g',    // host id of who organize the webinar
  'page_size' => 10,                        // pagination
  'page_number' => 1
];

$upcomingWebinars = $client->makePostCall('webinar/list/registration', $getListWebinar);

// test make new registration for webinar
$registrationWebinar = [
  'id' => 746442357,                    // id webinar
  'email' => 'l.cmaroni77@gmail.com',    // participant email
  'first_name' => 'Fabio',              // participant first name
  'last_name' => 'Verdi'                // participant last name
];

$registration = $client->makePostCall('webinar/register', $registrationWebinar);



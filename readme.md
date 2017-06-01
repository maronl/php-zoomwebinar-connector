#PHP Zoom Webinar Connector

PHP library to intercat with zoom API  and manage your webinar functions (zoom.us).
You need to have a zoom account with the webinar plan active.


##PHP sample
here the code to test locally setting api configuration and log file manually

```php
// configure api connection and log file
$configData = [
  'ZOOM_API_BASE_URL' => 'https://api.zoom.us/v1/',
  'ZOOM_API_SECRET' => 'your-secret',
  'ZOOM_API_KEY' => 'your-key',
  'ZOOM_API_DATA_TYPE' => 'JSON'
];

$config = new DefaultAPIConfig($configData);
$logger = new FileAPILogger('api.log');
$client = new CurlAPIClient($config, $logger);

// test list upcoming webinar with registration mandatory
$getListWebinar = [
  'host_id' => 'your-host-id-for-webinars',    // host id of who organize the webinar
  'page_size' => 10,                        // pagination
  'page_number' => 1
];

$upcomingWebinars = $client->makePostCall('webinar/list/registration', $getListWebinar);

// test make new registration for webinar
$registrationWebinar = [
  'id' => 'id-existing-webinar',         // id webinar
  'email' => 'fabio.verdi@testmail.com', // participant email
  'first_name' => 'Fabio',               // participant first name
  'last_name' => 'Verdi'                 // participant last name
];

$registration = $client->makePostCall('webinar/register', $registrationWebinar);
```
##Wordpress
here the code to use in Wordpress

>NOTE: before use the code below in wordpress create the mysql log table and put api configuration in wp-config.php file

>NOTE: sql for log table is in sql folder sql/webinar-api-logs.sql (fix your prefix table if needed - wp_)

```php
$logger = new WordpressMysqlAPILogger('webinar_api_log');
$client = new CurlAPIClient($config, $logger);

// test list upcoming webinar with registration mandatory
$getListWebinar = [
  'host_id' => 'your-host-id-for-webinars',    // host id of who organize the webinar
  'page_size' => 10,                        // pagination
  'page_number' => 1
];

$upcomingWebinars = $client->makePostCall('webinar/list/registration', $getListWebinar);

// test make new registration for webinar
$registrationWebinar = [
  'id' => 'id-existing-webinar',         // id webinar
  'email' => 'fabio.verdi@testmail.com', // participant email
  'first_name' => 'Fabio',               // participant first name
  'last_name' => 'Verdi'                 // participant last name
];

$registration = $client->makePostCall('webinar/register', $registrationWebinar);
```

sample wp-config.php
```php
if ( !defined('ZOOM_API_BASE_URL') )
	define('ZOOM_API_BASE_URL', 'https://api.zoom.us/v1/');
if ( !defined('ZOOM_API_SECRET') )
	define('ZOOM_API_SECRET', 'your-secret');
if ( !defined('ZOOM_API_KEY') )
	define('ZOOM_API_KEY', 'your-key');
if ( !defined('ZOOM_API_DATA_TYPE') )
	define('ZOOM_API_DATA_TYPE', 'JSON');
```


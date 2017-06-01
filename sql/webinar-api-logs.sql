CREATE TABLE `wp_webinar_api_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_endpoint` varchar(255) NOT NULL,
  `request_url` varchar(255) NOT NULL,
  `request_data` mediumtext,
  `request_header` mediumtext,
  `request_method` varchar(15) DEFAULT NULL,
  `response_status` varchar(10) DEFAULT NULL,
  `response` mediumtext,
  `response_error` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

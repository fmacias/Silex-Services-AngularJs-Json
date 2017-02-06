<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__ . '/../templates');
$app['twig.options'] = array('cache' => __DIR__ . '/../var/cache/twig');

// Set your URL
$app['curl_url'] = 'http://yoururl.localhost';
$app['curl_url_message'] = $app['curl_url'] . '/sms/sent.json';
$app['curl_url_statistics'] = $app['curl_url'] . '/statistics.json';
$app['curl_url_countries'] = $app['curl_url'] . '/countries.json';
$app['curl_url_send'] = $app['curl_url'] . '/sms/send.json';
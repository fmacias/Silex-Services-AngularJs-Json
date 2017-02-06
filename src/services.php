<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/2/17
 * Time: 11:02 PM
 */
use MittoAG\CurlRequestor;
use MittoAG\Statistics;
use MittoAG\Messages;
use MittoAG\Countries;
use MittoAG\Sender;

/**
 * @return CurlRequestor
 */
$app['curl_requestor'] = function () {
    return new CurlRequestor();
};

/**
 * @param $app
 * @return Messages
 */
$app['messages'] = function ($app) {
    return new Messages($app['curl_requestor'], $app['curl_url_message']);
};

/**
 * @param $app
 * @return Statistics
 */
$app['statistics'] = function ($app) {
    return new Statistics($app['curl_requestor'], $app['curl_url_statistics']);
};

/**
 * @param $app
 * @return Countries
 */
$app['countries'] = function ($app) {
    return new Countries($app['curl_requestor'], $app['curl_url_countries']);
};

/**
 * @param $app
 * @return Sender
 */
$app['sender'] = function ($app) {
    return new Sender($app['curl_requestor'], $app['curl_url_send']);
};
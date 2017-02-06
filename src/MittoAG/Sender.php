<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/2/17
 * Time: 11:26 PM
 */

namespace MittoAG;


/**
 * Class Sender
 * @package MittoAG
 */
class Sender
{
    /**
     * @var CurlRequestor
     */
    private $_curlRequestor;
    /**
     * @var
     */
    private $_url;

    /**
     * Sender constructor.
     * @param CurlRequestor $curlRequestor
     * @param $url
     */
    public function __construct(CurlRequestor $curlRequestor, $url)
    {
        $this->_curlRequestor = $curlRequestor;
        $this->_url = $url;
    }

    /**
     * @param $from
     * @param $to
     * @param $message
     * @return mixed
     */
    public function send($from, $to, $message)
    {
        $url = $this->_url . '?' . http_build_query(['from' => $from, 'to' => $to, 'text' => $message]);
        return $this->_curlRequestor->get_url_contents($url, null, null);
    }
}
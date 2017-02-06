<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/3/17
 * Time: 4:35 AM
 */

namespace MittoAG;


/**
 * Class Countries
 * @package MittoAG
 */
class Countries
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
     * Countries constructor.
     * @param CurlRequestor $curlRequestor
     * @param $url
     */
    public function __construct(CurlRequestor $curlRequestor, $url)
    {
        $this->_curlRequestor = $curlRequestor;
        $this->_url = $url;
    }

    /**
     * @return mixed
     */
    public function getCountries()
    {
        return $this->_curlRequestor->get_url_contents($this->_url, null, null);
    }
}
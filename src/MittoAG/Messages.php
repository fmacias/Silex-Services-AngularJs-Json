<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/2/17
 * Time: 11:26 PM
 */

namespace MittoAG;


/**
 * Class Messages
 * @package MittoAG
 */
class Messages
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
     * Messages constructor.
     * @param CurlRequestor $curlRequestor
     * @param $url
     */
    public function __construct(CurlRequestor $curlRequestor, $url)
    {
        $this->_curlRequestor = $curlRequestor;
        $this->_url = $url;
    }

    /**
     * @param $dateTimeForm
     * @param $dateTimeTo
     * @param $skip
     * @param $take
     * @return mixed
     */
    public function getSentSMS($dateTimeForm, $dateTimeTo, $skip, $take)
    {
        $url = $this->_url . '?' . http_build_query(['dateTimeFrom' => $dateTimeForm, 'dateTimeTo' => $dateTimeTo,
                'skip' => $skip, 'take' => $take]);
        return $this->_curlRequestor->get_url_contents($url, null, null);
    }
}
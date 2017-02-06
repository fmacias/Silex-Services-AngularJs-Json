<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/3/17
 * Time: 3:45 AM
 */

namespace MittoAG;


/**
 * Class Statistics
 * @package MittoAG
 */
class Statistics
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
     * Statistics constructor.
     * @param CurlRequestor $curlRequestor
     * @param $url
     */
    public function __construct(CurlRequestor $curlRequestor, $url)
    {
        $this->_curlRequestor = $curlRequestor;
        $this->_url = $url;
    }

    /**
     * @param $dateFrom
     * @param $dateTo
     * @param $mccList
     * @return mixed
     */
    public function getStatistics($dateFrom, $dateTo, $mccList)
    {
        $url = $this->_url . '?' . http_build_query(['dateFrom' => $dateFrom, 'dateTo' => $dateTo, 'mccList' => $mccList]);
        return $this->_curlRequestor->get_url_contents($url, null, null);
    }
}
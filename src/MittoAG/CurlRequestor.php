<?php

/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 2/2/17
 * Time: 11:18 PM
 */
namespace MittoAG;

/**
 * Class CurlRequestor
 * @package MittoAG
 */
class CurlRequestor
{
    /**
     * @param $url
     * @param $UserId
     * @param $PassWord
     * @return mixed
     * @throws \Exception
     */
    public function get_url_contents($url, $UserId, $PassWord)
    {
        try {
            $url = preg_replace("/http:\/\//", "", $url);
            $url = 'http://' . $url;
            //
            file_put_contents('/tmp/curl.log', $url, FILE_APPEND);
            $cURLoptions = array(
                CURLOPT_RETURNTRANSFER => true, // return web page as an String
                CURLOPT_HEADER => false, // don't return headers in the output, but header also allow on curl_getinfo()
                CURLOPT_FOLLOWLOCATION => true, // follow redirects
                CURLOPT_ENCODING => "", // handle all encodings
                CURLOPT_USERAGENT => "free D.O.M.", // who am i
                CURLOPT_AUTOREFERER => true, // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                CURLOPT_TIMEOUT => 120, // timeout on response
                CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, $cURLoptions);

            if ((isset($UserId)) && (isset($PassWord))) {

                if (($UserId != NULL) || ($UserId != "")) {
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    curl_setopt($ch, CURLOPT_USERPWD, $UserId . ":" . $PassWord);
                }
            }

            $content = curl_exec($ch);
            $err = curl_errno($ch);
            $errmsg = curl_error($ch);
            $header = curl_getinfo($ch);

            curl_close($ch);
            if ($err != 0) {
                throw new \Exception(
                    "cURL returns an Error. Error: " .
                    $errmsg . "\n\t URL: " .
                    $url . "\n"
                );
                ## authentification required
            } else if ($header["http_code"] == 401) {
                throw new \Exception(
                    "Authentifications required! 
                        Provide the username and the password
                        [" . $UserId . ":" . $PassWord . "]\n"
                );
            } else if ($header["http_code"] != 200) {
                throw new \Exception(
                    "The URL could not be collected! 
                        Request Status: " . $header["http_code"] . "\n"
                );
            }
            return $content;
        } catch (\Exception $e) {
            file_put_contents('/tmp/curl.log', $e->getMessage(), FILE_APPEND);
            throw new \Exception(
                "File->get_url_contents: " . $e->getMessage() . "url: " . $url . "\n"
            );
        }
    }
}
<?php

require_once 'SocialShare/Exceptions.php';
require_once 'SocialShare/Facebook.php';
require_once 'SocialShare/Twitter.php';

class SocialShare
{

    // cURL variable
    public $ch;

    // Root of the API
    public $root = 'http://socialshare.nitishgundherva.me/api/v1/';

    // Debug
    public $debug = false;

    public function __construct()
	{
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'SocialShare-PHP/1.0.0');
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_HEADER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 100);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 600);

        $this->facebook = new SocialShare_Facebook($this);
        $this->twitter = new SocialShare_Twitter($this);
    }

    public function __destruct()
	{
        curl_close($this->ch);
    }

    /**
     * @param $url
     * @param $params
     * @param bool $post
     * @return string
     * @throws SocialShare_HttpError
     * @throws SocialShare_Error
     */
    public function call($url, $params, $post = false)
	{
        $ch = $this->ch;
		if($post)
		{
			curl_setopt($ch, CURLOPT_URL, $this->root . $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		}
		else
		{
			curl_setopt($ch, CURLOPT_URL, $this->root . $url .'?'. http_build_query($params));
		}
        curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);

        $start = microtime(true);
        $this->log('Call to ' . $this->root . $url . http_build_query($params));
        if($this->debug)
		{
            $curl_buffer = fopen('php://memory', 'w+');
            curl_setopt($ch, CURLOPT_STDERR, $curl_buffer);
        }

        $response_body = curl_exec($ch);
        $info = curl_getinfo($ch);
        $time = microtime(true) - $start;
        if($this->debug)
		{
            rewind($curl_buffer);
            $this->log(stream_get_contents($curl_buffer));
            fclose($curl_buffer);
        }
        $this->log('Completed in ' . number_format($time * 1000, 2) . 'ms');
        $this->log('Got response: ' . $response_body);

        if(curl_error($ch))
		{
            throw new SocialShare_HttpError("API call to $url failed: " . curl_error($ch));
        }
        $result = json_decode($response_body, true);
        if($result === null)
			throw new SocialShare_Error('We were unable to decode the JSON response from the SocialShare API: ' . $response_body);
        
        if($info['http_code'] != 200)
		{
            throw new SocialShare_Error('We received an unexpected error');
        }

        return $result;
    }

    /**
     * @param string $string
     * @return array|bool
     */
    public static function commaSeparated($string = '')
    {
        $values = explode(',', $string);
        $values = array_filter($values);
        $values = array_unique($values);
        if(isset($values[1]))
            return $values;
        else
            return false;
    }

    /**
     * @param $msg
     */
    public function log($msg)
	{
        if($this->debug)
			error_log($msg);
    }
}



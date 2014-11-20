<?php

/**
 * Class SocialShare_GooglePlus
 */
class SocialShare_GooglePlus {
    public function __construct(SocialShare $master) {
        $this->master = $master;
    }

    /**
     * @param array $links
     * @return array
     * @throws SocialShare_Error
     */
    public function shares($links = array()) {
        if(is_array($links))
        {
            $_params = array("links" => implode(',', $links));
            $output = $this->master->call('googleplus', $_params);
            $totalLinks = count($links);
            if($totalLinks == 0)
                throw new SocialShare_Error('Array of zero length passed');
            else if($totalLinks == 1)
                return array("link" => $output['response']['url'], "shares" => $output['response']['count']);
            else
            {
                $return = array();
                foreach($output['response'] as $response)
                {
                    $return[] = array("link" => $response['url'], "shares" => $response['count']);
                }
                return $return;
            }
        }
        else
            throw new SocialShare_Error('Array of zero length passed');
    }

    /**
     * @param array $links
     * @return int
     * @throws SocialShare_Error
     */
    public function totalShares($links = array()) {
        if(is_array($links))
        {
            $_params = array("links" => implode(',', $links));
            $output = $this->master->call('googleplus', $_params);
            return $output['shares'];
        }
        else
            throw new SocialShare_Error('Array should be passed');
    }

}
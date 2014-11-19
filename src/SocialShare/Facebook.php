<?php

class SocialShare_Facebook
{
    public function __construct(SocialShare $master) {
        $this->master = $master;
    }
	public function all($links = array()) {
		if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			$totalLinks = count($links);
			if($totalLinks == 0)
				throw new SocialShare_Error('Array of zero length passed');
			else if($totalLinks == 1)
			{
				$url = $output['response']['url'];
				unset($output['response']['url']);
				unset($output['response']['normalized_url']);
				unset($output['response']['comments_fbid']);
				unset($output['response']['commentsbox_count']);
				unset($output['response']['error']);
				return array("link" => $url, "data" => $output['response']);
			}
			else
			{
				$return = array();
				foreach($output['response'] as $response)
				{
					unset($response['url']);
					unset($response['normalized_url']);
					unset($response['comments_fbid']);
					unset($response['commentsbox_count']);
					unset($response['error']);
					$return[] = array("link" => $response['url'], "data" => $response);
				}
				return $return;
			}
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
    public function shares($links = array()) {
		if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			$totalLinks = count($links);
			if($totalLinks == 0)
				throw new SocialShare_Error('Array of zero length passed');
			else if($totalLinks == 1)
				return array("link" => $output['response']['url'], "shares" => $output['response']['share_count']);
			else
			{
				$return = array();
				foreach($output['response'] as $response)
				{
					$return[] = array("link" => $response['url'], "shares" => $response['share_count']);
				}
				return $return;
			}
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function likes($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			$totalLinks = count($links);
			if($totalLinks == 0)
				throw new SocialShare_Error('Array of zero length passed');
			else if($totalLinks == 1)
				return array("link" => $output['response']['url'], "likes" => $output['response']['like_count']);
			else
			{
				$return = array();
				foreach($output['response'] as $response)
				{
					$return[] = array("link" => $response['url'], "likes" => $response['like_count']);
				}
				return $return;
			}
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function comments($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			$totalLinks = count($links);
			if($totalLinks == 0)
				throw new SocialShare_Error('Array of zero length passed');
			else if($totalLinks == 1)
				return array("link" => $output['response']['url'], "comments" => $output['response']['comment_count']);
			else
			{
				$return = array();
				foreach($output['response'] as $response)
				{
					$return[] = array("link" => $response['url'], "comments" => $response['comment_count']);
				}
				return $return;
			}
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function clicks($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			$totalLinks = count($links);
			if($totalLinks == 0)
				throw new SocialShare_Error('Array of zero length passed');
			else if($totalLinks == 1)
				return array("link" => $output['response']['url'], "clicks" => $output['response']['click_count']);
			else
			{
				$return = array();
				foreach($output['response'] as $response)
				{
					$return[] = array("link" => $response['url'], "clicks" => $response['click_count']);
				}
				return $return;
			}
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }

	public function totalShares($links = array()) {
		if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			return $output['shares'];
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function totalAll($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			return array("shares" => $output['shares'], "likes" => $output['likes'], "comments" => $output['comments'], "clicks" => $output['clicks']);
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function totalLikes($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			return $output['likes'];
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function totalComments($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			return $output['comments'];
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
	
	public function totalClicks($links = array()) {
        if(is_array($links))
		{
			$_params = array("links" => implode(',', $links));
			$output = $this->master->call('facebook', $_params);
			return $output['clicks'];
		}
		else
			throw new SocialShare_Error('Array should be passed');
    }
}
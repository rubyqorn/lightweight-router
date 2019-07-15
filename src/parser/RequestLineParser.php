<?php 

namespace Lightweight\Parser;

class RequestLineParser extends Parser
{
	/**
	* @var string
	*/ 
	private $url;

	/**
	* Check url from reques line for it was
	* a string property and transform in 
	* array
	*
	* @param $url string
	*
	* @return url like array
	*/ 
	public function parse($url)
	{
		$this->url = null;

		if ($this->checkIsStringUrl($url)) {
			$this->url = $url;

			$parsedUrl = explode('/', rtrim($this->url, '/'));

			if (isset($parsedUrl['2'])) {
				return implode('/', $parsedUrl);
			}

			return $parsedUrl;
		}
	}

	/**
	* Check for passed url was a string property
	*
	* @param string
	*
	* @return string property
	*/ 
	protected function checkIsStringUrl($url)
	{
		if (is_string($url)) {
			return $url;
		}

		die('The passed url is not a string property');
	}
}
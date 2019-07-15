<?php 

namespace Lightweight\Parser;

use Lightweight\Parser\Parser;
use Lightweight\Parser\RegularExpressionHandler;

class RouteParser extends Parser
{
	/**
	* @var array
	*/ 
	private $url;

	/**
	* Check for url was a string property. Then we
	* use explode function for using in RegularExpressionHandler.
	* If regular was match with url from request line,
	* we check in array contains of regular expression,
	* and finally return url. And if this action was wrong,
	* return array without params
	*
	* @param $url string
	*
	* @return url string with params or array
	*/ 
	public function parse($url)
	{
		$this->url = null;

		if ($this->checkIsStringUrl($url)) {
			$this->url = $url;
			$this->url = explode('/', $this->url);

			$urlWithParams = RegularExpressionHandler::matchRouteWithRegExp($this->url);

			$url = explode('/', $urlWithParams);

			if (in_array('([0-9+])#', $url) || in_array('([a-zA-Z_-]+)#', $url)) {
				return $_GET['url'];
			}

			return $this->url;

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

		die('Passed url is not a string property');
	}
}
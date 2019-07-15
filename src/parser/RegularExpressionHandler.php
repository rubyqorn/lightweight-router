<?php 

namespace Lightweight\Parser;

class RegularExpressionHandler
{
	/**
	* @var string
	*/ 
	private static $params;

	/**
	* Check if array have an id or slug then we get it
	* and replace this on reqular expression. Also we use
	* implode function for transform array in string. This
	* we did for match route with url in request line which 
	* we do in matchRouteWithRegExp function
	*
	* @param $url array
	*
	* @return string with reqular expression
	*/ 
	private static function checkAndReplaceGetParams($url)
	{
		if (in_array('{id}', $url)) {
			$popedElement = array_pop($url);
			unset($popedElement);
			self::$params = '([0-9+])';
			$url = self::pushAndTransformArrayToString($url, self::$params);

			return "#$url#"; 	
		}

		if (in_array('{slug}', $url)) {
			$popedElement = array_pop($url);
			unset($popedElement);
			self::$params = '([a-zA-Z_-]+)';
			$url = self::pushAndTransformArrayToString($url, self::$params);

			return "#$url#";
		}
	}

	/**
	* Push in array regular expression and 
	* transform in string string property
	*
	* @param $url array
	* @param $params string
	*
	* @return string with regular expression
	*/ 
	private static function pushAndTransformArrayToString($url, $params)
	{
		array_push($url, self::$params);
		return implode('/', $url);
	}

	/**
	* Match url with regular expression
	*
	* @param $url string
	*
	* @return route with regular expression 
	*/ 
	public static function matchRouteWithRegExp($url)
	{
		$route = self::checkAndReplaceGetParams($url);

		if ($route == TRUE) {
			if (preg_match($route, $_GET['url'])) {
				return $route;
			} 
			die('Passed wrong regular expression');
		}
		
	}
}
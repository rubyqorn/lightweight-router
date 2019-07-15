<?php 

namespace Lightweight\Http\Traits;

trait HttpMethodsChecker
{
	/**
	* Check passed http method 
	*
	* @param $method string
	*
	* @return http requested method
	*/ 
	public static function checkHttpMethod($method)
	{
		if ($_SERVER['REQUEST_METHOD'] == $method) {
			return $_SERVER['REQUEST_METHOD'];
		}

		die('Wrong HTTP method');
	}	
}
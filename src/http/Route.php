<?php 

namespace Lightweight\Http;

use Lightweight\Http\RouteHandler;
use Lightweight\Http\Traits\HttpMethodsChecker;

class Route extends RouteHandler
{
	/**
	* Create route with GET HTTP method
	*
	* @param $url string
	* @param $controllerWithMethod string
	*
	* @return route with GET HTTP method
	*/ 
	public static function get($url, $controllerWithMethod)
	{
		if (HttpMethodsChecker::checkHttpMethod('GET')) {
			return self::routeHandler($url, $controllerWithMethod);
		}
	}

	/**
	* Create route with POST HTTP method
	*
	* @param $url string
	* @param $controllerWithMethod string
	*
	* @return route with POST HTTP method
	*/
	public static function post($url, $controllerWithMethod)
	{
		if (HttpMethodsChecker::checkHttpMethod('POST')) {
			return self::routeHandler($url, $controllerWithMethod);
		}
	}

	/**
	* Create route with PUT HTTP method
	*
	* @param $url string
	* @param $controllerWithMethod string
	*
	* @return route with PUT HTTP method
	*/
	public static function put($url, $controllerWithMethod)
	{
		if (HttpMethodsChecker::checkHttpMethod('PUT')) {
			return self::routeHandler($url, $controllerWithMethod);
		}
	}

	/**
	* Create route with DELETE HTTP method
	*
	* @param $url string
	* @param $controllerWithMethod string
	*
	* @return route with DELETE HTTP method
	*/
	public static function delete($url, $controllerWithMethod)
	{
		if (HttpMethodsChecker::checkHttpMethod('DELETE')) {
			return self::routeHandler($url, $controllerWithMethod);
		}
	}
}
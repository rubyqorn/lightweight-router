<?php 

namespace Lightweight\Http;

use Lightweight\Http\RouteHandler;

class Route extends RouteHandler
{
	public static function get($url, $controllerWithMethod)
	{
		self::routeHandler($url, $controllerWithMethod);
	}

	public static function post()
	{
		//
	}

	public static function put()
	{
		//
	}

	public static function delete()
	{
		//
	}
}
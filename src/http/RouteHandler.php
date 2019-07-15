<?php 

namespace Lightweight\Http;

use Lightweight\Parser\RequestLineParser;
use Lightweight\Parser\RouteParser;

class RouteHandler
{
	/**
	* @var object Lightweight\Parser\RouteParser
	*/ 
	private static $routeParser;

	/**
	* @var object Lightweight\Parser\RequestLineParser
	*/ 
	private static $requestLineParser;

	/**
	* Work with routes from request line 
	* and routes from config file
	*/ 
	public static function routeHandler($url)
	{
		self::$routeParser = new RouteParser();
		self::$requestLineParser = new RequestLineParser();
	}
}
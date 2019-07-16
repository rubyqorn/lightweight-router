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
	* @var string
	*/ 
	private static $controller;

	/**
	* @var string
	*/ 
	private static $method;

	/**
	* @var string
	*/ 
	private static $params;

	/**
	* Work with routes from request line 
	* and routes from config file
	*
	* @param $url string
	* @param $controllerWithMethod $string
	*
	* @return called controller methods
	*/ 
	public static function routeHandler($url, $controllerWithMethod)
	{
		self::$routeParser = new RouteParser();
		self::$requestLineParser = new RequestLineParser();

		//If request line is empty or equal '/'
		if (!isset($_GET['url'])) {
			self::$controller = 'Lightweight\Controllers\ExampleController';
			self::$controller = new self::$controller;
			self::$method = 'example';
			return call_user_func([self::$controller, self::$method]);
		}

		$parsedControllerWithMethod = self::parseControllerWithMethod($controllerWithMethod);

		if ($parsedControllerWithMethod == TRUE) {

			self::$controller = 'Lightweight\Controllers\\' . $parsedControllerWithMethod['0'];
			self::$params = null;

			// Check controller exists 
			if (self::checkControllerExists(self::$controller)) {
				self::$controller = new self::$controller;

				// Check method exists
				if (self::checkMethodExists(self::$controller, $parsedControllerWithMethod['1'])) {
					self::$method = $parsedControllerWithMethod['1'];
				}

				$parseUrl = explode('/', $_GET['url']);

				// Check param contains and if exists replace into array
				if (isset($parseUrl['1'])) {
					self::$params = [
						$parseUrl['1']
					];
				}


				$parseRoute = self::$routeParser->parse($url); 

				// Check route from route config file was like a route from request line
				if ($parseRoute == $_GET['url']) {

					// If params doesn't exists call controller method 
					if (self::$params == null) {
						return call_user_func([self::$controller, self::$method]);
					}

					return call_user_func_array([self::$controller, self::$method], self::$params);
				} 
			}
		}	
	}

	/**
	* Check class name was exists
	*
	* @param $className string
	*
	* @return exist class name
	*/ 
	private static function checkControllerExists($className)
	{
		if (is_string($className) && class_exists($className)) {
			return self::$controller = $className;
		}

		die('The passed param is not a string or class name doesn\'t exists');
	}

	/**
	* Check method exists
	*
	* @param $classObj object
	* @param $methodName string
 	*
 	* @return string with method name
	*/ 
	private static function checkMethodExists($classObj, $methodName)
	{
		if (is_object($classObj) && method_exists($classObj, $methodName)) {
			return self::$method = $methodName;
		}

		die('Passed params is not an object or method name doesn\'t exists');
	}

	/**
	* Parse string with class and method name
	*
	* @param $controllerWithMethod string
	*
	* @return parsed string
	*/ 
	private static function parseControllerWithMethod($controllerWithMethod)
	{
		if (is_string($controllerWithMethod) && isset($controllerWithMethod)) {
			return explode('@', $controllerWithMethod);
		}

		die('Passed param is not a string');
	}

}
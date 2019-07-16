<?php 

namespace Lightweight\Http\Traits;

trait HttpErrors
{
	/**
	* There you can pass your error http code 
	* and get error message
	*
	* @param $message string
	*
	* @return template with error message
	*/ 
	public static function errorMessage($message)
	{
		switch ($message) {
			case '400':
				$message = '400 Bad Request';
				break;
			case '404':
				$message = '404 Not Found';
				break;
			case '405':
				$message = '405 Method Not Allowed';
				break;
			case '408':
				$message = '408 Request Timeout';
				break;
			case '414':
				$message = '414 URI Too Long';
				break;
			case '429':
				$message = '429 Too Many Requests';
				break;
			case '452':
				$message = '452 Bad Sended Request';
				break;
			
			default:
				$message = 'Oooops something went wrong';
				break;
		}

		if (file_exists('src/errors/errors.php')) {
			return require 'src/errors/errors.php';
		} 

		die('Error template doesn\'t exists');
	}
}
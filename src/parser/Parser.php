<?php 

namespace Lightweight\Parser;

abstract class Parser
{
	/**
	* Parse passed url
	*
	* @param $url string
	*
	* @return parsed url 
	*/ 
	abstract public function parse($url);

	/**
	* Check for passed url was a string property
	*
	* @param string
	*
	* @return string property
	*/ 
	abstract protected function checkIsStringUrl($url);
}
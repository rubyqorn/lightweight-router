<?php 

namespace Lightweight\Controllers;

use Lightweight\Http\Traits\Http;

class ExampleController
{
	public function example($slug)
	{
		echo $slug;
	}
}
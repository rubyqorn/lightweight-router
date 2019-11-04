<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RouteHandlerTest extends TestCase
{
    public function test_parse_controller_with_method_return_array()
    {
        $reflection = new \ReflectionClass(\Lightweight\Http\RouteHandler::class);
        $method = $reflection->getMethod('parseControllerWithMethod');
        $method->setAccessible(true);

        $this->assertIsArray($method->invoke(
            new \Lightweight\Http\routehandler(),
            'ExampleController@example'
        ));
    }

    public function test_check_method_exists_return_string()
    {
        $routeHandler = new \Lightweight\Http\RouteHandler();

        $reflection = new \ReflectionClass(\Lightweight\Http\RouteHandler::class);
        $method = $reflection->getMethod('checkMethodExists');
        $method->setAccessible(true);

        $this->assertIsString($method->invoke($routeHandler, 
            new \Lightweight\Controllers\ExampleController, 'example'
        ));
    }

    public function test_check_controller_exists_return_string()
    {
        $reflection = new \ReflectionClass(\Lightweight\Http\RouteHandler::class);
        $method = $reflection->getMethod('checkControllerExists');
        $method->setAccessible(true);

        $this->assertIsString($method->invoke(
            new \Lightweight\Http\RouteHandler(),
            \Lightweight\Controllers\ExampleController::class
        ));
    }
}
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RouteParserTest extends TestCase
{
    public function test_check_is_string_url_return__string_property()
    {
        $reflection = new \ReflectionClass(\Lightweight\Parser\RouteParser::class);
        $method = $reflection->getMethod('checkIsStringUrl');
        $method->setAccessible(true);

        return $this->assertIsString($method->invoke(
            new \Lightweight\Parser\RouteParser(),
            '/tests/testcase'
        ));
    }

    public function test_parse_return_string_property()
    {
        $parser = new \Lightweight\Parser\RouteParser();

        $this->assertIsString($parser->parse('/route/([0-9]+)'));
        $this->assertIsString($parser->parse('/route/([a-zA-Z_-]+)'));
        $this->assertIsString($parser->parse('/route'));
        
    }
}
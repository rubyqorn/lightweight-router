<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RequestLineParserTest extends TestCase
{
    public function test_parse_return_string_or_array_property()
    {
        $requestParser = new \Lightweight\Parser\RequestLineParser();

        $this->assertIsString($requestParser->parse('/route/subroute/([0-9]+)'));
        $this->assertIsArray($requestParser->parse('route/subroute'));
    }
}
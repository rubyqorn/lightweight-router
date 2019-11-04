<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RegularExpressionHandlerTest extends TestCase
{
    public function test_match_route_with_reg_exp_return_string()
    {
        $parsedUrl = [
            '0' => 'route',
            '1' => 'subroute',
            '2' => '{id}'
        ];

        $_GET['url'] = 'route/subroute/2';

        $this->assertIsString(
            \Lightweight\Parser\RegularExpressionHandler::matchRouteWithRegExp($parsedUrl)
        );
    }

    public function test_push_and_transform_array_to_string_return_string()
    {
        $reflection = new \ReflectionClass(\Lightweight\Parser\RegularExpressionHandler::class);
        $method = $reflection->getMethod('pushAndTransformArrayToString');
        $method->setAccessible(true);

        $url = [
            'route', 'subroute', '{id}'
        ];

        $this->assertIsString($method->invoke(
            new \Lightweight\Parser\RegularExpressionHandler(),
            $url, '([0-9]+)'
        ));
    }

    public function test_check_and_replace_get_params_return_string()
    {
        $reflection = new \ReflectionClass(\Lightweight\Parser\RegularExpressionHandler::class);
        $method = $reflection->getMethod('checkAndReplaceGetParams');
        $method->setAccessible(true);

        $this->assertIsString($method->invoke(
            new \Lightweight\Parser\RegularExpressionHandler(),
            [
                'route', 'subroute', '{id}'
            ]
        ));

        $this->assertIsString($method->invoke(
            new \Lightweight\Parser\RegularExpressionHandler(),
            [
                'route', 'subroute', '{slug}'
            ]
        ));
    }


}
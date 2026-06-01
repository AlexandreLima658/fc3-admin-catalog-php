<?php

namespace tests\Unit;

use Core\Test;
use PHPUnit\Framework\TestCase;

class TestUnit extends TestCase
{
    public function test_call_method_foo()
    {
        $test = new Test();
        $response = $test->foo();

        $this->assertEquals('Hello, world', $response);
    }
}
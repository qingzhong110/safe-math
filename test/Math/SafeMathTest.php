<?php

namespace Test\Math;

use NewOne\Math\SafeMath;
use PHPUnit\Framework\TestCase;

class SafeMathTest extends TestCase
{
    public function testAdd()
    {
        $this->assertEquals(SafeMath::add("1", "2"), "3");
        $this->assertEquals(SafeMath::add("1e1", "2"), "12");
        $this->assertEquals(SafeMath::add("1e-1", "2"), "2.1");
    }

    public function testSub()
    {
        $this->assertEquals(SafeMath::sub("1", "2"), "-1");
        $this->assertEquals(SafeMath::sub("1e1", "2"), "8");
        $this->assertEquals(SafeMath::sub("1e-1", "2"), "-1.9");
    }

    public function testMul()
    {
        $this->assertEquals(SafeMath::mul("1", "2"), "2");
        $this->assertEquals(SafeMath::mul("1e1", "2"), "20");
        $this->assertEquals(SafeMath::mul("1e-1", "2"), "0.2");
    }

    public function testDiv()
    {
        $this->assertEquals(SafeMath::div("1", "2"), "0.5");
        $this->assertEquals(SafeMath::div("1e1", "2"), "5");
        $this->assertEquals(SafeMath::div("2", "1e-1"), "20");
    }

    public function testPow()
    {
        $this->assertEquals(SafeMath::pow("1", "2"), "1");
        $this->assertEquals(SafeMath::pow("1e1", "2"), "100");
        $this->assertEquals(SafeMath::pow("1e-1", "2"), "0.01");
    }

    public function testGt()
    {
        $this->assertEquals(SafeMath::gt("1", "2"), false);
        $this->assertEquals(SafeMath::gt("1", "1"), false);
        $this->assertEquals(SafeMath::gt("2", "1"), true);
    }

    public function testGte()
    {
        $this->assertEquals(SafeMath::gte("1", "2"), false);
        $this->assertEquals(SafeMath::gte("1", "1"), true);
        $this->assertEquals(SafeMath::gte("2", "1"), true);
    }

    public function testLt()
    {
        $this->assertEquals(SafeMath::lt("1", "2"), true);
        $this->assertEquals(SafeMath::lt("1", "1"), false);
        $this->assertEquals(SafeMath::lt("2", "1"), false);
    }

    public function testLte()
    {
        $this->assertEquals(SafeMath::lte("1", "2"), true);
        $this->assertEquals(SafeMath::lte("1", "1"), true);
        $this->assertEquals(SafeMath::lte("2", "1"), false);
    }

    public function testCmp()
    {
        $this->assertEquals(SafeMath::cmp("1", "2"), -1);
        $this->assertEquals(SafeMath::cmp("1", "1"), 0);
        $this->assertEquals(SafeMath::cmp("2", "1"), 1);
    }

    public function testFormat()
    {
        $this->assertEquals(SafeMath::format("1", "2"), "1");
        $this->assertEquals(SafeMath::format("1e1", "1"), "10");
        $this->assertEquals(SafeMath::format("1e+1", "1"), "10");
        $this->assertEquals(SafeMath::format("1e-1", "1"), "0.1");
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFormatException()
    {
        $this->assertEquals(SafeMath::format("1e-1e-1", "1"), "0.1");
    }
}

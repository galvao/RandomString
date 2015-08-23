<?php
require_once '../src/RandomString/RandomString.php';
class RandomStringTest extends PHPUnit_Framework_TestCase
{
    public function testLength()
    {
        $r = new RandomString(12, array('upperCase'));
        $this->assertEquals(strlen($r->result), 12);
    }

    public function testUppercaseOnly()
    {
        $r = new RandomString(12, array('upperCase'));
        $this->assertRegExp('/^[A-Z]+$/', $r->result);
    }

    public function testLowercaseOnly()
    {
        $r = new RandomString(12, array('lowerCase'));
        $this->assertRegExp('/^[a-z]+$/', $r->result);
    }

    public function testLettersOnly()
    {
        $r = new RandomString(12, array('upperCase', 'lowerCase'));
        $this->assertRegExp('/^[A-Z]+$/i', $r->result);
    }

    public function testNumbersOnly()
    {
        $r = new RandomString(12, array('numbers'));
        $this->assertRegExp('/^[0-9]+$/i', $r->result);
    }
}

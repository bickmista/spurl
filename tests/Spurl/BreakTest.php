<?php

Class SpurlSplitTest extends \PHPUnit_Framework_TestCase
{
  public function testStandardUrl()
  {
    $url = Spurl\Url::break('http://www.test.co.uk/example');
    $this->assertArrayHasKey('protocol', $url);
    $this->assertEquals($url['protocol'], 'http');
    $this->assertArrayHasKey('host', $url);
    $this->assertEquals($url['host'], 'www.test.co.uk');
    $this->assertArrayHasKey('path', $url);
    $this->assertEquals($url['path'], 'example');
  }

  public function testNewTldExtendedBreak()
  {
    $url = Spurl\Url::break('http://www.test.versicherung/example');
    $this->assertArrayHasKey('protocol', $url);
    $this->assertEquals($url['protocol'], 'http');
    $this->assertArrayHasKey('host', $url);
    $this->assertEquals($url['host'], 'www.test.versicherung');
    $this->assertArrayHasKey('path', $url);
    $this->assertEquals($url['path'], 'example');
  }

  public function testExtendedBreak()
  {
    $url = Spurl\Url::break('http://www.test.co.uk/example', true);
    $this->assertArrayHasKey('prefix', $url['host']);
    $this->assertEquals($url['host']['prefix'], 'www');
    $this->assertArrayHasKey('domain', $url['host']);
    $this->assertEquals($url['host']['domain'], 'test');
    $this->assertArrayHasKey('suffix', $url['host']);
    $this->assertEquals($url['host']['suffix'], 'co.uk');
  }

  public function testNewTldExtendedBreak()
  {
    $url = Spurl\Url::break('http://www.test.versicherung/example');
    $this->assertArrayHasKey('prefix', $url['host']);
    $this->assertEquals($url['host']['prefix'], 'www');
    $this->assertArrayHasKey('domain', $url['host']);
    $this->assertEquals($url['host']['domain'], 'test');
    $this->assertArrayHasKey('suffix', $url['host']);
    $this->assertEquals($url['host']['suffix'], 'versicherung');
  }
}

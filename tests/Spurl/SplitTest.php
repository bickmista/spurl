<?php

Class SpurlSplitTest extends \PHPUnit_Framework_TestCase
{
  public function testStandardUrl()
  {
    $url = Spurl\Url::split('http://www.test.com/example');
    $this->assertEquals($url, ['www', 'test', 'com']);
  }

  public function testNewTldLong()
  {
    $url = Spurl\Url::split('http://www.test.versicherung/example');
    $this->assertEquals($url, ['www', 'test', 'versicherung']);
  }

  public function testNewTldShort()
  {
    $url = Spurl\Url::split('http://www.test.moda/example');
    $this->assertEquals($url, ['www', 'test', 'moda']);
  }

  public function testNewTldAverage()
  {
    $url = Spurl\Url::split('http://www.test.center/example');
    $this->assertEquals($url, ['www', 'test', 'center']);
  }
}

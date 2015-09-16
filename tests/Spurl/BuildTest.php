<?php

Class SpurlBuildTest extends \PHPUnit_Framework_TestCase
{
  public function testUrlBuildArrays()
  {
    $url = Spurl\Url::build(['protocol' => 'https', 'host' => ['test', 'domain', 'co.uk'], 'path' => ['test', 'path', 'to', 'be', 'joined']]);
    $this->assertEquals($url, 'https://test.domain.spurl.co.uk/test/path/to/be/joined/');
  }
  public function testUrlBuildStrings()
  {
    $url = Spurl\Url::build(['protocol' => 'https', 'host' => ['test.domain', 'spurl', 'co.uk'], 'path' => 'test/path/to/be/joined']);
    $this->assertEquals($url, 'https://test.domain.spurl.co.uk/test/path/to/be/joined/');
  }
}

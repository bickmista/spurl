<?php

Class SpurlBuildTest extends \PHPUnit_Framework_TestCase
{
  public function testUrlBuildArrays()
  {
    $url = [
      'protocol' => 'https',
      'host' => [
        'prefix' => 'test.domain',
        'domain' => 'spurl',
        'suffix' => 'co.uk'
      ],
      'path' => [
        'test',
        'path',
        'to',
        'be',
        'joined'
      ]
    ];
    $result = Spurl\Url::build($url);
    $this->assertEquals($result, 'https://test.domain.spurl.co.uk/test/path/to/be/joined/');
  }
  public function testUrlBuildStrings()
  {
    $url = [
      'protocol' => 'https',
      'host' => 'test.domain.spurl.co.uk',
      'path' => 'test/path/to/be/joined'
    ];
    $result = Spurl\Url::build($url);
    $this->assertEquals($result, 'https://test.domain.spurl.co.uk/test/path/to/be/joined/');
  }
}

<?php

Class SpurlBuildTest extends \PHPUnit_Framework_TestCase
{
  public function testBuildUrl()
  {
    $url = Spurl\Url::build(['protocol' => 'https', 'subdomain' => ['test', 'domain'], 'domain' => 'spurl', 'tld' => ['co', 'uk'], 'Path' => ['test', 'path', 'to', 'be', 'joined']]);
    $this->assertEquals($url, 'https://test.domain.spurl.co.uk/test/path/to/be/joined/');
  }
}

<?php
namespace Spurl;

use Spurl\Config;

class Url
{
  private static $protocol = null;

  private static function process($w, $t, $www)
  {
    $domainTld = $t[0];
    $domainTldArray = explode('.', $domainTld, 2);

    $prefix = ($www === false ? trim(str_replace($domainTld, '', $w), '.') : 'www');
    $domain = $domainTldArray[0];
    $suffix = $domainTldArray[1];

    $splitUrl = [
      $prefix,
      $domain,
      $suffix,
    ];

    return $splitUrl;
  }

  public static function clean($url)
  {
    if (empty($url)) {
        return false;
    }
    $url = strtolower($url);
    $arr = array("http://" => "", "https://" => "");
    $website = strtr($url, $arr);
    preg_match("/([^\/\r\n]+)(\/[^\r\n]*)?/", $website, $domain);

    if (isset($domain[1])) {
        return $domain[1];
    }

    return false;
  }

  public static function split($url)
  {
    if (empty($url)) {
      return false;
    }

    $website = self::clean($url);
    $www = false;

    if ($website === false) {
      return $url;
    }

    if (strpos($website, 'www.') !== false) {
      $website = str_replace('www.', '', $website);
      $www = true;
    }

    if (preg_match("/[a-z0-9\-]{1,63}\.[a-z\.]{2,6}$/", $website, $domainTemp)) {
      return self::process($website, $domainTemp, $www);
    } elseif (preg_match("/[a-z0-9\-]{1,63}\.[a-z\.]{7,12}$/", $website, $domainTemp)) {
      return self::process($website, $domainTemp, $www);
    } else {
      return $website;
    }
  }

  public static function isValid($url)
  {
    return true;
  }

  public static function derefer($url)
  {
    return Dereferer . $url;
  }
}

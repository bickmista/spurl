<?php
namespace Spurl;

use Spurl\Config;

class Url
{
  public static function break($url, $full = false)
  {
    // Initial splitting of URL
    preg_match('/(?:(?<protocol>(?:http|ftp|irc)s?)?:\/\/)?(?:(?<user>[^:\n\r]+):(?<pass>[^@\n\r]+)@)?(?<host>(?:[^:\/\n\r]+)?)(?::(?<port>\d+))?\/?(?<path>[^?#\n\r]+)?\??(?<query>[^#\n\r]*)?\#?(?<anchor>[^\n\r]*)?/', $url, $parts);

    // Check if its a full split
    if ($full === false) {
      return array_filter($parts);
    }

    // Break down host
    if (preg_match("/[a-z0-9\-]{1,63}\.[a-z\.]{2,6}$/", $parts['host'], $domain)) {
    } elseif (preg_match("/[a-z0-9\-]{1,63}\.[a-z\.]{7,12}$/", $website, $domain)) {
    }

    $tld = $domain[0];
    $tldArray = explode('.', $tld, 2);

    $prefix = trim(str_replace($tld, '', $parts['host']), '.');
    $domain = $tldArray[0];
    $suffix = $tldArray[1];

    $splitUrl = [
      'prefix' => $prefix,
      'domain' => $domain,
      'suffix' => $suffix,
    ];

    $parts['host'] = $splitUrl;

    return array_filter($parts);
  }

  public static function build($parts)
  {
    $protocol = $parts['protocol'].'://';
    $domain = (gettype($parts['host']) === 'array' ? implode('.', $parts['host']) : $parts['host']) . '/';
    $path = (gettype($parts['path']) === 'array' ? implode('/', $parts['path']) : $parts['path']) . '/';
    return $protocol . $domain . $path;
  }

  public static function derefer($url)
  {
    return Dereferer . $url;
  }
}

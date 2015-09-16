# Spurl [![Build Status][travis-image]][travis-url] [![version][packagist-version]][packagist-url] [![Code Climate][codeclimate-quality]][codeclimate-url]

A URL manipulation library

## Description
A PHP Library that can break down and build URLs into/from an array.

##Implementations

### Current

* Breakdown URLs
* Build up URLs

### Planned

* Replace segments before build
* Shuffle segments before build (e.g. swap host.domain with path.2)

## Requirements

- PHP 5.4+

## Installation

### Using Composer

To install Spurl with Composer, just add the following to your composer.json file:

```json
{
    "require": {
        "bickmista/spurl": "0.*"
    }
}
```

or by running the following command:

```shell
composer require bickmista/spurl
```

## Usage

### General

#### Break

To break down a URL into segments pass it into our break function.

```php
$url = 'http://test.com/example/path?some=query#anchor';

$splitUrl = Spurl\Url::break($url);
```

#### Build



----

[travis-url]: https://travis-ci.org/bickmista/spurl
[travis-image]: https://travis-ci.org/bickmista/spurl.svg

[codeclimate-url]: https://codeclimate.com/github/bickmista/spurl
[codeclimate-quality]: https://codeclimate.com/github/bickmista/spurl/badges/gpa.svg

[packagist-url]: https://packagist.org/packages/bickmista/spurl
[packagist-version]: https://img.shields.io/packagist/v/bickmista/spurl.svg

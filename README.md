SocialShare API PHP Client
======================

## Simple example

```php
$socialShare = new SocialShare();
var_dump($socialShare->facebook->shares(arrya('http://github.com')));
```
Output:

```
Array
(
    [link] => http://github.com
    [shares] => 13105
)
```

## Features
* Support for Facebook
* Support for Twitter

## Installing

Check out [composer](http://www.getcomposer.org) for details about installing and running composer.

Then, add `linkorb/socialshare` to your project's `composer.json`:

```json
{
    "require": {
        "linkorb/socialshare": "dev-master"
    }
}
```



## Todo

* Add support for more platforms (Google Plus etc)


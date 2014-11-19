SocialShare API PHP Client
======================

## Simple example

```php
$socialShare = new SocialShare();
print_r('<pre>');
print_r($socialShare->facebook->shares(arrya('http://github.com')));
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

Then, add `linpar/socialshare` to your project's `composer.json`:

```json
{
    "require": {
        "linpar/socialshare": "dev-master"
    }
}
```



## Todo

* Add support for more platforms (Google Plus etc)


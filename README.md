SocialShare API PHP Client
======================

Features
============
* Support for Facebook.
* Support for Twitter.
* Fetch data for multiple URLs.
* Fetch total number of shares/comments/clicks/likes of multiple URLs on Facebook.
* Fetch combined total number of shares/comments/clicks/likes of multiple URLs on Facebook.
* Fetch total number of shares of multiple URLs on Twitter.

Simple example
============
1. Fetch number of shares/click/comments/likes of a URL on Facebook/Twitter (in case of shares).
```php
$socialShare = new SocialShare();
print_r('<pre>');
print_r($socialShare->facebook->shares(array('http://github.com'))); // Replace facebook with twitter to calculate shares on Twitter
print_r($socialShare->facebook->clicks(array('http://github.com')));
print_r($socialShare->facebook->comments(array('http://github.com')));
print_r($socialShare->facebook->likes(array('http://github.com')));
```
Output:

```
Array
(
    [link] => http://github.com
    [shares] => 13105
)
Array
(
    [link] => http://github.com
    [clicks] => 1
)
Array
(
    [link] => http://github.com
    [comments] => 3673
)
Array
(
    [link] => http://github.com
    [likes] => 5306
)
```

2. Fetch number of shares/click/comments/likes of multiple URLs on Facebook/Twitter (in case of shares).
```php
$socialShare = new SocialShare();
print_r('<pre>');
print_r($socialShare->facebook->shares(array('http://github.com', 'http://google.com'))); // Replace facebook with twitter to calculate shares on Twitter
print_r($socialShare->facebook->clicks(array('http://github.com', 'http://google.com')));
print_r($socialShare->facebook->comments(array('http://github.com', 'http://google.com')));
print_r($socialShare->facebook->likes(array('http://github.com', 'http://google.com')));
```
Output:

```
Array
(
    [0] => Array
        (
            [link] => http://github.com
            [shares] => 13105
        )

    [1] => Array
        (
            [link] => http://google.com
            [shares] => 6511640
        )

)
Array
(
    [0] => Array
        (
            [link] => http://github.com
            [clicks] => 1
        )

    [1] => Array
        (
            [link] => http://google.com
            [clicks] => 265614
        )

)
Array
(
    [0] => Array
        (
            [link] => http://github.com
            [comments] => 3673
        )

    [1] => Array
        (
            [link] => http://google.com
            [comments] => 1804201
        )

)
Array
(
    [0] => Array
        (
            [link] => http://github.com
            [likes] => 5306
        )

    [1] => Array
        (
            [link] => http://google.com
            [likes] => 1540062
        )

)
```

3. Fetch combined total number of shares/clicks/comments/likes of multiple URLs on Facebook/Twitter (in case of shares).
```php
$socialShare = new SocialShare();
print_r('<pre>');
print_r($socialShare->facebook->totalShares(array('http://github.com', 'http://google.com')) ."\n"); // Replace facebook with twitter to calculate shares on Twitter
print_r($socialShare->facebook->totalClicks(array('http://github.com', 'http://google.com')) ."\n");
print_r($socialShare->facebook->totalComments(array('http://github.com', 'http://google.com')) ."\n");
print_r($socialShare->facebook->totalLikes(array('http://github.com', 'http://google.com')) ."\n");
```
Output:

```
6524745
265615
1807874
1545368
```


Easy Installation
============
Install with git
---
From the command line switch to the directory where dompdf will reside and run
the following commands:

```sh
git clone https://github.com/linpar/Socialshare-Client-PHP.git
git submodule init
git submodule update
```

Install with composer
---
To install with Composer, simply add the requirement to your `composer.json`
file:

```json
{
  "require" : {
    "linpar/socialshare": "dev-master"
  }
}
```

And run Composer to update your dependencies:

```bash
$ curl -sS http://getcomposer.org/installer | php
$ php composer.phar update
```

Before you can use the Composer installation of SocialShare in your application you
must include the Composer autoloader

```php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';
```


TODO
============

* Add support for more platforms (Google Plus etc)


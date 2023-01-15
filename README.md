# consolecommand

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**Note:** Replace ```SosninAnton``` ```SosninAnton``` ```https://github.com/SosninAnton``` ```i@sosnin-web.ru``` ```sosninanton``` ```consolecommand``` ```library for handling input arguments and parameters for custom uesr commands``` with their correct values in [README.md](README.md), [CHANGELOG.md](CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](LICENSE.md) and [composer.json](composer.json) files, then delete this line. You can run `$ php prefill.php` in the command line to make all replacements at once. Delete the file prefill.php as well.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
build/
docs/
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require sosninanton/consolecommand
```

## Usage

``` php
$skeleton = new sosninanton\consolecommand();
echo $skeleton->echoPhrase('Hello, League!');
```


## Testing

``` bash
$ composer test
```



## Security

If you discover any security related issues, please email i@sosnin-web.ru instead of using the issue tracker.

## Credits

- [SosninAnton][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sosninanton/consolecommand.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sosninanton/consolecommand/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/sosninanton/consolecommand.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/sosninanton/consolecommand.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sosninanton/consolecommand.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sosninanton/consolecommand
[link-travis]: https://travis-ci.org/sosninanton/consolecommand
[link-scrutinizer]: https://scrutinizer-ci.com/g/sosninanton/consolecommand/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/sosninanton/consolecommand
[link-downloads]: https://packagist.org/packages/sosninanton/consolecommand
[link-author]: https://github.com/SosninAnton
[link-contributors]: ../../contributors

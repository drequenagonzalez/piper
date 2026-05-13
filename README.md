# The pipe operator-first utility library

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/piper.svg?style=flat-square)](https://packagist.org/packages/spatie/piper)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/spatie/piper/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/spatie/piper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/spatie/piper/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/spatie/piper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/piper.svg?style=flat-square)](https://packagist.org/packages/spatie/piper)

Piper is a pipe operator-first PHP utility library for array and string manipulation. It ports Laravel's collection and string utility methods to standalone functions.

```php
use function Spatie\Piper\Arr\{filter, join, map, values};
use function Spatie\Piper\Str\{prefix, suffix};

[1, 2, 3, 4, 5, 6]
    |> filter(fn (int $i) => $i % 2 === 0)
    |> map(fn (int $i) => pow($i, 2))
    |> values()
    |> join(', ', ', and ')
    |> prefix('The winning numbers are ')
    |> suffix('.');

// "The winning numbers are 4, 16, and 36."
```

## Installation

You can install the package via composer:

```bash
composer require spatie/piper
```

## Documentation

All documentation is available [on our documentation site](https://spatie.be/docs/piper).

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/piper.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/piper)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source).

You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Testing

You can run the tests with:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

Piper is a port of Laravel's collection & string helpers. All methods, tests, and documentation examples are derived from the Laravel source. The porting strategy is described in [PORT.md](https://github.com/spatie/piper/blob/main/PORT.md).

- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

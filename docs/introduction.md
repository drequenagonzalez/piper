---
title: Introduction
weight: 1
---

Piper is a pipe operator-first PHP utility library for array and string manipulation. It ports Laravel's collection and string utility methods to standalone functions that work seamlessly with PHP 8.5's pipe operator.

It comes with array helpers:

```php
use function Spatie\Piper\Arr\{filter, map};

$popular = $posts
    |> filter(fn (Post $post) => $post->views > 1000)
    |> map(fn (Post $post) => $post->title);

// ["Claude Talk Small. Code Still Big.", …]
```

And string helpers:

```php
use function Spatie\Piper\Str\{lower, replace};

'Hello, world!'
    |> lower()
    |> replace('world', 'Piper');

// "hello, Piper!"
```

Since all functions work with primitives, you can mix and match:

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

## We have badges!

<section class="article_badges">
    <a href="https://packagist.org/packages/spatie/piper"><img src="https://img.shields.io/packagist/v/spatie/piper.svg?style=flat-square" alt="Latest Version"></a>
    <a href="https://github.com/spatie/piper/blob/main/LICENSE.md"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Software License"></a>
    <a href="https://github.com/spatie/piper/actions?query=workflow%3Arun-tests+branch%3Amain"><img src="https://img.shields.io/github/actions/workflow/status/spatie/piper/run-tests.yml?branch=main&label=tests&style=flat-square" alt="Tests"></a>
    <a href="https://packagist.org/packages/spatie/piper"><img src="https://img.shields.io/packagist/dt/spatie/piper.svg?style=flat-square" alt="Total Downloads"></a>
</section>

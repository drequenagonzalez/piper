---
title: Installation & setup
weight: 2
---

Piper requires PHP 8.5 or higher, which introduced the pipe operator (`|>`).

You can install Piper via Composer.

```bash
composer require spatie/piper
```

That's it. Piper exposes its functions in the `Spatie\Piper\Arr` and `Spatie\Piper\Str` namespaces. You can import any function and use it with the pipe operator.

```php
use function Spatie\Piper\Arr\{filter, map};

[1, 2, 3]
    |> filter(fn (int $i) => $i > 1)
    |> map(fn (int $i) => $i * 2);
```

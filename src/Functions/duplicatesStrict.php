<?php

namespace Spatie\Piper;

use Closure;

function duplicatesStrict(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): array {
        return $items |> duplicates($callback, true);
    };
}

<?php

namespace Spatie\Piper;

use Closure;

function whereNotInStrict(mixed $key, iterable $values): Closure
{
    return function (array $items) use ($key, $values): array {
        return $items |> whereNotIn($key, $values, true);
    };
}

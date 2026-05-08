<?php

namespace Spatie\Piper;

use Closure;

function whereInStrict(mixed $key, iterable $values): Closure
{
    return function (array $items) use ($key, $values): array {
        return $items |> whereIn($key, $values, true);
    };
}

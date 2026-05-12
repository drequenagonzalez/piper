<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function whereBetween(mixed $key, iterable $values): Closure
{
    return function (array $items) use ($key, $values): array {
        $values = array_values(normalize($values));

        return ($items |> where($key, '>=', $values[0])) |> where($key, '<=', $values[1]);
    };
}

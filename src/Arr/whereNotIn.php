<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataGet;
use function Spatie\Piper\Support\normalize;

function whereNotIn(mixed $key, iterable $values, bool $strict = false): Closure
{
    return function (array $items) use ($key, $values, $strict): array {
        $values = normalize($values);

        return $items |> reject(fn (mixed $item): bool => in_array(dataGet($item, $key), $values, $strict));
    };
}

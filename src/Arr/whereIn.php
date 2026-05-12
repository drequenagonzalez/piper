<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataGet;
use function Spatie\Piper\Support\normalize;

function whereIn(mixed $key, iterable $values, bool $strict = false): Closure
{
    return function (array $items) use ($key, $values, $strict): array {
        $values = normalize($values);

        return $items |> filter(fn (mixed $item): bool => in_array(dataGet($item, $key), $values, $strict));
    };
}

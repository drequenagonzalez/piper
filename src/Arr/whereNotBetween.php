<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataGet;
use function Spatie\Piper\Support\normalize;

function whereNotBetween(mixed $key, iterable $values): Closure
{
    return function (array $items) use ($key, $values): array {
        $values = array_values(normalize($values));

        return $items |> filter(fn (mixed $item): bool => dataGet($item, $key) < $values[0] || dataGet($item, $key) > $values[1]);
    };
}

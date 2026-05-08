<?php

namespace Spatie\Piper;

use Closure;

function whereNotBetween(mixed $key, iterable $values): Closure
{
    return function (array $items) use ($key, $values): array {
        $values = array_values(Support::normalize($values));

        return $items |> filter(fn (mixed $item): bool => Support::dataGet($item, $key) < $values[0] || Support::dataGet($item, $key) > $values[1]);
    };
}

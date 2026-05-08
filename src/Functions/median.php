<?php

namespace Spatie\Piper;

use Closure;

function median(string|int|array|null $key = null): Closure
{
    return function (array $items) use ($key): int|float|null {
        $values = $key === null ? $items : ($items |> pluck($key));
        $values = (($values |> reject(fn (mixed $item): bool => $item === null)) |> values());
        \sort($values);
        $count = \count($values);

        if ($count === 0) {
            return null;
        }

        $middle = intdiv($count, 2);

        return $count % 2 === 1 ? $values[$middle] : ($values[$middle - 1] + $values[$middle]) / 2;
    };
}

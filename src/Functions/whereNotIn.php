<?php

namespace Spatie\Piper;

use Closure;

function whereNotIn(mixed $key, iterable $values, bool $strict = false): Closure
{
    return function (array $items) use ($key, $values, $strict): array {
        $values = Support::normalize($values);

        return $items |> reject(fn (mixed $item): bool => in_array(Support::dataGet($item, $key), $values, $strict));
    };
}

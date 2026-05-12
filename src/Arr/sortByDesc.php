<?php

namespace Spatie\Piper\Arr;

use Closure;

function sortByDesc(mixed $callback, int $options = SORT_REGULAR): Closure
{
    return function (array $items) use ($callback, $options): array {
        return $items |> sortBy($callback, $options, true);
    };
}

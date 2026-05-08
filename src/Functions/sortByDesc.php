<?php

namespace Spatie\Piper;

use Closure;

function sortByDesc(mixed $callback, int $options = SORT_REGULAR): Closure
{
    return function (array $items) use ($callback, $options): array {
        return $items |> sortBy($callback, $options, true);
    };
}

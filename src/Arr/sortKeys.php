<?php

namespace Spatie\Piper\Arr;

use Closure;

function sortKeys(int $options = SORT_REGULAR, bool $descending = false): Closure
{
    return function (array $items) use ($options, $descending): array {
        $descending ? krsort($items, $options) : ksort($items, $options);

        return $items;
    };
}

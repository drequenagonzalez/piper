<?php

namespace Spatie\Piper\Arr;

use Closure;

function sortDesc(int $options = SORT_REGULAR): Closure
{
    return function (array $items) use ($options): array {
        arsort($items, $options);

        return $items;
    };
}

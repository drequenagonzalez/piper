<?php

namespace Spatie\Piper\Arr;

use Closure;

function sortKeysDesc(int $options = SORT_REGULAR): Closure
{
    return function (array $items) use ($options): array {
        return $items |> sortKeys($options, true);
    };
}

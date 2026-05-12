<?php

namespace Spatie\Piper\Arr;

use Closure;

function sortKeysUsing(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        uksort($items, $callback);

        return $items;
    };
}

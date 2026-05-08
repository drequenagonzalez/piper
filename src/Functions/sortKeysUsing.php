<?php

namespace Spatie\Piper;

use Closure;

function sortKeysUsing(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        uksort($items, $callback);

        return $items;
    };
}

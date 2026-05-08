<?php

namespace Spatie\Piper;

use Closure;

function sort(?callable $callback = null): Closure
{
    return function (array $items) use ($callback): array {
        $callback ? uasort($items, $callback) : asort($items);

        return $items;
    };
}

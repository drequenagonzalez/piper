<?php

namespace Spatie\Piper;

use Closure;

function tap(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        $callback($items);

        return $items;
    };
}

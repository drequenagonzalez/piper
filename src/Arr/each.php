<?php

namespace Spatie\Piper\Arr;

use Closure;

function each(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        foreach ($items as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $items;
    };
}

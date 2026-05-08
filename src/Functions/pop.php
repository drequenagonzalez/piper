<?php

namespace Spatie\Piper;

use Closure;

function pop(int $count = 1): Closure
{
    return function (array $items) use ($count): mixed {
        if ($count < 1) {
            return [];
        }

        if ($count === 1) {
            return array_pop($items);
        }

        return array_reverse(array_slice($items, -$count));
    };
}

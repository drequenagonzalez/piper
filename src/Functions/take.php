<?php

namespace Spatie\Piper;

use Closure;

function take(int $limit): Closure
{
    return function (array $items) use ($limit): array {
        if ($limit < 0) {
            return array_slice($items, $limit, abs($limit), true);
        }

        return array_slice($items, 0, $limit, true);
    };
}

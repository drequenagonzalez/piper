<?php

namespace Spatie\Piper;

use Closure;
use InvalidArgumentException;

function shift(int $count = 1): Closure
{
    return function (array $items) use ($count): mixed {
        if ($count < 0) {
            throw new InvalidArgumentException('Number of shifted items may not be less than zero.');
        }

        if ($items === []) {
            return null;
        }

        if ($count === 0) {
            return [];
        }

        if ($count === 1) {
            return array_shift($items);
        }

        return array_slice($items, 0, $count);
    };
}

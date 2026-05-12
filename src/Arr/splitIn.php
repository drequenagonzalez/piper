<?php

namespace Spatie\Piper\Arr;

use Closure;
use InvalidArgumentException;

function splitIn(int $numberOfGroups): Closure
{
    return function (array $items) use ($numberOfGroups): array {
        if ($numberOfGroups < 1) {
            throw new InvalidArgumentException('Number of groups must be at least 1.');
        }

        return array_chunk($items, (int) ceil(\count($items) / $numberOfGroups));
    };
}

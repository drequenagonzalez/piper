<?php

namespace Spatie\Piper;

use Closure;
use InvalidArgumentException;

function sliding(int $size = 2, int $step = 1): Closure
{
    return function (array $items) use ($size, $step): array {
        if ($size < 1) {
            throw new InvalidArgumentException('Size value must be at least 1.');
        }

        if ($step < 1) {
            throw new InvalidArgumentException('Step value must be at least 1.');
        }

        $chunks = [];
        $values = array_values($items);
        $count = \count($values);

        for ($offset = 0; $offset + $size <= $count; $offset += $step) {
            $chunks[] = array_slice($values, $offset, $size);
        }

        return $chunks;
    };
}

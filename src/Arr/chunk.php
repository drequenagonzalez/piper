<?php

namespace Spatie\Piper\Arr;

use Closure;
use InvalidArgumentException;

function chunk(int $size, bool $preserveKeys = false): Closure
{
    return function (array $items) use ($size, $preserveKeys): array {
        if ($size <= 0) {
            throw new InvalidArgumentException('Size value must be greater than zero.');
        }

        return array_chunk($items, $size, $preserveKeys);
    };
}

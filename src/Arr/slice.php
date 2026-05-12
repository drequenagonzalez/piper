<?php

namespace Spatie\Piper\Arr;

use Closure;

function slice(int $offset, ?int $length = null): Closure
{
    return function (array $items) use ($offset, $length): array {
        return array_slice($items, $offset, $length, true);
    };
}

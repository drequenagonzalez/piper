<?php

namespace Spatie\Piper;

use Closure;

function pad(int $size, mixed $value): Closure
{
    return function (array $items) use ($size, $value): array {
        return array_pad($items, $size, $value);
    };
}

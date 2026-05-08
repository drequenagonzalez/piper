<?php

namespace Spatie\Piper;

use Closure;

function values(): Closure
{
    return function (array $items): array {
        return array_values($items);
    };
}

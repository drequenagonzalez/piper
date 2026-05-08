<?php

namespace Spatie\Piper;

use Closure;

function reverse(): Closure
{
    return function (array $items): array {
        return array_reverse($items, true);
    };
}

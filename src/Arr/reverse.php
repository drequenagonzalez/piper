<?php

namespace Spatie\Piper\Arr;

use Closure;

function reverse(): Closure
{
    return function (array $items): array {
        return array_reverse($items, true);
    };
}

<?php

namespace Spatie\Piper\Arr;

use Closure;

function keys(): Closure
{
    return function (array $items): array {
        return array_keys($items);
    };
}

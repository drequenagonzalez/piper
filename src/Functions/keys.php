<?php

namespace Spatie\Piper;

use Closure;

function keys(): Closure
{
    return function (array $items): array {
        return array_keys($items);
    };
}

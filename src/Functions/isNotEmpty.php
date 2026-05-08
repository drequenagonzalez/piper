<?php

namespace Spatie\Piper;

use Closure;

function isNotEmpty(): Closure
{
    return function (array $items): bool {
        return $items !== [];
    };
}

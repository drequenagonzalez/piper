<?php

namespace Spatie\Piper\Arr;

use Closure;

function isNotEmpty(): Closure
{
    return function (array $items): bool {
        return $items !== [];
    };
}

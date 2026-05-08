<?php

namespace Spatie\Piper;

use Closure;

function count(): Closure
{
    return function (array $items): int {
        return \count($items);
    };
}

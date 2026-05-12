<?php

namespace Spatie\Piper\Arr;

use Closure;

function count(): Closure
{
    return function (array $items): int {
        return \count($items);
    };
}

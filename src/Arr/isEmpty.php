<?php

namespace Spatie\Piper\Arr;

use Closure;

function isEmpty(): Closure
{
    return function (array $items): bool {
        return $items === [];
    };
}

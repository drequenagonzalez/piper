<?php

namespace Spatie\Piper;

use Closure;

function isEmpty(): Closure
{
    return function (array $items): bool {
        return $items === [];
    };
}

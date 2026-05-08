<?php

namespace Spatie\Piper;

use Closure;

function all(): Closure
{
    return function (array $items): array {
        return $items;
    };
}

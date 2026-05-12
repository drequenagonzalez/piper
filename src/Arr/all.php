<?php

namespace Spatie\Piper\Arr;

use Closure;

function all(): Closure
{
    return function (array $items): array {
        return $items;
    };
}

<?php

namespace Spatie\Piper;

use Closure;

function flip(): Closure
{
    return function (array $items): array {
        return array_flip($items);
    };
}

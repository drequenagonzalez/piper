<?php

namespace Spatie\Piper\Arr;

use Closure;

function flip(): Closure
{
    return function (array $items): array {
        return array_flip($items);
    };
}

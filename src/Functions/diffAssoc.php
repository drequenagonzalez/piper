<?php

namespace Spatie\Piper;

use Closure;

function diffAssoc(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_diff_assoc($items, Support::normalize($other));
    };
}

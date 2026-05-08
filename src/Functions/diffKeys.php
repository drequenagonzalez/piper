<?php

namespace Spatie\Piper;

use Closure;

function diffKeys(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_diff_key($items, Support::normalize($other));
    };
}

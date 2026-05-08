<?php

namespace Spatie\Piper;

use Closure;

function only(mixed $keys): Closure
{
    return function (array $items) use ($keys): array {
        return array_intersect_key($items, array_flip(Support::normalize($keys)));
    };
}

<?php

namespace Spatie\Piper;

use Closure;

function diffUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_udiff($items, Support::normalize($other), $callback);
    };
}

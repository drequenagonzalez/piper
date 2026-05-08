<?php

namespace Spatie\Piper;

use Closure;

function diffAssocUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_diff_uassoc($items, Support::normalize($other), $callback);
    };
}

<?php

namespace Spatie\Piper;

use Closure;

function diffKeysUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_diff_ukey($items, Support::normalize($other), $callback);
    };
}

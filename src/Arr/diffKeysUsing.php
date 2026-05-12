<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function diffKeysUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_diff_ukey($items, normalize($other), $callback);
    };
}

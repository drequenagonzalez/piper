<?php

namespace Spatie\Piper\Arr;

use Closure;

function reduce(callable $callback, mixed $initial = null): Closure
{
    return function (array $items) use ($callback, $initial): mixed {
        $result = $initial;

        foreach ($items as $key => $value) {
            $result = $callback($result, $value, $key);
        }

        return $result;
    };
}

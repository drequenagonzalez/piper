<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\evaluate;

function first(?callable $callback = null, mixed $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        if ($callback === null) {
            foreach ($items as $item) {
                return $item;
            }

            return evaluate($default);
        }

        foreach ($items as $key => $item) {
            if ($callback($item, $key)) {
                return $item;
            }
        }

        return evaluate($default);
    };
}

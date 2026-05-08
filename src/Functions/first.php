<?php

namespace Spatie\Piper;

use Closure;

function first(?callable $callback = null, mixed $default = null): Closure
{
    return function (array $items) use ($callback, $default): mixed {
        if ($callback === null) {
            foreach ($items as $item) {
                return $item;
            }

            return Support::evaluate($default);
        }

        foreach ($items as $key => $item) {
            if ($callback($item, $key)) {
                return $item;
            }
        }

        return Support::evaluate($default);
    };
}

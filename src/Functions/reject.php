<?php

namespace Spatie\Piper;

use Closure;

function reject(mixed $callback = true): Closure
{
    return function (array $items) use ($callback): array {
        $useAsCallable = Support::useAsCallable($callback);

        return $items |> filter(function (mixed $value, mixed $key) use ($callback, $useAsCallable): bool {
            return $useAsCallable ? ! $callback($value, $key) : $value != $callback;
        });
    };
}

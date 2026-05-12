<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\useAsCallable;

function reject(mixed $callback = true): Closure
{
    return function (array $items) use ($callback): array {
        $useAsCallable = useAsCallable($callback);

        return $items |> filter(function (mixed $value, mixed $key) use ($callback, $useAsCallable): bool {
            return $useAsCallable ? ! $callback($value, $key) : $value != $callback;
        });
    };
}

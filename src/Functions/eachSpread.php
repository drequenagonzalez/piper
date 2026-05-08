<?php

namespace Spatie\Piper;

use Closure;

function eachSpread(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        return $items |> each(function (mixed $chunk, mixed $key) use ($callback): mixed {
            $chunk = Support::normalize($chunk);
            $chunk[] = $key;

            return $callback(...$chunk);
        });
    };
}

<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function mapSpread(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        return $items |> map(function (mixed $chunk, mixed $key) use ($callback): mixed {
            $chunk = normalize($chunk);
            $chunk[] = $key;

            return $callback(...$chunk);
        });
    };
}

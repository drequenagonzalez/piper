<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function select(mixed $keys): Closure
{
    return function (array $items) use ($keys): array {
        $keys = normalize($keys);

        return $items |> map(fn (mixed $item): array => (normalize($item) |> only($keys)));
    };
}

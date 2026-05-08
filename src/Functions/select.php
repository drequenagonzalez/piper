<?php

namespace Spatie\Piper;

use Closure;

function select(mixed $keys): Closure
{
    return function (array $items) use ($keys): array {
        $keys = Support::normalize($keys);

        return $items |> map(fn (mixed $item): array => (Support::normalize($item) |> only($keys)));
    };
}

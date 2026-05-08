<?php

namespace Spatie\Piper;

use Closure;

function value(string|int|array|null $key, mixed $default = null): Closure
{
    return function (array $items) use ($key, $default): mixed {
        $value = ($items |> first(fn (mixed $target): bool => Support::dataHas($target, $key)));

        return Support::dataGet($value, $key, $default);
    };
}

<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataGet;
use function Spatie\Piper\Support\dataHas;

function value(string|int|array|null $key, mixed $default = null): Closure
{
    return function (array $items) use ($key, $default): mixed {
        $value = ($items |> first(fn (mixed $target): bool => dataHas($target, $key)));

        return dataGet($value, $key, $default);
    };
}

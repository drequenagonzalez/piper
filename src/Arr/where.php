<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\operatorForWhere;

function where(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): array {
        return $items |> filter(operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments)));
    };
}

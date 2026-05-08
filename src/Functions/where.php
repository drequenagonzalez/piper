<?php

namespace Spatie\Piper;

use Closure;

function where(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): array {
        return $items |> filter(Support::operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments)));
    };
}

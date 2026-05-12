<?php

namespace Spatie\Piper\Arr;

use Closure;

function skip(int $count): Closure
{
    return function (array $items) use ($count): array {
        return $items |> slice($count);
    };
}

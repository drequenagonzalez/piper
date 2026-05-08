<?php

namespace Spatie\Piper;

use Closure;

function firstOrFail(?callable $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $marker = new \stdClass;
        $result = ($items |> first($callback, $marker));

        if ($result === $marker) {
            throw new ItemNotFoundException;
        }

        return $result;
    };
}

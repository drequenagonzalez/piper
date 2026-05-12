<?php

namespace Spatie\Piper\Arr;

use Closure;
use Spatie\Piper\Exceptions\ItemNotFound;

function firstOrFail(?callable $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $marker = new \stdClass;
        $result = ($items |> first($callback, $marker));

        if ($result === $marker) {
            throw new ItemNotFound;
        }

        return $result;
    };
}

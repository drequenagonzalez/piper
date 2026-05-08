<?php

namespace Spatie\Piper;

use Closure;

function sole(?callable $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $items = $callback === null ? $items : ($items |> filter($callback));

        if (\count($items) === 0) {
            throw new ItemNotFoundException;
        }

        if (\count($items) > 1) {
            throw new MultipleItemsFoundException;
        }

        return $items |> first();
    };
}

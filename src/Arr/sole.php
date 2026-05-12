<?php

namespace Spatie\Piper\Arr;

use Closure;
use Spatie\Piper\Exceptions\ItemNotFound;
use Spatie\Piper\Exceptions\MultipleItemsFound;

function sole(?callable $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $items = $callback === null ? $items : ($items |> filter($callback));

        if (\count($items) === 0) {
            throw new ItemNotFound;
        }

        if (\count($items) > 1) {
            throw new MultipleItemsFound;
        }

        return $items |> first();
    };
}

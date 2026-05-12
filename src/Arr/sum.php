<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\valueRetriever;

function sum(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $callback = $callback === null ? fn (mixed $value): mixed => $value : valueRetriever($callback);

        return $items |> reduce(fn (mixed $result, mixed $item, mixed $key): mixed => $result + $callback($item, $key), 0);
    };
}

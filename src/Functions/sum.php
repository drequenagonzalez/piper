<?php

namespace Spatie\Piper;

use Closure;

function sum(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $callback = $callback === null ? fn (mixed $value): mixed => $value : Support::valueRetriever($callback);

        return $items |> reduce(fn (mixed $result, mixed $item, mixed $key): mixed => $result + $callback($item, $key), 0);
    };
}

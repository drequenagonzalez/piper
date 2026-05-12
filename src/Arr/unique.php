<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\valueRetriever;

function unique(callable|string|int|array|null $key = null, bool $strict = false): Closure
{
    return function (array $items) use ($key, $strict): array {
        $callback = valueRetriever($key);
        $exists = [];

        return $items |> reject(function (mixed $item, mixed $itemKey) use ($callback, $strict, &$exists): bool {
            $id = $callback($item, $itemKey);

            if (in_array($id, $exists, $strict)) {
                return true;
            }

            $exists[] = $id;

            return false;
        });
    };
}

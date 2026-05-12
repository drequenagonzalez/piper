<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\valueRetriever;

function max(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $callback = valueRetriever($callback);
        $result = null;

        foreach ($items as $key => $item) {
            $value = $callback($item, $key);

            if ($value !== null && ($result === null || $value > $result)) {
                $result = $value;
            }
        }

        return $result;
    };
}

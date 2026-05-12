<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\valueRetriever;

function avg(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): int|float|null {
        $callback = valueRetriever($callback);
        $sum = 0;
        $count = 0;

        foreach ($items as $key => $item) {
            $value = $callback($item, $key);

            if ($value !== null) {
                $sum += $value;
                $count++;
            }
        }

        return $count > 0 ? $sum / $count : null;
    };
}

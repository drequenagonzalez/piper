<?php

namespace Spatie\Piper;

use Closure;

function avg(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): int|float|null {
        $callback = Support::valueRetriever($callback);
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

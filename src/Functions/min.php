<?php

namespace Spatie\Piper;

use Closure;

function min(callable|string|int|array|null $callback = null): Closure
{
    return function (array $items) use ($callback): mixed {
        $callback = Support::valueRetriever($callback);
        $result = null;

        foreach ($items as $key => $item) {
            $value = $callback($item, $key);

            if ($value !== null && ($result === null || $value < $result)) {
                $result = $value;
            }
        }

        return $result;
    };
}

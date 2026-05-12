<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\operatorForWhere;
use function Spatie\Piper\Support\valueRetriever;

function every(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        $callback = \count($arguments) === 1
                ? valueRetriever($arguments[0])
                : operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments));

        foreach ($items as $key => $item) {
            if (! $callback($item, $key)) {
                return false;
            }
        }

        return true;
    };
}

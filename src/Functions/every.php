<?php

namespace Spatie\Piper;

use Closure;

function every(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        $callback = \count($arguments) === 1
                ? Support::valueRetriever($arguments[0])
                : Support::operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments));

        foreach ($items as $key => $item) {
            if (! $callback($item, $key)) {
                return false;
            }
        }

        return true;
    };
}

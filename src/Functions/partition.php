<?php

namespace Spatie\Piper;

use Closure;

function partition(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): array {
        $callback = \count($arguments) === 1
                ? Support::valueRetriever($arguments[0])
                : Support::operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments));

        $passed = [];
        $failed = [];

        foreach ($items as $key => $item) {
            if ($callback($item, $key)) {
                $passed[$key] = $item;
            } else {
                $failed[$key] = $item;
            }
        }

        return [$passed, $failed];
    };
}

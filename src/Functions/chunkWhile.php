<?php

namespace Spatie\Piper;

use Closure;

function chunkWhile(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        $chunks = [];
        $chunk = [];

        foreach ($items as $key => $item) {
            if ($chunk !== [] && ! $callback($item, $key, $chunk)) {
                $chunks[] = $chunk;
                $chunk = [];
            }

            $chunk[$key] = $item;
        }

        if ($chunk !== []) {
            $chunks[] = $chunk;
        }

        return $chunks;
    };
}

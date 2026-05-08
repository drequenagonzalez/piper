<?php

namespace Spatie\Piper;

use Closure;
use InvalidArgumentException;

function nth(int $step, int $offset = 0): Closure
{
    return function (array $items) use ($step, $offset): array {
        if ($step < 1) {
            throw new InvalidArgumentException('Step value must be at least 1.');
        }

        $result = [];
        $position = 0;

        foreach (($items |> slice($offset)) as $item) {
            if ($position % $step === 0) {
                $result[] = $item;
            }

            $position++;
        }

        return $result;
    };
}

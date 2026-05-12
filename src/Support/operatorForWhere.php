<?php

namespace Spatie\Piper\Support;

use Stringable;

function operatorForWhere(callable|string|int|array|null $key, mixed $operator = null, mixed $value = null, int $argumentCount = 1): callable
{
    if (useAsCallable($key)) {
        return $key;
    }

    if ($argumentCount === 1) {
        $operator = '=';
        $value = true;
    } elseif ($argumentCount === 2) {
        $value = $operator;
        $operator = '=';
    }

    return function (mixed $item) use ($key, $operator, $value): bool {
        $retrieved = enumValue(dataGet($item, $key));
        $expected = enumValue($value);

        $strings = array_filter([$retrieved, $expected], fn (mixed $value): bool => is_string($value) || $value instanceof Stringable);

        if (\count($strings) < 2 && \count(array_filter([$retrieved, $expected], 'is_object')) === 1) {
            return in_array($operator, ['!=', '<>', '!=='], true);
        }

        return match ($operator) {
            '=', '==' => $retrieved == $expected,
            '!=', '<>' => $retrieved != $expected,
            '<' => $retrieved < $expected,
            '>' => $retrieved > $expected,
            '<=' => $retrieved <= $expected,
            '>=' => $retrieved >= $expected,
            '===' => $retrieved === $expected,
            '!==' => $retrieved !== $expected,
            '<=>' => ($retrieved <=> $expected) === 0,
            default => $retrieved == $expected,
        };
    };
}

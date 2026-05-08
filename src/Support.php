<?php

namespace Spatie\Piper;

use BackedEnum;
use Closure;
use JsonSerializable;
use Stringable;
use Traversable;
use UnitEnum;

class Support
{
    public static function normalize(mixed $items): array
    {
        if ($items === null) {
            return [];
        }

        if (is_array($items)) {
            return $items;
        }

        if ($items instanceof Traversable) {
            return iterator_to_array($items);
        }

        if ($items instanceof JsonSerializable) {
            $serialized = $items->jsonSerialize();

            return is_array($serialized) ? $serialized : [$serialized];
        }

        if (is_object($items) && method_exists($items, 'toArray')) {
            $array = $items->toArray();

            return is_array($array) ? $array : [$array];
        }

        return [$items];
    }

    public static function evaluate(mixed $value, mixed ...$args): mixed
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }

    public static function enumValue(mixed $value): mixed
    {
        return $value instanceof BackedEnum ? $value->value : ($value instanceof UnitEnum ? $value->name : $value);
    }

    public static function dataGet(mixed $target, string|int|array|null $key, mixed $default = null): mixed
    {
        if ($key === null) {
            return $target;
        }

        $segments = is_array($key) ? $key : explode('.', (string) $key);

        foreach ($segments as $index => $segment) {
            if ($segment === '*') {
                if (! is_iterable($target)) {
                    return Support::evaluate($default);
                }

                $result = [];
                $remaining = array_slice($segments, $index + 1);

                foreach ($target as $item) {
                    $value = Support::dataGet($item, $remaining, $default);

                    if (is_array($value)) {
                        $result = array_merge($result, $value);
                    } else {
                        $result[] = $value;
                    }
                }

                return $result;
            }

            if (is_array($target) && array_key_exists($segment, $target)) {
                $target = $target[$segment];

                continue;
            }

            if ($target instanceof \ArrayAccess && $target->offsetExists($segment)) {
                $target = $target[$segment];

                continue;
            }

            if (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};

                continue;
            }

            return Support::evaluate($default);
        }

        return $target;
    }

    public static function dataHas(mixed $target, string|int|array|null $key): bool
    {
        if ($key === null) {
            return true;
        }

        $segments = is_array($key) ? $key : explode('.', (string) $key);

        foreach ($segments as $segment) {
            if (is_array($target) && array_key_exists($segment, $target)) {
                $target = $target[$segment];

                continue;
            }

            if ($target instanceof \ArrayAccess && $target->offsetExists($segment)) {
                $target = $target[$segment];

                continue;
            }

            if (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};

                continue;
            }

            return false;
        }

        return true;
    }

    public static function dataSet(array &$target, string|int|array|null $key, mixed $value): void
    {
        if ($key === null) {
            $target = $value;

            return;
        }

        $segments = is_array($key) ? $key : explode('.', (string) $key);
        $current = &$target;

        foreach ($segments as $segment) {
            if (! is_array($current)) {
                $current = [];
            }

            if (! array_key_exists($segment, $current)) {
                $current[$segment] = [];
            }

            $current = &$current[$segment];
        }

        $current = $value;
    }

    public static function useAsCallable(mixed $value): bool
    {
        return ! is_string($value) && is_callable($value);
    }

    public static function valueRetriever(callable|string|int|array|null $value): callable
    {
        if (Support::useAsCallable($value)) {
            return $value;
        }

        return fn (mixed $item, mixed $key = null): mixed => Support::dataGet($item, $value);
    }

    public static function operatorForWhere(callable|string|int|array|null $key, mixed $operator = null, mixed $value = null, int $argumentCount = 1): callable
    {
        if (Support::useAsCallable($key)) {
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
            $retrieved = Support::enumValue(Support::dataGet($item, $key));
            $expected = Support::enumValue($value);

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

    public static function sortByMany(array $items, array $comparisons): array
    {
        uasort($items, function (mixed $a, mixed $b) use ($comparisons): int {
            foreach ($comparisons as $comparison) {
                $comparison = Support::normalize($comparison);
                $prop = $comparison[0] ?? null;
                $direction = strtolower((string) ($comparison[1] ?? 'asc'));
                $result = Support::dataGet($a, $prop) <=> Support::dataGet($b, $prop);

                if ($result !== 0) {
                    return $direction === 'desc' ? -$result : $result;
                }
            }

            return 0;
        });

        return $items;
    }
}

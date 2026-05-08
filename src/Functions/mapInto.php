<?php

namespace Spatie\Piper;

use BackedEnum;
use Closure;

function mapInto(string $class): Closure
{
    return function (array $items) use ($class): array {
        if (is_subclass_of($class, BackedEnum::class)) {
            return $items |> map(fn (mixed $value): mixed => $class::from($value));
        }

        return $items |> map(fn (mixed $value, mixed $key): object => new $class($value, $key));
    };
}

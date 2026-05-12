<?php

namespace Spatie\Piper\Support;

function valueRetriever(callable|string|int|array|null $value): callable
{
    if (useAsCallable($value)) {
        return $value;
    }

    return fn (mixed $item, mixed $key = null): mixed => dataGet($item, $value);
}

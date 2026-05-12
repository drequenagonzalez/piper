<?php

namespace Spatie\Piper\Support;

function useAsCallable(mixed $value): bool
{
    return ! is_string($value) && is_callable($value);
}

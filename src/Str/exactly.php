<?php

namespace Spatie\Piper\Str;

use Closure;

function exactly(string $value): Closure
{
    return fn (string $subject): bool => $subject === $value;
}

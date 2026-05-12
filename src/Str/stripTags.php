<?php

namespace Spatie\Piper\Str;

use Closure;

function stripTags(?string $allowedTags = null): Closure
{
    return fn (string $value): string => \strip_tags($value, $allowedTags);
}

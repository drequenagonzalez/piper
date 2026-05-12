<?php

namespace Spatie\Piper\Str;

use Closure;

function position(string $needle, int $offset = 0, ?string $encoding = 'UTF-8'): Closure
{
    return fn (string $haystack): int|false => mb_strpos($haystack, $needle, $offset, $encoding);
}

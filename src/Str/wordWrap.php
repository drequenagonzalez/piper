<?php

namespace Spatie\Piper\Str;

use Closure;

function wordWrap(int $characters = 75, string $break = "\n", bool $cutLongWords = false): Closure
{
    return fn (string $string): string => \wordwrap($string, $characters, $break, $cutLongWords);
}

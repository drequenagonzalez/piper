<?php

namespace Spatie\Piper\Str;

use Closure;

function isUuid(int|string|null $version = null): Closure
{
    return function (string $value) use ($version): bool {
        if (! preg_match('/^[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}$/D', $value)) {
            return false;
        }

        return $version === null || $version === 'max' || (int) $value[14] === (int) $version;
    };
}

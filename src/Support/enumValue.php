<?php

namespace Spatie\Piper\Support;

use BackedEnum;
use UnitEnum;

function enumValue(mixed $value): mixed
{
    return $value instanceof BackedEnum ? $value->value : ($value instanceof UnitEnum ? $value->name : $value);
}

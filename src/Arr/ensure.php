<?php

namespace Spatie\Piper\Arr;

use Closure;
use UnexpectedValueException;

function ensure(string|array $type): Closure
{
    return function (array $items) use ($type): array {
        $allowedTypes = is_array($type) ? $type : [$type];

        foreach ($items as $index => $item) {
            $itemType = get_debug_type($item);

            foreach ($allowedTypes as $allowedType) {
                if ($itemType === $allowedType || (class_exists($allowedType) && $item instanceof $allowedType)) {
                    continue 2;
                }
            }

            throw new UnexpectedValueException(sprintf("Collection should only include [%s] items, but '%s' found at position %s.", \implode(', ', $allowedTypes), $itemType, $index));
        }

        return $items;
    };
}

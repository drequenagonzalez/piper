<?php

namespace Spatie\Piper\Support;

use JsonSerializable;
use Traversable;

function normalize(mixed $items): array
{
    if ($items === null) {
        return [];
    }

    if (is_array($items)) {
        return $items;
    }

    if ($items instanceof Traversable) {
        return iterator_to_array($items);
    }

    if ($items instanceof JsonSerializable) {
        $serialized = $items->jsonSerialize();

        return is_array($serialized) ? $serialized : [$serialized];
    }

    if (is_object($items) && method_exists($items, 'toArray')) {
        $array = $items->toArray();

        return is_array($array) ? $array : [$array];
    }

    return [$items];
}

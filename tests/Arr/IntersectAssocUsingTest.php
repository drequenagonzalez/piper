<?php

use function Spatie\Piper\Arr\intersectAssocUsing;

it('returns key value pairs present using a key comparison callback', function () {
    expect(['a' => 1, 'b' => 2] |> intersectAssocUsing(['A' => 1], 'strcasecmp'))->toBe(['a' => 1]);
});

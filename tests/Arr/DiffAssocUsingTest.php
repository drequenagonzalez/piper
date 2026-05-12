<?php

use function Spatie\Piper\Arr\diffAssocUsing;

it('returns key value pairs not present using a key comparison callback', function () {
    expect(['a' => 1, 'b' => 2] |> diffAssocUsing(['A' => 1], 'strcasecmp'))->toBe(['b' => 2]);
});

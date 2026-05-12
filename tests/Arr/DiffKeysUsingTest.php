<?php

use function Spatie\Piper\Arr\diffKeysUsing;

it('returns keys not present using a key comparison callback', function () {
    expect(['a' => 1, 'b' => 2] |> diffKeysUsing(['A' => 9], 'strcasecmp'))->toBe(['b' => 2]);
});

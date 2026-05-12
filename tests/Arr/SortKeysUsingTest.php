<?php

use function Spatie\Piper\Arr\sortKeysUsing;

it('sorts keys using a comparison callback', function () {
    expect(['b' => 2, 'a' => 1] |> sortKeysUsing('strcmp'))->toBe(['a' => 1, 'b' => 2]);
});

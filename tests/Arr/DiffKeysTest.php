<?php

use function Spatie\Piper\Arr\diffKeys;

it('returns keys not present in another array', function () {
    expect(['a' => 1, 'b' => 2] |> diffKeys(['a' => 9]))->toBe(['b' => 2]);
});

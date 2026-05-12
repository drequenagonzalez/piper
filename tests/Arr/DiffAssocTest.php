<?php

use function Spatie\Piper\Arr\diffAssoc;

it('returns key value pairs not present in another array', function () {
    expect(['a' => 1, 'b' => 2] |> diffAssoc(['a' => 1]))->toBe(['b' => 2]);
});

<?php

use function Spatie\Piper\Arr\sortKeys;

it('sorts by keys ascending', function () {
    expect(['b' => 2, 'a' => 1] |> sortKeys())->toBe(['a' => 1, 'b' => 2]);
});

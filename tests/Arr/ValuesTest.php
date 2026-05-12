<?php

use function Spatie\Piper\Arr\values;

it('resets array keys', function () {
    expect([2 => 'a', 4 => 'b'] |> values())->toBe(['a', 'b']);
});

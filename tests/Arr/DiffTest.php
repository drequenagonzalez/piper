<?php

use function Spatie\Piper\Arr\diff;

it('returns values not present in another array', function () {
    expect(['a', 'b', 'c'] |> diff(['b']))->toBe([0 => 'a', 2 => 'c']);
});

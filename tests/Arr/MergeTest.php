<?php

use function Spatie\Piper\Arr\merge;

it('merges arrays', function () {
    expect(['a'] |> merge(['b']))->toBe(['a', 'b']);
});

<?php

use function Spatie\Piper\Arr\intersect;

it('returns values present in another array', function () {
    expect(['a', 'b'] |> intersect(['b', 'c']))->toBe([1 => 'b']);
});

<?php

use function Spatie\Piper\Arr\diffUsing;

it('returns values not present using a value comparison callback', function () {
    expect(['a', 'b'] |> diffUsing(['A'], 'strcasecmp'))->toBe([1 => 'b']);
});

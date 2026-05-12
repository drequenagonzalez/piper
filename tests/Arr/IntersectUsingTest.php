<?php

use function Spatie\Piper\Arr\intersectUsing;

it('returns values present using a value comparison callback', function () {
    expect(['a', 'b'] |> intersectUsing(['A'], 'strcasecmp'))->toBe([0 => 'a']);
});

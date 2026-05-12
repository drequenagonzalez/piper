<?php

use function Spatie\Piper\Arr\flip;

it('flips keys and values', function () {
    expect(['a' => 1, 'b' => 2] |> flip())->toBe([1 => 'a', 2 => 'b']);
});

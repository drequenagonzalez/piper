<?php

use function Spatie\Piper\Arr\shuffle;

it('returns shuffled values without preserving keys', function () {
    $values = ['a' => 1, 'b' => 2, 'c' => 3] |> shuffle();

    sort($values);

    expect($values)->toBe([1, 2, 3]);
});

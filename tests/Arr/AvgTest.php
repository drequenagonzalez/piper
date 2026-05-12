<?php

use function Spatie\Piper\Arr\avg;

it('aliases average', function () {
    expect([
        ['score' => 10],
        ['score' => 20],
        ['score' => 40],
    ] |> avg('score'))->toBe(70 / 3);
});

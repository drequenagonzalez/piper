<?php

use function Spatie\Piper\Str\reverse;

it('reverses a string', function () {
    expect('Laravel' |> reverse())->toBe('levaraL');
});

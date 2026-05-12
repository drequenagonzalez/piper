<?php

use function Spatie\Piper\Str\substr;

it('returns a substring', function () {
    expect('Laravel' |> substr(1, 3))->toBe('ara');
});

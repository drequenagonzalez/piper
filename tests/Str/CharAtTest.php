<?php

use function Spatie\Piper\Str\charAt;

it('returns the character at an index', function () {
    expect('Laravel' |> charAt(1))->toBe('a');
});

it('returns false for out of range indexes', function () {
    expect('Laravel' |> charAt(99))->toBeFalse();
});

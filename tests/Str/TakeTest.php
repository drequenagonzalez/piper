<?php

use function Spatie\Piper\Str\take;

it('takes characters from the start', function () {
    expect('Laravel' |> take(3))->toBe('Lar');
});

it('takes characters from the end', function () {
    expect('Laravel' |> take(-3))->toBe('vel');
});

it('returns an empty string when taking zero characters', function () {
    expect('Laravel' |> take(0))->toBe('');
});

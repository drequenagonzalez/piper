<?php

use function Spatie\Piper\Str\password;

it('creates passwords directly', function () {
    expect(strlen(password(16)))->toBe(16);
});

it('can include spaces', function () {
    expect(password(4, letters: false, numbers: false, symbols: false, spaces: true))->toBe('    ');
});

<?php

use function Spatie\Piper\Str\unwrap;

it('removes surrounding wrappers from a string', function () {
    expect('"value"' |> unwrap('"'))->toBe('value');
});

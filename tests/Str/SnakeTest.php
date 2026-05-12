<?php

use function Spatie\Piper\Str\snake;

it('converts strings to snake case', function () {
    expect('FooBar' |> snake())->toBe('foo_bar');
});

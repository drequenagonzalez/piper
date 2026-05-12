<?php

use function Spatie\Piper\Str\fromBase64;
use function Spatie\Piper\Str\password;
use function Spatie\Piper\Str\random;
use function Spatie\Piper\Str\toBoolean;
use function Spatie\Piper\Str\toFloat;
use function Spatie\Piper\Str\toInteger;
use function Spatie\Piper\Str\toString;

it('casts strings to plain scalar values', function () {
    expect('42' |> toInteger())->toBe(42);
    expect('12.5' |> toFloat())->toBe(12.5);
    expect('true' |> toBoolean())->toBeTrue();
    expect('Laravel' |> toString())->toBe('Laravel');
    expect('@@@' |> fromBase64(strict: true))->toBeFalse();
});

it('creates random strings directly', function () {
    expect(strlen(random(12)))->toBe(12);
    expect(strlen(password(16)))->toBe(16);
});

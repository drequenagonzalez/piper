<?php

use function Spatie\Piper\Str\endsWith;
use function Spatie\Piper\Str\exactly;
use function Spatie\Piper\Str\is;
use function Spatie\Piper\Str\isAscii;
use function Spatie\Piper\Str\isEmpty;
use function Spatie\Piper\Str\isJson;
use function Spatie\Piper\Str\isMatch;
use function Spatie\Piper\Str\isNotEmpty;
use function Spatie\Piper\Str\isUlid;
use function Spatie\Piper\Str\isUuid;
use function Spatie\Piper\Str\startsWith;
use function Spatie\Piper\Str\test;

it('checks string prefixes suffixes and exact values', function () {
    expect('Laravel' |> startsWith('Lar'))->toBeTrue();
    expect('Laravel' |> startsWith(['Symfony', 'Lar']))->toBeTrue();
    expect('Laravel' |> endsWith('vel'))->toBeTrue();
    expect('Laravel' |> endsWith(['vel', 'fony']))->toBeTrue();
    expect('Laravel' |> exactly('Laravel'))->toBeTrue();
    expect('Laravel' |> exactly('laravel'))->toBeFalse();
});

it('checks patterns and encoded values', function () {
    expect('foo/bar' |> is('foo/*'))->toBeTrue();
    expect('Foo/Bar' |> is('foo/*'))->toBeFalse();
    expect('Foo/Bar' |> is('foo/*', ignoreCase: true))->toBeTrue();
    expect('Laravel' |> isMatch('/Lara/'))->toBeTrue();
    expect('Laravel' |> test('/Lara/'))->toBeTrue();
    expect('{"name":"Taylor"}' |> isJson())->toBeTrue();
    expect('not-json' |> isJson())->toBeFalse();
    expect('abc' |> isAscii())->toBeTrue();
});

it('checks emptiness and identifiers', function () {
    expect('' |> isEmpty())->toBeTrue();
    expect('Laravel' |> isNotEmpty())->toBeTrue();
    expect('550e8400-e29b-41d4-a716-446655440000' |> isUuid())->toBeTrue();
    expect('550e8400-e29b-11d4-a716-446655440000' |> isUuid(1))->toBeTrue();
    expect('01ARZ3NDEKTSV4RRFFQ69G5FAV' |> isUlid())->toBeTrue();
});

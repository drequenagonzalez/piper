<?php

use function Spatie\Piper\Str\is;

it('checks whether a string matches a wildcard pattern', function () {
    expect('foo/bar' |> is('foo/*'))->toBeTrue();
    expect('Foo/Bar' |> is('foo/*'))->toBeFalse();
});

it('can ignore case', function () {
    expect('Foo/Bar' |> is('foo/*', ignoreCase: true))->toBeTrue();
});

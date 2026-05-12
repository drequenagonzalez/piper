<?php

use function Spatie\Piper\Str\replaceMatches;

it('replaces regex matches with text', function () {
    expect('(+1) 501-555-1000' |> replaceMatches('/[^A-Za-z0-9]++/', ''))->toBe('15015551000');
});

it('replaces regex matches with a callback', function () {
    expect('foo baz bar' |> replaceMatches('/ba(.)/', fn (array $match): string => 'ba'.strtoupper($match[1])))->toBe('foo baZ baR');
});

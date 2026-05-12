<?php

use function Spatie\Piper\Str\explode;
use function Spatie\Piper\Str\matchAll;
use function Spatie\Piper\Str\remove;
use function Spatie\Piper\Str\replaceArray;
use function Spatie\Piper\Str\replaceEnd;
use function Spatie\Piper\Str\replaceFirst;
use function Spatie\Piper\Str\replaceLast;
use function Spatie\Piper\Str\replaceMatches;
use function Spatie\Piper\Str\replaceStart;
use function Spatie\Piper\Str\scan;
use function Spatie\Piper\Str\split;
use function Spatie\Piper\Str\swap;

it('replaces targeted parts of strings', function () {
    expect('The event will take place between ? and ?' |> replaceArray('?', ['8:30', '9:00']))
        ->toBe('The event will take place between 8:30 and 9:00');
    expect('the quick brown fox jumps over the lazy dog' |> replaceFirst('the', 'a'))
        ->toBe('a quick brown fox jumps over the lazy dog');
    expect('the quick brown fox jumps over the lazy dog' |> replaceLast('the', 'a'))
        ->toBe('the quick brown fox jumps over a lazy dog');
    expect('Hello World' |> replaceStart('Hello', 'Laravel'))->toBe('Laravel World');
    expect('Hello World' |> replaceEnd('World', 'Laravel'))->toBe('Hello Laravel');
    expect('(+1) 501-555-1000' |> replaceMatches('/[^A-Za-z0-9]++/', ''))->toBe('15015551000');
    expect('Framework' |> remove('work'))->toBe('Frame');
    expect('framework' |> swap(['frame' => 'pipe', 'work' => 'line']))->toBe('pipeline');
});

it('extracts regex matches and splits strings', function () {
    expect('abc123def456' |> matchAll('/\d+/'))->toBe(['123', '456']);
    expect('a,b,c' |> explode(','))->toBe(['a', 'b', 'c']);
    expect('a b  c' |> split('/\s+/'))->toBe(['a', 'b', 'c']);
    expect('filename.jpg' |> scan('%[^.].%s'))->toBe(['filename', 'jpg']);
});

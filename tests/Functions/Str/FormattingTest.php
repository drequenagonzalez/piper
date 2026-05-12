<?php

use function Spatie\Piper\Str\append;
use function Spatie\Piper\Str\deduplicate;
use function Spatie\Piper\Str\finish;
use function Spatie\Piper\Str\fromBase64;
use function Spatie\Piper\Str\length;
use function Spatie\Piper\Str\limit;
use function Spatie\Piper\Str\ltrim;
use function Spatie\Piper\Str\mask;
use function Spatie\Piper\Str\newLine;
use function Spatie\Piper\Str\numbers;
use function Spatie\Piper\Str\padBoth;
use function Spatie\Piper\Str\padLeft;
use function Spatie\Piper\Str\padRight;
use function Spatie\Piper\Str\prepend;
use function Spatie\Piper\Str\repeat;
use function Spatie\Piper\Str\reverse;
use function Spatie\Piper\Str\rtrim;
use function Spatie\Piper\Str\start;
use function Spatie\Piper\Str\stripTags;
use function Spatie\Piper\Str\toBase64;
use function Spatie\Piper\Str\unwrap;
use function Spatie\Piper\Str\wordCount;
use function Spatie\Piper\Str\words;
use function Spatie\Piper\Str\wordWrap;
use function Spatie\Piper\Str\wrap;

it('adds removes and pads surrounding content', function () {
    expect('Framework' |> append(' for ', 'PHP'))->toBe('Framework for PHP');
    expect('Framework' |> prepend('Laravel '))->toBe('Laravel Framework');
    expect('this/string' |> start('/'))->toBe('/this/string');
    expect('/this/string' |> start('/'))->toBe('/this/string');
    expect('this/string' |> finish('/'))->toBe('this/string/');
    expect('this/string/' |> finish('/'))->toBe('this/string/');
    expect('value' |> wrap('"'))->toBe('"value"');
    expect('"value"' |> unwrap('"'))->toBe('value');
    expect('Laravel' |> newLine(2))->toBe("Laravel\n\n");
});

it('formats whitespace width and visible content', function () {
    expect('foo--bar---baz' |> deduplicate('-'))->toBe('foo-bar-baz');
    expect('Laravel' |> length())->toBe(7);
    expect('The Laravel framework' |> limit(11))->toBe('The Laravel...');
    expect('The Laravel framework' |> words(2))->toBe('The Laravel...');
    expect('Taylor Otwell' |> mask('*', 3))->toBe('Tay**********');
    expect('Laravel' |> padLeft(10, '-'))->toBe('---Laravel');
    expect('Laravel' |> padRight(10, '-'))->toBe('Laravel---');
    expect('Laravel' |> padBoth(11, '-'))->toBe('--Laravel--');
    expect('  Laravel' |> ltrim())->toBe('Laravel');
    expect('Laravel  ' |> rtrim())->toBe('Laravel');
});

it('handles small scalar formatting helpers', function () {
    expect('ab' |> repeat(3))->toBe('ababab');
    expect('Laravel' |> reverse())->toBe('levaraL');
    expect('<p>Laravel</p>' |> stripTags())->toBe('Laravel');
    expect('Phone: +1 (555) 123-4567' |> numbers())->toBe('15551234567');
    expect('hello world' |> wordCount())->toBe(2);
    expect('The quick brown fox' |> wordWrap(10))->toBe("The quick\nbrown fox");
    expect('Laravel' |> toBase64() |> fromBase64())->toBe('Laravel');
});

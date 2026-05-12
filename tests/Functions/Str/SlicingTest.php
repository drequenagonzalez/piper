<?php

use function Spatie\Piper\Str\afterLast;
use function Spatie\Piper\Str\beforeLast;
use function Spatie\Piper\Str\between;
use function Spatie\Piper\Str\betweenFirst;
use function Spatie\Piper\Str\charAt;
use function Spatie\Piper\Str\position;
use function Spatie\Piper\Str\substr;
use function Spatie\Piper\Str\substrCount;
use function Spatie\Piper\Str\substrReplace;
use function Spatie\Piper\Str\take;

it('slices around the last and paired delimiters', function () {
    expect('App\\Models\\User' |> afterLast('\\'))->toBe('User');
    expect('App\\Models\\User' |> beforeLast('\\'))->toBe('App\\Models');
    expect('[first] middle [second]' |> between('[', ']'))->toBe('first] middle [second');
    expect('[first] middle [second]' |> betweenFirst('[', ']'))->toBe('first');
});

it('reads substrings and character positions', function () {
    expect('Laravel' |> charAt(1))->toBe('a');
    expect('Laravel' |> charAt(99))->toBeFalse();
    expect('Laravel' |> substr(1, 3))->toBe('ara');
    expect('one two one' |> substrCount('one'))->toBe(2);
    expect('1300' |> substrReplace(':', 2, 0))->toBe('13:00');
    expect('Laravel' |> position('vel'))->toBe(4);
    expect('Laravel' |> position('missing'))->toBeFalse();
});

it('takes characters from either side', function () {
    expect('Laravel' |> take(3))->toBe('Lar');
    expect('Laravel' |> take(-3))->toBe('vel');
    expect('Laravel' |> take(0))->toBe('');
});

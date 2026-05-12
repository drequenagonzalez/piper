<?php

use function Spatie\Piper\Str\replace;

it('replaces string content', function () {
    expect('Laravel 13.x' |> replace('13.x', '14.x'))->toBe('Laravel 14.x');
    expect('framework' |> replace(['frame', 'work'], ['pipe', 'line']))->toBe('pipeline');
});

it('can replace without case sensitivity', function () {
    expect('framework' |> replace('FRAME', 'pipe'))->toBe('framework');
    expect('framework' |> replace('FRAME', 'pipe', caseSensitive: false))->toBe('pipework');
});

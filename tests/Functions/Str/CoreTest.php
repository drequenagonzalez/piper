<?php

use function Spatie\Piper\Str\after;
use function Spatie\Piper\Str\before;
use function Spatie\Piper\Str\contains;
use function Spatie\Piper\Str\headline;
use function Spatie\Piper\Str\replace;
use function Spatie\Piper\Str\squish;
use function Spatie\Piper\Str\trim;

it('slices strings around delimiters', function () {
    expect('This is my name' |> after('This is'))->toBe(' my name');
    expect('App\\Models\\User' |> after('\\'))->toBe('Models\\User');
    expect('This is my name' |> after('missing'))->toBe('This is my name');
    expect('This is my name' |> after(''))->toBe('This is my name');

    expect('This is my name' |> before('my name'))->toBe('This is ');
    expect('This is my name' |> before('missing'))->toBe('This is my name');
    expect('This is my name' |> before(''))->toBe('This is my name');
});

it('checks whether strings contain needles', function () {
    expect('This is my name' |> contains('my'))->toBeTrue();
    expect('This is my name' |> contains(['Taylor', 'my']))->toBeTrue();
    expect('This is my name' |> contains('MY'))->toBeFalse();
    expect('This is my name' |> contains('MY', ignoreCase: true))->toBeTrue();
    expect('This is my name' |> contains(''))->toBeFalse();
});

it('formats strings without changing the original value', function () {
    expect("  laravel\tphp   framework  " |> squish())->toBe('laravel php framework');
    expect('steve_jobs' |> headline())->toBe('Steve Jobs');
    expect('EmailNotificationSent' |> headline())->toBe('Email Notification Sent');
    expect(' laravel ' |> trim())->toBe('laravel');
    expect('/laravel/' |> trim('/'))->toBe('laravel');
});

it('replaces string content', function () {
    expect('Laravel 13.x' |> replace('13.x', '14.x'))->toBe('Laravel 14.x');
    expect('framework' |> replace(['frame', 'work'], ['pipe', 'line']))->toBe('pipeline');
    expect('framework' |> replace('FRAME', 'pipe'))->toBe('framework');
    expect('framework' |> replace('FRAME', 'pipe', caseSensitive: false))->toBe('pipework');
});

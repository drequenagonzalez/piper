<?php

use function Spatie\Piper\Str\camel;
use function Spatie\Piper\Str\headline;
use function Spatie\Piper\Str\kebab;
use function Spatie\Piper\Str\lcfirst;
use function Spatie\Piper\Str\lower;
use function Spatie\Piper\Str\snake;
use function Spatie\Piper\Str\studly;
use function Spatie\Piper\Str\title;
use function Spatie\Piper\Str\ucfirst;
use function Spatie\Piper\Str\upper;

it('changes string casing', function () {
    expect('LARAVEL' |> lower())->toBe('laravel');
    expect('laravel' |> upper())->toBe('LARAVEL');
    expect('laravel framework' |> title())->toBe('Laravel Framework');
    expect('laravel' |> ucfirst())->toBe('Laravel');
    expect('Laravel' |> lcfirst())->toBe('laravel');
});

it('converts between naming conventions', function () {
    expect('foo_bar' |> camel())->toBe('fooBar');
    expect('foo bar' |> studly())->toBe('FooBar');
    expect('FooBar' |> snake())->toBe('foo_bar');
    expect('FooBar' |> kebab())->toBe('foo-bar');
    expect('email_notification_sent' |> headline())->toBe('Email Notification Sent');
});

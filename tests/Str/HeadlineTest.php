<?php

use function Spatie\Piper\Str\headline;

it('converts strings to headline case', function () {
    expect('steve_jobs' |> headline())->toBe('Steve Jobs');
    expect('EmailNotificationSent' |> headline())->toBe('Email Notification Sent');
});

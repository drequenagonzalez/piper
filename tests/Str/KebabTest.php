<?php

use function Spatie\Piper\Str\kebab;

it('converts strings to kebab case', function () {
    expect('FooBar' |> kebab())->toBe('foo-bar');
});

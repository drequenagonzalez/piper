<?php

use Spatie\Piper\Exceptions\ItemNotFoundException;
use Spatie\Piper\Exceptions\MultipleItemsFoundException;

use function Spatie\Piper\Arr\after;
use function Spatie\Piper\Arr\before;
use function Spatie\Piper\Arr\contains;
use function Spatie\Piper\Arr\containsStrict;
use function Spatie\Piper\Arr\count;
use function Spatie\Piper\Arr\doesntContain;
use function Spatie\Piper\Arr\every;
use function Spatie\Piper\Arr\filter;
use function Spatie\Piper\Arr\first;
use function Spatie\Piper\Arr\firstOrFail;
use function Spatie\Piper\Arr\get;
use function Spatie\Piper\Arr\has;
use function Spatie\Piper\Arr\hasAny;
use function Spatie\Piper\Arr\hasMany;
use function Spatie\Piper\Arr\hasSole;
use function Spatie\Piper\Arr\isEmpty;
use function Spatie\Piper\Arr\isNotEmpty;
use function Spatie\Piper\Arr\last;
use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Arr\reject;
use function Spatie\Piper\Arr\search;
use function Spatie\Piper\Arr\sole;
use function Spatie\Piper\Arr\some;
use function Spatie\Piper\Arr\values;

it('maps filters rejects and resets values through the pipe operator', function () {
    $result = [1, 2, 3, 4]
        |> map(fn (int $value, int $key): int => $value * ($key + 1))
        |> filter(fn (int $value): bool => $value > 3)
        |> reject(fn (int $value): bool => $value === 9)
        |> values();

    expect($result)->toBe([4, 16]);
});

it('reads first last and get values', function () {
    $items = ['first' => 'Taylor', 'second' => 'Abigail'];

    expect($items |> first())->toBe('Taylor');
    expect($items |> last())->toBe('Abigail');
    expect($items |> get('missing', 'fallback'))->toBe('fallback');
});

it('checks containment and keys', function () {
    $items = ['name' => 'Taylor', 'age' => 40];

    expect($items |> contains('40'))->toBeTrue();
    expect($items |> containsStrict('40'))->toBeFalse();
    expect($items |> doesntContain('Jess'))->toBeTrue();
    expect($items |> has('name', 'age'))->toBeTrue();
    expect($items |> hasAny('missing', 'age'))->toBeTrue();
});

it('supports predicates and cardinality checks', function () {
    $items = [1, 2, 3, 4];

    expect($items |> every(fn (int $value): bool => $value > 0))->toBeTrue();
    expect($items |> some(fn (int $value): bool => $value === 3))->toBeTrue();
    expect($items |> hasMany(fn (int $value): bool => $value > 2))->toBeTrue();
    expect([10] |> hasSole())->toBeTrue();
    expect([] |> isEmpty())->toBeTrue();
    expect($items |> isNotEmpty())->toBeTrue();
    expect($items |> count())->toBe(4);
});

it('finds neighboring values and search keys', function () {
    $items = ['a' => 1, 'b' => 2, 'c' => 3];

    expect($items |> before(2))->toBe(1);
    expect($items |> after(2))->toBe(3);
    expect($items |> search(fn (int $value): bool => $value === 3))->toBe('c');
});

it('throws when sole and firstOrFail cannot resolve exactly', function () {
    expect(fn () => [] |> firstOrFail())->toThrow(ItemNotFoundException::class);
    expect(fn () => [] |> sole())->toThrow(ItemNotFoundException::class);
    expect(fn () => [1, 2] |> sole())->toThrow(MultipleItemsFoundException::class);
});

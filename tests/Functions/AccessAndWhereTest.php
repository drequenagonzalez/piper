<?php

use function Spatie\Piper\Arr\firstWhere;
use function Spatie\Piper\Arr\get;
use function Spatie\Piper\Arr\groupBy;
use function Spatie\Piper\Arr\keyBy;
use function Spatie\Piper\Arr\pluck;
use function Spatie\Piper\Arr\select;
use function Spatie\Piper\Arr\value;
use function Spatie\Piper\Arr\where;
use function Spatie\Piper\Arr\whereBetween;
use function Spatie\Piper\Arr\whereIn;
use function Spatie\Piper\Arr\whereInstanceOf;
use function Spatie\Piper\Arr\whereNotBetween;
use function Spatie\Piper\Arr\whereNotIn;
use function Spatie\Piper\Arr\whereNotNull;
use function Spatie\Piper\Arr\whereNull;

it('plucks values with dot notation and optional keys', function () {
    $items = [
        ['user' => ['id' => 1, 'name' => 'Taylor']],
        ['user' => ['id' => 2, 'name' => 'Abigail']],
    ];

    expect($items |> pluck('user.name', 'user.id'))->toBe([
        1 => 'Taylor',
        2 => 'Abigail',
    ]);
});

it('filters using where operators', function () {
    $items = [
        ['name' => 'Taylor', 'score' => 98, 'team' => 'core'],
        ['name' => 'Jess', 'score' => 91, 'team' => null],
        ['name' => 'Abigail', 'score' => 95, 'team' => 'core'],
    ];

    expect($items |> where('team', 'core') |> pluck('name'))->toBe(['Taylor', 'Abigail']);
    expect($items |> whereBetween('score', [92, 98]) |> pluck('name'))->toBe(['Taylor', 'Abigail']);
    expect($items |> whereNotBetween('score', [92, 98]) |> pluck('name'))->toBe(['Jess']);
    expect($items |> whereIn('name', ['Jess', 'Taylor']) |> pluck('score'))->toBe([98, 91]);
    expect($items |> whereNotIn('name', ['Jess']) |> pluck('name'))->toBe(['Taylor', 'Abigail']);
    expect($items |> whereNull('team') |> pluck('name'))->toBe(['Jess']);
    expect($items |> whereNotNull('team') |> pluck('name'))->toBe(['Taylor', 'Abigail']);
});

it('finds first where and a single value by key', function () {
    $items = [
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ];

    expect($items |> firstWhere('score', '>', 95))->toBe(['name' => 'Taylor', 'score' => 98]);
    expect($items |> value('name'))->toBe('Taylor');
});

it('groups keys and selects nested records', function () {
    $items = [
        ['id' => 1, 'name' => 'Taylor', 'team' => 'core'],
        ['id' => 2, 'name' => 'Abigail', 'team' => 'core'],
        ['id' => 3, 'name' => 'Jess', 'team' => 'docs'],
    ];

    expect($items |> groupBy('team') |> get('core') |> pluck('name'))->toBe(['Taylor', 'Abigail']);
    expect($items |> keyBy('id'))->toHaveKey(2);
    expect($items |> select(['id', 'name']))->toBe([
        ['id' => 1, 'name' => 'Taylor'],
        ['id' => 2, 'name' => 'Abigail'],
        ['id' => 3, 'name' => 'Jess'],
    ]);
});

it('filters by object type', function () {
    $items = [new DateTimeImmutable, new stdClass, 'nope'];

    expect($items |> whereInstanceOf(DateTimeImmutable::class))->toHaveCount(1);
});

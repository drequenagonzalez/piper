#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

const ITERATIONS = 100;
const ITEM_COUNT = 100_000;

$case = caseArgument($argv);

if ($case !== null) {
    echo json_encode(runBenchmarkCase($case), JSON_THROW_ON_ERROR).PHP_EOL;

    return;
}

$results = [];

foreach (array_keys(cases()) as $case) {
    $results[] = runChildBenchmark($case);
}

renderResults($results);

/**
 * @return array<string, string>
 */
function cases(): array
{
    return [
        'array_map' => 'array_map(..., [...])',
        'collection_map' => 'collect([...])->map(...)',
        'piper_map' => '[...] |> Spatie\\Piper\\map(...)',
        'foreach' => 'foreach (...)',
    ];
}

function caseArgument(array $arguments): ?string
{
    $caseOptionIndex = array_search('--case', $arguments, true);

    if ($caseOptionIndex === false) {
        return null;
    }

    return $arguments[$caseOptionIndex + 1] ?? null;
}

/**
 * @return array{
 *     method: string,
 *     iterations: int,
 *     items: int,
 *     average_time_ms: float,
 *     average_memory_mb: float
 * }
 */
function runBenchmarkCase(string $case): array
{
    if (! array_key_exists($case, cases())) {
        throw new InvalidArgumentException("Unknown benchmark case [{$case}].");
    }

    $items = range(1, ITEM_COUNT);
    $timeSamples = [];
    $memorySamples = [];

    for ($iteration = 0; $iteration < ITERATIONS; $iteration++) {
        gc_collect_cycles();
        memory_reset_peak_usage();

        $memoryBefore = memory_get_usage();
        $startedAt = hrtime(true);

        $result = runCase($case, $items);

        $timeSamples[] = (hrtime(true) - $startedAt) / 1_000_000;
        $memorySamples[] = max(0, memory_get_peak_usage() - $memoryBefore) / 1024 / 1024;

        assertResult($result);

        unset($result);
    }

    return [
        'method' => cases()[$case],
        'iterations' => ITERATIONS,
        'items' => ITEM_COUNT,
        'average_time_ms' => average($timeSamples),
        'average_memory_mb' => average($memorySamples),
    ];
}

function runCase(string $case, array $items): array
{
    if ($case === 'array_map') {
        return array_map(static fn (int $value): int => $value * 2, $items);
    }

    if ($case === 'collection_map') {
        return collect($items)
            ->map(static fn (int $value): int => $value * 2)
            ->all();
    }

    if ($case === 'piper_map') {
        return $items |> Spatie\Piper\map(static fn (int $value): int => $value * 2);
    }

    if ($case === 'foreach') {
        $result = [];

        foreach ($items as $key => $value) {
            $result[$key] = $value * 2;
        }

        return $result;
    }

    throw new InvalidArgumentException("Unknown benchmark case [{$case}].");
}

function assertResult(array $result): void
{
    if (count($result) !== ITEM_COUNT || $result[0] !== 2 || $result[ITEM_COUNT - 1] !== ITEM_COUNT * 2) {
        throw new RuntimeException('Benchmark returned an unexpected result.');
    }
}

/**
 * @param  array<int, float>  $samples
 */
function average(array $samples): float
{
    return array_sum($samples) / count($samples);
}

/**
 * @return array{
 *     method: string,
 *     iterations: int,
 *     items: int,
 *     average_time_ms: float,
 *     average_memory_mb: float
 * }
 */
function runChildBenchmark(string $case): array
{
    $command = [PHP_BINARY, __FILE__, '--case', $case];

    $process = proc_open($command, [
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ], $pipes);

    if (! is_resource($process)) {
        throw new RuntimeException("Could not start benchmark case [{$case}].");
    }

    $output = stream_get_contents($pipes[1]);
    $errors = stream_get_contents($pipes[2]);

    fclose($pipes[1]);
    fclose($pipes[2]);

    $exitCode = proc_close($process);

    if ($exitCode !== 0) {
        throw new RuntimeException(trim($errors) ?: "Benchmark case [{$case}] failed.");
    }

    return json_decode($output, true, flags: JSON_THROW_ON_ERROR);
}

/**
 * @param  array<int, array{
 *     method: string,
 *     iterations: int,
 *     items: int,
 *     average_time_ms: float,
 *     average_memory_mb: float
 * }>  $results
 */
function renderResults(array $results): void
{
    echo 'Map benchmark'.PHP_EOL;
    echo 'Iterations: '.ITERATIONS.PHP_EOL;
    echo 'Items: '.number_format(ITEM_COUNT).PHP_EOL.PHP_EOL;

    printf("%-34s %14s %18s\n", 'Method', 'Avg time (ms)', 'Avg memory (MB)');
    printf("%'-68s\n", '');

    foreach ($results as $result) {
        printf(
            "%-34s %14.3f %18.3f\n",
            $result['method'],
            $result['average_time_ms'],
            $result['average_memory_mb'],
        );
    }
}

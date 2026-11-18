<?php

declare(strict_types=1);

require_once __DIR__ . '/solution.php';

$cases = [
    'match after a nonmatching pair' => [[9, 4, 6, 2], 10, [1, 2]],
    'duplicate values' => [[5, 5], 10, [0, 1]],
    'negative value and index zero' => [[-4, 8, 3], -1, [0, 2]],
    'skip self-pair' => [[5, 1, 9], 10, [1, 2]],
];

$solution = new Solution();
foreach ($cases as $name => [$nums, $target, $expected]) {
    $actual = $solution->twoSum($nums, $target);
    sort($actual, SORT_NUMERIC);

    if ($actual !== $expected) {
        throw new RuntimeException(sprintf(
            '%s: expected %s, got %s',
            $name,
            json_encode($expected),
            json_encode($actual)
        ));
    }
}

echo "Two Sum: " . count($cases) . " PHP tests passed.\n";

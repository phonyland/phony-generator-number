<?php

declare(strict_types=1);

test('floatWeighted() method returns a float', function (): void {
    $value = 🙃()->number->floatWeighted();

    expect($value)->toBeFloat();
});

test('floatWeighted() method calculates floats with standard deviation', function (): void {
    $n = 10000;

    $values = [];
    foreach (range(1, 10000) as $k => $i) {
        $values[] = 🙃()->number->floatWeighted(150.0, 100.0);
    }

    $mean = array_sum($values) / (float) $n;

    $variance = array_reduce(
        $values,
        static fn ($variance, $item) => $variance + ($item - $mean) ** 2,
        0
    ) / (float) ($n - 1);

    $std_dev = sqrt($variance);

    expect($mean)->toEqualWithDelta(150, 5);
    expect($std_dev)->toEqualWithDelta(100, 3);
});

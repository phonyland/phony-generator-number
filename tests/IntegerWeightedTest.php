<?php

declare(strict_types=1);

test('integerWeighted() method returns an integer value', function () {
    $value = 🙃()->number->integerWeighted();

    expect($value)->toBeInt();
});

test('integerWeighted() method calculates integers with standard deviation', function () {
    $n = 10000;

    $values = [];
    foreach (range(1, 10000) as $k => $i) {
        $values[] = 🙃()->number->integerWeighted(150, 100);
    }

    $mean = array_sum($values) / (float) $n;

    $variance = array_reduce(
        $values,
        static function ($variance, $item) use ($mean) {
            return $variance + ($item - $mean) ** 2;
        },
        0
    ) / (float) ($n - 1);

    $std_dev = sqrt($variance);

    expect($mean)->toEqualWithDelta(150, 5);
    expect($std_dev)->toEqualWithDelta(100, 3);
});

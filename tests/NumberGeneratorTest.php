<?php

// region integerBetween()

test('integerBetween() method returns an integer value')
    ->expect(🙃()->number->integerBetween())
    ->toBeInt();

test('integerBetween() method returns an integer between $min and $max')
    ->expect(🙃()->number->integerBetween(1, 100))
    ->toBeGreaterThanOrEqual(1)
    ->toBeLessThanOrEqual(100);

// endregion

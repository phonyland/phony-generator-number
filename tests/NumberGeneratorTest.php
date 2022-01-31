<?php

// region integerBetween()

test('integerBetween() method returns an integer value')
    ->expect(🙃()->number->integerBetween())
    ->toBeInt();

// endregion

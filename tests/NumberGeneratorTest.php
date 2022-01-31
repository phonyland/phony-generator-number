<?php

test('number->text')
    ->expect(🙃()->number->text())
    ->toBeAWord()
    ->toContain('number-text-');

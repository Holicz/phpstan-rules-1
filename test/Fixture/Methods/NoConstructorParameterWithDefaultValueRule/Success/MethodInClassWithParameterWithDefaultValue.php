<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\NoConstructorParameterWithDefaultValueRule\Success;

final class MethodInClassWithParameterWithDefaultValue
{
    public function foo($bar = 9000): void
    {
    }
}

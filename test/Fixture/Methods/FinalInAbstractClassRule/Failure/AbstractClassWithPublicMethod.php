<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Methods\FinalInAbstractClassRule\Failure;

abstract class AbstractClassWithPublicMethod
{
    public function method(): void
    {
    }
}

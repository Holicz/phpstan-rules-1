<?php

declare(strict_types=1);

namespace Ergebnis\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRule\Success;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class ClassExtendingPhpUnitFrameworkTestCase extends TestCase
{
}

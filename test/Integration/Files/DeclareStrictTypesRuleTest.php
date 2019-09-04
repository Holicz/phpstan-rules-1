<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

namespace Localheinz\PHPStan\Rules\Test\Integration\Files;

use Localheinz\PHPStan\Rules\Files\DeclareStrictTypesRule;
use Localheinz\PHPStan\Rules\Test\Integration\AbstractTestCase;
use PHPStan\Rules\Rule;

/**
 * @internal
 *
 * @covers \Localheinz\PHPStan\Rules\Files\DeclareStrictTypesRule
 */
final class DeclareStrictTypesRuleTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): iterable
    {
        $paths = [
            'file-empty' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-empty.php',
            'file-with-comment-and-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on.php',
            'file-with-comment-and-declare-strict-types-on-and-invalid-casing' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on-and-invalid-casing.php',
            'file-with-comment-and-declare-strict-types-on-and-multiple-declares' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on-and-multiple-declares.php',
            'file-with-comment-and-declare-strict-types-on-and-namespace-declaration' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-comment-and-declare-strict-types-on-and-namespace-declaration.php',
            'file-with-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on.php',
            'file-with-declare-strict-types-on-and-invalid-casing' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on-and-invalid-casing.php',
            'file-with-declare-strict-types-on-and-multiple-declares' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on-and-multiple-declares.php',
            'file-with-declare-strict-types-on-and-namespace-declaration' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-declare-strict-types-on-and-namespace-declaration.php',
            'file-with-doc-block-and-declare-strict-types-on' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on.php',
            'file-with-doc-block-and-declare-strict-types-on-and-invalid-casing' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on-and-invalid-casing.php',
            'file-with-doc-block-and-declare-strict-types-on-and-multiple-declares' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on-and-multiple-declares.php',
            'file-with-doc-block-and-declare-strict-types-on-and-namespace-declaration' => __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Success/file-with-doc-block-and-declare-strict-types-on-and-namespace-declaration.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function providerAnalysisFails(): iterable
    {
        $paths = [
            'file-with-comment-and-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-comment-and-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
            ],
            'file-with-comment-and-declare-strict-types-off-and-invalid-casing' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-comment-and-declare-strict-types-off-and-invalid-casing.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
            ],
            'file-with-comment-and-declare-strict-types-off-and-multiple-declares' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-comment-and-declare-strict-types-off-and-multiple-declares.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    5,
                ],
            ],
            'file-with-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-declare-strict-types-off-and-invalid-casing' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-strict-types-off-and-invalid-casing.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-declare-strict-types-off-and-multiple-declares' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-strict-types-off-and-multiple-declares.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-declare-ticks' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-declare-ticks.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-with-doc-block-and-declare-strict-types-off' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-doc-block-and-declare-strict-types-off.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
            ],
            'file-with-doc-block-and-declare-strict-types-off-and-invalid-casing' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-doc-block-and-declare-strict-types-off-and-invalid-casing.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
            ],
            'file-with-doc-block-and-declare-strict-types-off-and-multiple-declares' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-with-doc-block-and-declare-strict-types-off-and-multiple-declares.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    7,
                ],
            ],
            'file-without-declare-strict-types-and-namespace-declaration' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-without-declare-strict-types-and-namespace-declaration.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
            'file-without-declare-strict-types' => [
                __DIR__ . '/../../Fixture/Files/DeclareStrictTypesRule/Failure/file-without-declare-strict-types.php',
                [
                    'File is missing a "declare(strict_types=1)" declaration.',
                    3,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    protected function getRule(): Rule
    {
        return new DeclareStrictTypesRule();
    }
}
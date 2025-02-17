<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 Theradata Indonesia <theradata.indonesia@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class ExampleSessionTest extends CIUnitTestCase
{
    public function testSessionSimple(): void
    {
        $session = service('session');

        $session->set('logged_in', 123);
        $this->assertSame(123, $session->get('logged_in'));
    }
}

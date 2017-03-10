<?php

/**
 * WP-DI: A lightweight dependency injection container for WordPress.
 * Copyright (C) 2017 Benjamin Hofmann
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
 */

namespace derbenni\wp\di\test\unitTests;

use \derbenni\wp\di\definition\ExpressionDefinition;
use \derbenni\wp\di\definition\ScalarDefinition;
use \derbenni\wp\di\test\TestCase;
use function \derbenni\wp\di\expression;
use function \derbenni\wp\di\scalar;

/**
 *
 * @author Benjamin Hofmann <benni@derbenni.rocks>
 */
class FunctionsTest extends TestCase {

  /**
   *
   * @covers ::derbenni\wp\di\scalar
   */
  public function testScalar_CanReturnCorrectDefinition() {
    self::assertInstanceOf(ScalarDefinition::class, scalar('foo'));
  }

  /**
   *
   * @covers ::derbenni\wp\di\expression
   */
  public function testExpression_CanReturnCorrectDefinition() {
    self::assertInstanceOf(ExpressionDefinition::class, expression('foo'));
  }
}

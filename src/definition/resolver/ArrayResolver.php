<?php

declare(strict_types = 1);

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

namespace derbenni\wp\di\definition\resolver;

use \derbenni\wp\di\Container;
use \derbenni\wp\di\definition\iDefinition;

/**
 *
 * @author Benjamin Hofmann <benni@derbenni.rocks>
 */
class ArrayResolver implements iResolver {

  /**
   * Checks if the given value is actually an array.
   *
   * @param mixed[] $array
   * @return bool
   *
   * @since 1.0
   */
  public function can($array): bool {
    return is_array($array);
  }

  /**
   * Iterates the array and resolves definitions found within. Then returns everything.
   *
   * @param mixed[] $array
   * @param Container $container
   * @return string
   *
   * @since 1.0
   */
  public function resolve($array, Container $container) {
    $result = [];

    foreach($array as $key => $value) {
      if($value instanceof iDefinition) {
        $result[$key] = $value->define($container);
      }else {
        $result[$key] = $value;
      }
    }

    return $result;
  }
}
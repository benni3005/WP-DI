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

namespace derbenni\izon\resolver\parameter;

use \derbenni\izon\Container;
use \ReflectionParameter;

/**
 * This resolver is responsible for resolving parameters having a default value.
 *
 * @author Benjamin Hofmann <benni@derbenni.rocks>
 *
 * @since 1.0
 */
class DefaultValueParameterResolver implements iParameterResolver {

  /**
   * Checks if parameter has a default value.
   *
   * @param ReflectionParameter $parameter The parameter to check itself.
   * @param mixed[] $arguments The configured arguments for all parameters of a method.
   * @return bool
   *
   * @since 1.0
   */
  public function can(ReflectionParameter $parameter, array $arguments = []): bool {
    return $parameter->isDefaultValueAvailable();
  }

  /**
   * Returns the default value of the parameter.
   *
   * @param ReflectionParameter $parameter The parameter to resolve itself.
   * @param Container $container Used for building other definitions found when resolving.
   * @param mixed[] $arguments The configured arguments for all parameters of a method.
   * @return mixed
   *
   * @since 1.0
   */
  public function resolve(ReflectionParameter $parameter, Container $container, array $arguments = []) {
    return $parameter->getDefaultValue();
  }
}

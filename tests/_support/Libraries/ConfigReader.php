<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 Theradata Indonesia <theradata.indonesia@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Support\Libraries;

/**
 * Class ConfigReader
 *
 * An extension of BaseConfig that prevents the constructor from
 * loading external values. Used to read actual local values from
 * a config file.
 */
class ConfigReader extends \Config\App
{
    public function __construct()
    {
    }
}

<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 Theradata Indonesia <theradata.indonesia@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

error_reporting(E_ALL & ~E_DEPRECATED);
// If you want to suppress more types of errors.
// error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. It's not widely used currently, and may not survive
 | release of the framework.
 */
defined('CI_DEBUG') || define('CI_DEBUG', false);

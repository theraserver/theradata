<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 Theradata Indonesia <theradata.indonesia@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Support\Models;

use CodeIgniter\Model;

class ExampleModel extends Model
{
    protected $table          = 'factories';
    protected $primaryKey     = 'id';
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'name',
        'uid',
        'class',
        'icon',
        'summary',
    ];
    protected $useTimestamps      = true;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

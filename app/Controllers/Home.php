<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 Theradata Indonesia <theradata.indonesia@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if ($this->auth && $this->auth->can('admin.access')) {
            $this->auth->addGroup('admin', 'beta');
            // $this->auth->removeGroup('user');
            return redirect()->to(route_to('admin'));
        } else
            return thera_view('welcome_message');
    }
}

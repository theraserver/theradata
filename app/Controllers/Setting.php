<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Setting extends BaseController
{
    public function index()
    {
        return thera_view('admin/setting_page');
    }
}

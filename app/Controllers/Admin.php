<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{

    public function index()
    {
        if ($this->uri->getSegment(1) === 'admin' &&  $this->uri->getSegment(2) === '')
            return redirect()->to(route_to('dashboard'));
        // session()->setFlashdata(['loader' => true]);
        return thera_view('admin/dashboard');
    }
}

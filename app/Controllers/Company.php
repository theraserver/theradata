<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Company extends BaseController
{
    public function index()
    {
        //
    }

    public function store()
    {
        if ($this->request->is('post')) {
            // $post = $this->request->getPost();

            // $data = [
            //     'nama_cabang' => $post['store_name'],
            //     'alamat' => $post['store_address'],
            //     'telepon' => $post['store_phone_number'],
            //     'provinsi' => $post['store_province'],
            //     'kota' => $post['store_city'],
            //     'kode_pos' => $post['store_post_code']
            // ];
            // if (empty($post['id'])) {
            //     $this->storeModel->save($data);
            //     $msg = 'Data Cabang Baru berhasil dibuat!';
            // } else {
            //     // Update Data
            // }
            // return redirect()->back()->with('success', $msg);
        } else {
            $stores = $this->storeModel->findAll();
            $data = [
                'stores' => $stores
            ];
            return thera_view('admin/company/store_page', $data);
        }
    }
}

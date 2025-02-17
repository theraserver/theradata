<?php

namespace App\Models;

use CodeIgniter\Model;
use Michalsn\Uuid\UuidModel;
use Ramsey\Uuid\Guid\Guid;

class StoreModel extends UuidModel
{
    protected $table            = 'stores';
    protected $primaryKey       = 'store_id';
    // Menggunakan UUID sebagai primary key tanpa auto-increment
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_cabang', 'alamat', 'telepon', 'provinsi', 'kota', 'kode_pos'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_cabang' => 'required',
        'alamat' => 'required',
        'telepon' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['generateUuid'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Fungsi untuk menghasilkan UUID
    protected function generateUuid(array $data)
    {
        // Memastikan bahwa 'id' diatur dengan UUID
        if (empty($data['data']['store_id'])) {
            $uuid = (string) Guid::uuid4();
            $data['data']['store_id'] = $uuid; // Menghasilkan UUID
        }
        return $data;
    }
}

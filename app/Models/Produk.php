<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'harga', 'deskripsi', 'img'];
    public function getFilter($name, $sort = 'asc')
    {
        $builder = $this->table('produk');
        if (!empty($name)) {
            $builder->like('nama', $name);
        }
        return $builder->orderBy('harga', $sort)->paginate(5, 'produk');
    }
}

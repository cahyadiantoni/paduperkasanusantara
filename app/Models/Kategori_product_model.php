<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_product_model extends Model
{
    protected $table              = 'kategori_product';
    protected $primaryKey         = 'id_kategori_product';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori_product', 'nama_kategori_product', 'keterangan_kategori_product'];
    protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // listing
    public function listing()
    {
        $builder = $this->db->table('kategori_product');
        $builder->orderBy('kategori_product.id_kategori_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_product');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_product.id_kategori_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori_product)
    {
        $builder = $this->db->table('kategori_product');
        $builder->where('id_kategori_product', $id_kategori_product);
        $builder->orderBy('kategori_product.id_kategori_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori_product)
    {
        $builder = $this->db->table('kategori_product');
        $builder->where('slug_kategori_product', $slug_kategori_product);
        $builder->orderBy('kategori_product.id_kategori_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}

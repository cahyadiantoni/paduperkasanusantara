<?php

namespace App\Models;

use CodeIgniter\Model;

class Brand_product_model extends Model
{
    protected $table              = 'brand_product';
    protected $primaryKey         = 'id_brand_product';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_brand_product', 'nama_brand_product', 'keterangan_brand_product', 'image_brand_product'];
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
        $builder = $this->db->table('brand_product');
        $builder->orderBy('brand_product.id_brand_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('brand_product');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('brand_product.id_brand_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_brand_product)
    {
        $builder = $this->db->table('brand_product');
        $builder->where('id_brand_product', $id_brand_product);
        $builder->orderBy('brand_product.id_brand_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_brand_product)
    {
        $builder = $this->db->table('brand_product');
        $builder->where('slug_brand_product', $slug_brand_product);
        $builder->orderBy('brand_product.id_brand_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}

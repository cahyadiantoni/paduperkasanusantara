<?php

namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table         = 'product';
    protected $primaryKey    = 'id_product';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('product');
        $builder->select('product.*, kategori_product.nama_kategori_product, brand_product.nama_brand_product');
        $builder->join('kategori_product', 'kategori_product.id_kategori_product = product.id_kategori_product', 'LEFT');
        $builder->join('brand_product', 'brand_product.id_brand_product = product.id_brand_product', 'LEFT');
        $builder->orderBy('product.id_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('product');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // detail
    public function detail($id_product)
    {
        $builder = $this->db->table('product');
        $builder->select('product.*, kategori_product.nama_kategori_product, brand_product.nama_brand_product');
        $builder->join('kategori_product', 'kategori_product.id_kategori_product = product.id_kategori_product', 'LEFT');
        $builder->join('brand_product', 'brand_product.id_brand_product = product.id_brand_product', 'LEFT');
        $builder->where('product.id_product', $id_product);
        $builder->orderBy('product.id_product', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('product');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('product');
        $builder->where('id_product', $data['id_product']);
        $builder->update($data);
    }

    // slider
    public function slider()
    {
        $builder = $this->db->table('product');
        // $builder->where('nama_product', 'Homepage');
        $builder->orderBy('product.id_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // product
    public function product()
    {
        $builder = $this->db->table('product');
        // $builder->where('nama_product', 'Product');
        $builder->orderBy('product.id_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function productKategori($id)
    {
        $builder = $this->db->table('product');
        $builder->where('id_kategori_product', $id);
        $builder->orderBy('product.id_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function productBrand($id)
    {
        $builder = $this->db->table('product');
        $builder->where('id_brand_product', $id);
        $builder->orderBy('product.id_product', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function kategori()
    {
        $builder = $this->db->table('kategori_product');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function brand()
    {
        $builder = $this->db->table('brand_product');
        $query = $builder->get();

        return $query->getResultArray();
    }
}

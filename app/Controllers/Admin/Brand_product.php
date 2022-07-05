<?php

namespace App\Controllers\Admin;

use App\Models\Brand_product_model;

class Brand_product extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_brand_product = new Brand_product_model();
        $brand_product   = $m_brand_product->listing();
        $total             = $m_brand_product->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_brand_product' => 'required|min_length[3]|is_unique[brand_product.nama_brand_product]',
            ]
        )) {
            // masuk database
            // $slug = url_title($this->request->getPost('nama_brand_product'), '-', true);
            $data = [
                'nama_brand_product' => $this->request->getPost('nama_brand_product'),
                'keterangan_brand_product' => $this->request->getPost('keterangan_brand_product'),
            ];
            $m_brand_product->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/brand_product'));
        }
        $data = [
            'title'      => 'Brand Product: ' . $total['total'],
            'brand_product' => $brand_product,
            'content'         => 'admin/brand_product/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_brand_product)
    {
        checklogin();
        $m_brand_product = new Brand_product_model();
        $brand_product   = $m_brand_product->detail($id_brand_product);
        $total             = $m_brand_product->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_brand_product' => 'required|min_length[3]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_brand_product'), '-', true);
            $data = [
                'nama_brand_product' => $this->request->getPost('nama_brand_product'),
                'keterangan_brand_product' => $this->request->getPost('keterangan_brand_product'),
            ];
            $m_brand_product->update($id_brand_product, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/brand_product'));
        }
        $data = [
            'title'      => 'Edit Brand Product: ' . $brand_product['nama_brand_product'],
            'brand_product' => $brand_product,
            'content'         => 'admin/brand_product/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_brand_product)
    {
        checklogin();
        $m_brand_product = new Brand_product_model();
        $data              = ['id_brand_product' => $id_brand_product];
        $m_brand_product->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/brand_product'));
    }
}

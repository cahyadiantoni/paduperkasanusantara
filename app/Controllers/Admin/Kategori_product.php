<?php

namespace App\Controllers\Admin;

use App\Models\Kategori_product_model;

class Kategori_product extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_kategori_product = new Kategori_product_model();
        $kategori_product   = $m_kategori_product->listing();
        $total             = $m_kategori_product->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_product' => 'required|min_length[3]|is_unique[kategori_product.nama_kategori_product]',
            ]
        )) {
            // masuk database
            // $slug = url_title($this->request->getPost('nama_kategori_product'), '-', true);
            $data = [
                'nama_kategori_product' => $this->request->getPost('nama_kategori_product'),
                'keterangan_kategori_product' => $this->request->getPost('keterangan_kategori_product'),
            ];
            $m_kategori_product->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/kategori_product'));
        }
        $data = ['title'      => 'Kategori Product: ' . $total['total'],
            'kategori_product' => $kategori_product,
            'content'         => 'admin/kategori_product/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_kategori_product)
    {
        checklogin();
        $m_kategori_product = new Kategori_product_model();
        $kategori_product   = $m_kategori_product->detail($id_kategori_product);
        $total             = $m_kategori_product->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_product' => 'required|min_length[3]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_product'), '-', true);
            $data = [
                'nama_kategori_product' => $this->request->getPost('nama_kategori_product'),
                'keterangan_kategori_product' => $this->request->getPost('keterangan_kategori_product'),
            ];
            $m_kategori_product->update($id_kategori_product, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/kategori_product'));
        }
        $data = ['title'      => 'Edit Kategori Product: ' . $kategori_product['nama_kategori_product'],
            'kategori_product' => $kategori_product,
            'content'         => 'admin/kategori_product/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_kategori_product)
    {
        checklogin();
        $m_kategori_product = new Kategori_product_model();
        $data              = ['id_kategori_product' => $id_kategori_product];
        $m_kategori_product->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/kategori_product'));
    }
}

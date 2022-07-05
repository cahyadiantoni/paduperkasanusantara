<?php

namespace App\Controllers\Admin;

use App\Models\Product_model;
use App\Models\Kategori_product_model;
use App\Models\Brand_product_model;

class Product extends BaseController
{
    // index
    public function index()
    {
        checklogin();
        $m_product          = new Product_model();
        $m_kategori_product = new Kategori_product_model();
        $m_brand_product = new Kategori_product_model();
        $product            = $m_product->listing();
        $total             = $m_product->total();

        $data = [
            'title' => 'product (' . $total . ')',
            'product'     => $product,
            'content'    => 'admin/product/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        checklogin();
        $m_product          = new Product_model();
        $m_kategori_product = new Kategori_product_model();
        $m_brand_product = new Brand_product_model();
        $kategori_product   = $m_kategori_product->listing();
        $brand_product   = $m_brand_product->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_product' => 'required',
                'gambar_product' => [
                    'uploaded[gambar_product]',
                    'mime_in[gambar_product,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar_product,4096]',
                ],
            ]
        )) {
            if (!empty($_FILES['gambar_product']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar_product');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/image/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/image/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/image/thumbs/' . $namabaru);
                // masuk database
                $data = [
                    'id_brand_product'            => $this->request->getVar('id_brand_product'),
                    'id_kategori_product' => $this->request->getVar('id_kategori_product'),
                    'nama_product'       => $this->request->getVar('nama_product'),
                    'keterangan_product' => $this->request->getVar('keterangan_product'),
                    'gambar_product'             => $namabaru,
                ];
                $m_product->tambah($data);

                return redirect()->to(base_url('admin/product'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_brand_product'            => $this->request->getVar('id_brand_product'),
                'id_kategori_product' => $this->request->getVar('id_kategori_product'),
                'nama_product'       => $this->request->getVar('nama_product'),
                'keterangan_product' => $this->request->getVar('keterangan_product'),
            ];
            $m_product->tambah($data);

            return redirect()->to(base_url('admin/product'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'      => 'Tambah product',
            'kategori_product' => $kategori_product,
            'brand_product' => $brand_product,
            'content'         => 'admin/product/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_product)
    {
        checklogin();
        $m_kategori_product = new Kategori_product_model();
        $m_brand_product = new Brand_product_model();
        $m_product          = new Product_model();
        $kategori_product   = $m_kategori_product->listing();
        $brand_product   = $m_brand_product->listing();
        $product            = $m_product->detail($id_product);
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_product' => 'required',
                'gambar_product' => [
                    'mime_in[gambar_product,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar_product,4096]',
                ],
            ]
        )) {
            if (!empty($_FILES['gambar_product']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar_product');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/image/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/image/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/image/thumbs/' . $namabaru);
                // masuk database
                $data = [
                    'id_brand_product'   => $this->session->getVar('id_brand_product'),
                    'id_kategori_product' => $this->request->getVar('id_kategori_product'),
                    'nama_product'       => $this->request->getVar('nama_product'),
                    'keterangan_product'       => $this->request->getVar('keterangan_product'),
                    'gambar_product'             => $namabaru,
                ];
                $m_product->edit($data);

                return redirect()->to(base_url('admin/product'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_brand_product'   => $this->session->getVar('id_brand_product'),
                'id_kategori_product' => $this->request->getVar('id_kategori_product'),
                'nama_product'       => $this->request->getVar('nama_product'),
                'keterangan_product'       => $this->request->getVar('keterangan_product'),
            ];
            $m_product->edit($data);

            return redirect()->to(base_url('admin/product'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = [
            'title'      => 'Edit product: ' . $product['nama_product'],
            'kategori_product' => $kategori_product,
            'brand_product' => $brand_product,
            'product'          => $product,
            'content'         => 'admin/product/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Delete
    public function delete($id_product)
    {
        checklogin();
        $m_product = new Product_model();
        $data     = ['id_product' => $id_product];
        $m_product->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/product'));
    }
}

<?php

namespace App\Controllers;

use App\Models\Product_model;
use App\Models\Konfigurasi_model;

class Product extends BaseController
{
    // product
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_product      = new Product_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $product        = $m_product->product();
        $kategori        = $m_product->kategori();
        $brand        = $m_product->brand();

        $data = [
            'title'  => 'Product Kami',
            'description' => 'Gambar Product Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Product Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'product'      => $product,
            'kategori'      => $kategori,
            'brand'      => $brand,
            'konfigurasi' => $konfigurasi,
            'content'     => 'product/index',
        ];
        echo view('layout/wrapper', $data);
    }

    public function kategori($id)
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_product      = new Product_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $product        = $m_product->productKategori($id);
        $kategori        = $m_product->kategori();
        $brand        = $m_product->brand();

        $data = [
            'title'  => 'Product Kami',
            'description' => 'Gambar Product Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Product Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'product'      => $product,
            'kategori'      => $kategori,
            'brand'      => $brand,
            'konfigurasi' => $konfigurasi,
            'content'     => 'product/index',
        ];
        echo view('layout/wrapper', $data);
    }
    public function brand($id)
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_product      = new Product_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $product        = $m_product->productBrand($id);
        $kategori        = $m_product->kategori();
        $brand        = $m_product->brand();

        $data = [
            'title'  => 'Product Kami',
            'description' => 'Gambar Product Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Product Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'product'      => $product,
            'kategori'      => $kategori,
            'brand'      => $brand,
            'konfigurasi' => $konfigurasi,
            'content'     => 'product/index',
        ];
        echo view('layout/wrapper', $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        return view('produk/index');
    }

    public function ambilSemua()
    {
        $data = $this->produkModel->findAll();

        return json_encode($data); //data dirubah menjadi json
    }

    public function simpan()
    {
        $this->produkModel->insert([
            'nama_produk' => $this->request->getVar('namaProduk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
        ]);

        return 'success';
    }
    public function edit() 
    {
        $id_produk = $this->request->getVar('id_produk');
        $data = $this->produkModel->find($id_produk);

        return json_encode($data);
    }

    public function update()
    {
        $id_produk = $this->request->getVar('id_produk');

        $this->produkModel->update($id_produk,[
            'nama_produk' => $this->request->getVar('namaProduk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
        ]);
    }

    public function delete()
    {
        $id_produk = $this->request->getVar('id_produk');
        $this->produkModel->delete($id_produk);

    }
}

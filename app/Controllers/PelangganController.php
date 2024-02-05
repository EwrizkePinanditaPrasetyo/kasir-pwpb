<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    protected $pelangganModel;

    public function __construct() 
    {
        $this->pelangganModel = new PelangganModel();
    }
    public function index()
    {
        return view('pelanggan/v_pelanggan');
    }

    public function ambilSemua()
    {
        $data = $this->pelangganModel->findAll();

        return json_encode($data);
    }
 
    public function simpan()
    {
        $this->pelangganModel->insert([
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
        ]);

        return 'success';
    }

    public function edit()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $data = $this->pelangganModel->find($id_pelanggan);

        return json_encode($data);

    }

    public function update()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');

        $this->pelangganModel->update($id_pelanggan,[
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp')
        ]);
    }

    public function delete()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $this->pelangganModel->delete($id_pelanggan);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;
use App\Models\ProdukModel;
use App\Models\DetailpenjualanModel;

class KasirController extends BaseController
{
    protected $pelangganModel;
    protected $produkModel;
    protected  $detailpenjualanModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        $this->produkModel = new ProdukModel();
        $this->detailpenjualanModel = new DetailpenjualanModel();

    }
    public function index()
    {
        return view('menu/kasir');
    }

    public function ambilSemua()
    {
        $data['menu'] = $this->produkModel->findAll();

        return view ('menu/kasir', $data);
    }
}

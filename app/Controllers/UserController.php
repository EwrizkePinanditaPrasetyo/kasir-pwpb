<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;


class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('user/v_user');
    }

    public function ambilSemua()
    {
        $data = $this->userModel->findAll();

        return json_encode($data);
    }

    public function simpan()
    {
        $this->userModel->insert([
            'nama_user' => $this->request->getVar('namaUser'),
            'username'  => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),   
        ]);
        return "success";
    }

    public function edit()
    {
        $id_user = $this->request->getVar('id_user');
        $data = $this->userModel->find($id_user);

        return json_encode($data);
    }
    public function update()
    {
        $id_user = $this->request->getVar('id_user');

        $this->userModel->update($id_user,[
            'nama_user' => $this->request->getVar('namaUser'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ]);
    }

    public function delete()
    {
        $id_user = $this->request->getVar('id_user');
        $this->userModel->delete($id_user);
    }
}

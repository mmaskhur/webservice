<?php

namespace App\Controllers;

use App\Models\CrudModel;
use CodeIgniter\HTTP\Request;

class Crud extends BaseController
{

    protected $crudModel;
    public function __construct()
    {
        $this->crudModel  = new CrudModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Akun',
            'akun' =>  $this->crudModel->getdata()
        ];

        return view('crud', $data);
    }

    public function create()
    {
        // session();

        $data = [
            'title' => 'Form Tambah Data Komik',
            // 'validation' => \Config\Services::validation()
        ];

        return view('create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        $data = array(
            'username' => $this->request->getVar('username'),
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'address' => $this->request->getVar('address'),
            'age' => $this->request->getVar('age'),
            'password' => $this->request->getVar('password')
        );
        $link = "http://localhost/restfull/public/users/create";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        // tutup curl 
        curl_close($curl);

        // mengembalikan hasil curl
        $data = json_decode($response, true);
        // dd($data);
        // dd($data['status']);
        if (isset($data['status'])) {
            if ($data['status'] == 400) {
                session()->setFlashdata('pesan', 'Data GAGAL ditambahkan.');
            }
        } else {
            session()->setFlashdata('pesan', 'Data Berhasi ditambahkan.');
        }
        return redirect()->to('/crud');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'akun' => $this->crudModel->getdata($id)
        ];
        // dd($data);
        return view('edit', $data);
    }

    public function update($id)
    {

        $data = array(
            'username' => $this->request->getVar('username'),
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'address' => $this->request->getVar('address'),
            'age' => $this->request->getVar('age'),
            'password' => $this->request->getVar('password')
        );
        $link = "http://localhost/restfull/public/users/" . $id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => array(
                // 'Content-Type: application/x-www-form-urlencoded',
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // mengembalikan hasil curl
        $data = json_decode($response, true);
        // dd($data);
        // dd($data['status']);
        if (isset($data['status'])) {
            if ($data['status'] == 400) {
                session()->setFlashdata('pesan', 'Data gagal diupdate.');
            }
        } else {
            session()->setFlashdata('pesan', 'Data Berhasi diupdate.');
        }
        return redirect()->to('/crud');
    }

    public function  delete($id)
    {
        // dd($id);
        $url = "http://localhost/restfull/public/users/" . $id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        // dd($data);
        // dd($data['status']);
        if (isset($data['status'])) {
            if ($data['status'] == 400) {
                session()->setFlashdata('pesan', 'Data gagal dihapus.');
            }
        } else {
            session()->setFlashdata('pesan', 'Data Berhasi dihapus.');
        }
        return redirect()->to('/crud');
    }
}

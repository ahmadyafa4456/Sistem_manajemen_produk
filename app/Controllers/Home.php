<?php

namespace App\Controllers;

use App\Models\Produk;

class Home extends BaseController
{
    protected $produk;
    public function __construct()
    {
        $this->produk = new Produk();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $sort = $this->request->getVar('sort') ?? 'asc';
        $data = [
            'header' => 'Home',
            'title' => 'Dashboard',
            'produk' => $this->produk->getFilter($keyword, $sort),
            'pager' => $this->produk->pager
        ];
        return view('Home/Index', $data);
    }

    public function tambah()
    {
        $data = [
            'header' => 'Home',
            'title' => 'Tambah'
        ];
        return view('Home/Tambah', $data);
    }

    public function tambahProduk()
    {
        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/tambah');
        };
        $fileimg = $this->request->getFile('img');
        $namaimg = $fileimg->getRandomName();
        $fileimg->move('assets/img', $namaimg);
        $data = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'img' => $namaimg
        ];
        $this->produk->insert($data);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $produk = $this->produk->find($id);
        $data = [
            'header' => 'Home',
            'title' => 'Edit',
            'nama' => $produk['nama'],
            'harga' => $produk['harga'],
            'deskripsi' => $produk['deskripsi'],
            'id' => $produk['id']
        ];
        return view('Home/Edit', $data);
    }

    public function editProduk()
    {
        $id = $this->request->getPost('id');
        $img = $this->request->getFile('img');
        $imageProduk = $this->produk->find($id);
        $imagePath = FCPATH . 'assets/img/' . $imageProduk['img'];
        $data = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        if ($img->isValid()) {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $namaimg = $img->getRandomName();
            $img->move('assets/img', $namaimg);
            $data = [
                'nama' => $this->request->getPost('nama'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'img' => $namaimg
            ];
        }
        $this->produk->update($id, $data);
        return redirect()->to("/");
    }

    public function delete($id)
    {
        $produk = $this->produk->find($id);
        $this->produk->delete($id);
        $imagePath = FCPATH . 'assets/img/' . $produk['img'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        return redirect()->to("/");
    }
}

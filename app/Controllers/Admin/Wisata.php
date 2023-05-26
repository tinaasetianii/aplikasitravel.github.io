<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Wisatamodel;

class Wisata extends BaseController
{
    protected $wisata;
    public function __construct()
    {
        $this->wisata = new Wisatamodel();
    }

    public function index()
    {
        
        if(session()->get('logged_in')==TRUE){
            $data['wisata']=$this->wisata->findAll();
            return view('admin/wisata/index',$data);
        }else {
               return redirect('admin/login');
        }
        // $data['wisata']= $this->wisata->findAll();
        // return view('admin/wisata/index', $data);
    }

    public function add(){
        if(session()->get('logged_in')==TRUE){
        return view('admin/wisata/add');
    }else {
        return redirect('admin/login');
 }
    }

    public function save(){
        $rules=[
            'nama'=> 'required',
            'deskripsi'=> 'required',
            'foto'=> 'uploaded[foto]',
            'harga'=> 'required'
        ];
        $pesan= [
            'nama'=>[
                'required'=>'Nama wisata tidak boleh kosong'
            ],
            'deskripsi'=>[
                'required'=>'Deskripsi tidak boleh kosong'
            ],
            'foto'=>[
                'uploaded'=>'Foto tidak boleh kosong'
            ],
            'harga'=>[
                'required'=>'Harga tidak boleh kosong'
            ]
        ];

        if(!$this->validate($rules,$pesan)){
            $data['validation']=$this->validator;
            return view ('admin/wisata/add',$data);
        }
        $nama= $this->request->getVar('nama');
        $deskripsi= $this->request->getVar('deskripsi');
        $harga= $this->request->getVar('harga');
        $foto= $this->request->getFile('foto');
        $foto->move(WRITEPATH.'../public/foto');

        $data=[
            'nama_wisata'=>$nama,
            'deskripsi'=>$deskripsi,
            'harga'=>$harga,
            'foto'=>$foto->getClientName()
        ];
        $this->wisata->save($data);
        return redirect()->to('admin/wisata');
    }

    public function edit($id){
        $data['cari']= $this->wisata->where(['id_wisata'=>$id])->first();
        return view('admin/wisata/edit',$data);
    }

    public function update(){
        $id = $this->request->getVar('kode');
        $nama= $this->request->getVar('nama');
        $deskripsi= $this->request->getVar('deskripsi');
        $harga= $this->request->getVar('harga');
        $foto= $this->request->getFile('foto');
        $foto->move(WRITEPATH.'../public/foto');

        $data=[
            'id_wisata'=>$id,
            'nama_wisata'=>$nama,
            'deskripsi'=>$deskripsi,
            'harga'=>$harga,
            'foto'=>$foto
        ];
        $this->wisata->save($data);
        return redirect()->to('admin/wisata');
    }

    public function delete($id){
        $this->wisata->delete($id);
        return redirect()->to('admin/wisata');
    }
        
}

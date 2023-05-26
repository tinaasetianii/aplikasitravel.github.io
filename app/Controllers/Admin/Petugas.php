<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Petugas extends BaseController
{
    protected $petugas;
    protected $helpers = ['form','url','html'];
    public function __construct()
    {
        $this->petugas= new AdminModel();
    }

    public function index(){

        if(session()->get('logged_in')==TRUE){
            $data['petugas']=$this->petugas->findAll();
            return view('admin/petugas/index',$data);
        }else {
               return redirect()->to('admin/login');
        }
    }

    public function add(){
        if(session()->get('logged_in')==TRUE){
            return view('admin/petugas/add');
        }else {
               return redirect()->to('admin/login');
        }
    }

    public function save(){
        if(session()->get('logged_in')==TRUE){
            $rules=[
                'nama_lengkap'=>'required',
                'username'=>'required',
                'email'=>'required|valid_email',
                'password'=>'required',
                'upass'=>'required|matches[password]'
            ];
            $pesan=[
                'nama_lengkap'=>[
                    'required'=>'Nama tidak boleh kosong'
                ],
                'username'=>[
                    'required'=>'Nim tidak boleh kosong'
                ],
                'email'=>[
                    'required'=>'Email tidak boleh kosong',
                    'valid_email'=>'Format email tidak benar'
                ],
                'password'=>[
                    'required'=>'Program studi tidak boleh kosong'
                ],
                'upass'=>[
                    'required'=>'Ulang Password tidak boleh kosong',
                    'matches'=>'Password Tidak sama'
                ]
            ];
            if(!$this->validate($rules,$pesan)){
                $data['validation']=$this->validator;
                return view ('admin/petugas/add',$data);
            }

            $nama_lengkap =$this->request->getVar('nama_lengkap');
            $username =$this->request->getVar('username');
            $email =$this->request->getVar('email'); 
            $password = password_hash($this->request->getVar('password'),PASSWORD_BCRYPT);  

            $data=[
                'username'=>$username,
                'password'=>$password,
                'nama_lengkap'=>$nama_lengkap,
                'email'=>$email
           
            ];

            $this->petugas->save($data);
            

            return redirect()->to('admin/petugas');
            }else {
            return redirect()->to('admin/login');
     }
    }
    public function delete($id){
        $this->petugas->delete($id);
        return redirect()->to('admin/petugas');
    }

    public function edit($id){
        $data['cari']= $this->petugas->where(['id'=>$id])->first();
        return view('admin/petugas/edit', $data);
    }

    public function update(){

        $id=$this->request->getVar('kode');
        $nama_lengkap =$this->request->getVar('nama_lengkap');
        $username =$this->request->getVar('username');
        $email =$this->request->getVar('email'); 
        $password = password_hash($this->request->getVar('password'),PASSWORD_BCRYPT);  

        if(empty($this->request->getVar('password'))){
            $data=[
                'id'=>$id,
                'username'=>$username,
                'nama_lengkap'=>$nama_lengkap,
                'email'=>$email
            ];
        }else{
            $data=[
                'id'=>$id,
                'username'=>$username,
                'password'=>$password,
                'nama_lengkap'=>$nama_lengkap,
                'email'=>$email
            ];
        }
        $this->petugas->save($data);

        return redirect()->to('admin/petugas');
    }

}


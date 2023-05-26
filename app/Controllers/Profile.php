<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Profile extends BaseController
{

    protected $users;

    public function __construct(){
        $this->users = new UsersModel();
    }

    public function index()
    {

        $data['users']=$this->users->where(['id'=>session()->get('id_users')])->findAll();
        return view('profile/index',$data);
    }

    public function edit($id){
        $data['users']= $this->users->where(['id'=>$id])->first();
        return view('Profile/edit', $data);
    }

    public function update(){

        $id=$this->request->getVar('id');
        $nama_users =$this->request->getVar('nama_users');
        $email =$this->request->getVar('email');
        $ponsel =$this->request->getVar('ponsel'); 
        $password = password_hash($this->request->getVar('password'),PASSWORD_BCRYPT);  

        if(empty($this->request->getVar('password'))){
            $data=[
                'id'=>$id,
                'nama_users'=>$nama_users,
                'email'=>$email,
                'ponsel'=>$ponsel
            ];
        }else{
            $data=[
                'id'=>$id,
                'nama_users'=>$nama_users,
                'email'=>$email,
                'ponsel'=>$ponsel,
                'password'=>$password
            ];
        }
        $this->users->save($data);

        return redirect()->to('Loginuser');
    }
}

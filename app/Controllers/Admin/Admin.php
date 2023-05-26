<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\Config\Config;

class Admin extends BaseController
{
    function __construct()
    {
        helper(['form', 'url']);
        $this-> m_admin = new AdminModel();
        $this-> validation = \Config\Services::validation();
        helper("cookie");
    }
    public function login()
    {
      
        if(get_cookie("cookie_username") && get_cookie("cookie_password")){
            $username = get_cookie('cookie_username');
            $password = get_cookie('cookie_password');

            $dataAkun = $this->m_admin->getData($username);
            if($password!=$dataAkun['password']){
                $err[]= "Akun yang anda masukan tidak sesuai";
                return redirect()->to('admin/login');
            }
            $akun =[
                    'akun_username'=>$username,
                    'akun_nama_lengkap'=>$dataAkun['nama_lengkap'],
                    'akun_email'=>$dataAkun['email'],
                    'logged_in'=>true
            ];
            session()->set($akun);
            return redirect()->to('admin/sukses');
        }
        
        $data = [];
        if($this->request->getMethod() == 'post'){
            $rules = [
                'username'=>[
                    'rules'=> 'required',
                    'errors'=> [
                        'required'=>'Username Harus di isi'
                        ]
                    ],
                'password'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Password Harus diisi'
                        ]
                    ]
                ];

                if(!$this ->validate($rules)){
                    session()->setFlashdata("warning", $this->validation->getErrors());
                    return redirect()->to("admin/login");
                }

                $username= $this->request->getVar('username');
                $password= $this->request->getVar('password');
                $remember_me= $this->request->getVar('remember_me');

                $dataAkun= $this->m_admin->getData($username);
                if (empty($dataAkun)) {
                    $err[] = "Akun yang anda masukan tidak sesuai";
                    session()->setFlashdata('username',$username);
                    session()->setFlashdata('warning',$err);
                    return redirect()->to("admin/login");
                  } elseif 
                (!password_verify($password, $dataAkun['password'])){
                    $err[] ="Akun yang anda masukan tidak sesuai";
                    session()->setFlashdata('username',$username);
                    session()->setFlashdata('warning',$err);
                    return redirect()->to("admin/login");
                }
            

                if($remember_me == '1'){
                    set_cookie("cookie_username",$username,3600*24*30);
                    set_cookie("cookie_password",$dataAkun['password'],3600*24*30);
                }

                $akun= [
                    'akun_username'=>$dataAkun['username'],
                    'akun_nama_lengkap'=>$dataAkun['nama_lengkap'],
                    'akun_email'=>$dataAkun['email'],
                    'logged_in'=>true
                ];
            session()->set($akun);
            return redirect()->to('admin/sukses')->withCookies(); 


        }
        echo view("admin/v_login", $data);
    }

    function sukses(){
        if(session()->get('logged_in')==TRUE){
        return redirect()->to('admin/article');
    }else {
        return redirect('admin/login');
 }
        // print_r(session()->get());
        // echo "Isian Cookie Username ".get_cookie("cookie_username"). "Dan Password".get_cookie("cookie_password");
    }

   
    function logout()
    {
        delete_cookie('cookie_username');
        delete_cookie('cookie_password');
        session()->destroy();
        if(session()->get('akun_username')!= ' ' ){
           session()->setFlashdata("regist", "Anda berhasil Logout");
        }
        echo view("admin/v_login");
    }

   
}


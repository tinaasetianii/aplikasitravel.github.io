<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\Config\Config;

class Loginuser extends BaseController
{
    protected $users;
    protected $helpers = ['form','url','html'];
   

    public function __construct(){

        helper(['form', 'url']);
        $this->users = new UsersModel();
        $this-> validation = \Config\Services::validation();
        helper("cookie");
     

        

    }
    public function index()
    {
        echo view('login/index');
    }

    public function register()
    {
        echo view('login/register');
    }

    public function simpan()
    {
        $rules=[
            'nama'=>[
                'rules'=> 'required',
                'errors'=> [
                    'required'=>'nama tidak boleh kosong'
                ]
            ],
            'kelamin'=>[
                'rules'=> 'required',
                'errors'=> [
                    'required'=>'jenis kelamin tidak boleh kosong'
                ]
            ],
            'phone'=>[
                'rules'=> 'required',
                'errors'=> [
                    'required'=>'Nomor Ponsel tidak boleh kosong'
                 ]
            ],
            'email'=>[
                'rules'=> 'required|valid_email',
                'errors'=> [
                    'required'=>'email tidak boleh kosong',
                    'valid_email'=>'format email belum benar'
                 ]
            ],
            'password'=>[
                'rules'=> 'required',
                'errors'=> [
                    'required'=>'Password tidak boleh kosong'
                ]
            ]
        ];
        if(!$this->validate($rules)){
            $data['validation']= $this->validator->getErrors();
            return view('login/register',$data);
        }
        $nama=$this->request->getVar('nama');
        $kelamin=$this->request->getVar('kelamin');
        $phone=$this->request->getVar('phone');
        $email=$this->request->getVar('email');
        $password=password_hash($this->request->getVar('password'),PASSWORD_BCRYPT);
        $data=[
            'id'=>time(),
            'nama_users'=>$nama,
            'kelamin'=>$kelamin,
            'email'=>$email,
            'ponsel'=>$phone,
            'password'=>$password
        ];
        $this->users->save($data);
        session()->setFlashdata('regist','berhasil daftar akun!');
        return redirect()->to('Loginuser');
    }

    public function cek(){


            $rules = [
                'email'=>[
                    'rules'=> 'required',
                    'errors'=> [
                        'required'=>'email Harus di isi'
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
                    return redirect()->to("Loginuser");
                }

                $email= $this->request->getVar('email');
                $password= $this->request->getVar('password');

                $dataAkun= $this->users->where(['email'=>$email])->first();

                if($dataAkun){
                    if(password_verify($password,$dataAkun->password)){
                    session()->set([
                       
                        'id_users'=>$dataAkun->id,
                        'nama'=>$dataAkun->nama_users,
                        'email'=>$dataAkun->email,
                        'logged_in'=>true
                    ]);
                    return redirect()->to('');
                }
                
                }else{
                $email= $this->request->getVar('email');
                $password= $this->request->getVar('password');
                
                $dataAkun= $this->users->where(['email'=>$email])->first();

                if (empty($dataAkun)) {
                    $err[] = "Akun yang anda masukan tidak sesuai";
                    session()->setFlashdata('email',$email);
                    session()->setFlashdata('warning',$err);
                    return redirect()->to("Loginuser");
                  } elseif 
                (!password_verify($password,$dataAkun['password'])){
                    $err[]="Akun yang anda masukan tidak sesuai";
                    session()->setFlashdata('email',$email);
                    session()->setFlashdata('warning',$err);
                    return redirect()->to('Loginuser');
                }

                $akun= [
                    'email'=>$email,
                    'id_users'=>$dataAkun->id,
                    'nama'=>$dataAkun->nama_users,
                    'email'=>$dataAkun->email,
                    'logged_in'=>true
                ];
            session()->set($akun);
            return redirect()->to('');
                }

        }

        public function exit(){
            session()->destroy();
            return redirect()->to('');
        }

    
        
    }


<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesanModel;

class Order extends BaseController
{
    protected $pesan;

    public function __construct(){
        $this->pesan= new PesanModel();
    }
    public function index(){
        $data['pesan']=$this->pesan
        ->join('wisata','wisata.id_wisata=pesan.id_wisata')
        ->where(['status =' => 404 ])->findAll();
        return view('admin/order/index',$data);
    }

    public function berhasil(){
        $data['pesan']=$this->pesan
        ->join('wisata','wisata.id_wisata=pesan.id_wisata')
        ->where(['status =' => 200 ])->findAll();
        return view('admin/order/berhasil',$data);

        $tes['user']=$this->pesan
        ->join('users','users.id=pesan.id')
        ->where(['status =' => 200 ])->findAll();
        return view('admin/order/berhasil',$tes);
    }

   
}

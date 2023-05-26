<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;

class History extends BaseController
{
    protected $pesan;

    public function __construct(){
        $this->pesan = new PesanModel();
    }

    public function index()
    {
        $data['pesan']=$this->pesan
        ->join('wisata','wisata.id_wisata=pesan.id_wisata')
        ->where(['id'=>session()->get('id_users')])->findAll();
        return view('history/index',$data);
    }

    public function historisetatus($id){
        
        $token=base64_encode("SB-Mid-server-epWF61uzp3KBuWGOugyL-w8F:");
        $url="https://api.sandbox.midtrans.com/v2/".$id."/status";
        $header=array(
            'Accept:application/json',
            'Content-Type:application/json',
            'Authorization:Basic ' .$token
        );
        $verb='GET';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$verb);
        curl_setopt($ch,CURLOPT_POSTFIELDS,null);
        curl_setopt($ch,CURLINFO_HEADER_OUT,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($ch);
        $hasil= json_decode($result,true);


        $status=$hasil['status_code'];
        $this->pesan->save(['id_pesan'=>$id, 'status'=>$status]);

        return redirect()->to('history/index');
    }
}

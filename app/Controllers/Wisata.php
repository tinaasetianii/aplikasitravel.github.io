<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WisataModel;
use App\Models\PesanModel;

class Wisata extends BaseController
{
    protected $wisata;
    protected $pesan;

    public function __construct(){
        $this->wisata = new WisataModel();
        $this->pesan = new PesanModel();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data['wisata']= $this->wisata->findAll();
        return view('wisata/index',$data);

    }

    public function beranda(){
        $data['wisata']=$this->wisata->limit(16)->findAll();
        return view('home',$data);
    }

    public function pesan($id){
        if(session()->get('logged_in')==true){
            $data['wisata']= $this->wisata->findAll();
            $data['wisata']=$this->wisata->where(['id_wisata'=>$id])->first();
            return view('Wisata/pesan',$data);
        }else{
            return redirect()->to('Loginuser');
        }
    }

            

    public function cek(){
        $harga=$this->request->getVar('harga');
        $id=$this->request->getVar('id');

        $rules=[
            'anak'=>'required|numeric',
            'dewasa'=>'required|numeric',
            'tanggal'=>'required'
        ];
        $pesan=[
            'anak'=>[
                'required'=>'Jumlah Pengunjung Anak',
                'numeric'=>'Jumlah pengunjung harus Angka'
            ],
            'dewasa'=>[
                'required'=>'Jumlah Pengunjung Dewasa',
                'numeric'=>'Jumlah pengunjung harus Angka'
            ],
            'tanggal'=>[
                'required'=>'Tanggal tidak boleh kosong'
            ]
        ];
        if(!$this->validate($rules,$pesan)){
            $data['wisata']=$this->wisata->where(['id_wisata'=>$id])->first();
            $data['validation']=$this->validator->getErrors();
            return view('wisata/pesan',$data);
            
        }

        $anak=$this->request->getVar('anak');
        $dewasa=$this->request->getVar('dewasa');
        $tanggal=$this->request->getVar('tanggal');  
        
        $hanak=$anak *($harga /2);
        $hdewasa=$dewasa*$harga;
        $total=$hanak+$hdewasa;

        \Midtrans\Config::$serverKey ='SB-Mid-server-epWF61uzp3KBuWGOugyL-w8F';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $id_pesan=time();
        $nama=session()->get('nama');
        $email=session()->get('email');
        $params = array(
            'transaction_details' => array(
                'order_id' => $id_pesan,
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'last_name' => '',
                'email' => $email,
                'phone' => '',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data=[
            'id_pesan'=>$id_pesan,
            'id'=>session()->get('id_users'),
            'id_wisata'=>$id,
            'qty_anak'=>$anak,
            'qty_dewasa'=>$dewasa,
            'total'=>$total,
            'tgl_datang'=>$tanggal,
            'snap'=>$snapToken
        ];
        $this->pesan->save($data);

        session()->setFlashdata('success','Berhasil pesan tiket Wisata');
        return redirect()->to('Wisata/bayar');
    }

    public function bayar(){
        $row['pesan']=$this->pesan
        ->join('wisata','wisata.id_wisata=pesan.id_wisata')
        ->where(['id'=>session()->get('id_users')])->findAll();
        return view('wisata/bayar',$row);
    }

    public function setatus($id){
        
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

        return redirect()->to('wisata/bayar');
    }

    public function hapus($id_pesan){
        $this->pesan->delete($id_pesan);
        return redirect()->to('wisata/bayar');
    }

  

}

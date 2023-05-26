<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WisataModel;
use App\Models\UsersModel;
use App\Models\PesanModel;


class Article extends BaseController{

    protected $wisata;

    public function __construct(){
        $this->wisata = new WisataModel();
        helper(['form', 'url']);
    }
    function index()
    {
        // $data = [];
        // $data['templateJudul']= 'Halaman Article';
        // echo view ("admin/v_article",$data);

        $data['wisata']= $this->wisata->findAll();
        return view('admin/v_article',$data);

        

    }

   

    
}

?>
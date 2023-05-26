<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Member extends BaseController
{
    protected $users;

    public function __construct(){
        $this->users =new UsersModel();
    }
    public function index()
    {
    $data['users']= $this->users->findAll();
    return view('admin/users/index',$data);
    }
}

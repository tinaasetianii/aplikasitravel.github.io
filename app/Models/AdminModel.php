<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table= "admin";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $protectFields= false;
    protected $allowedFields = [];

    /**
     * untuk mengambil data
     */

    public function getData($parameter)
    {
        $builder= $this->table($this->table);
        $builder->where('username=',$parameter);
        $builder->orWhere('email=',$parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }

    /**
     * untuk update/save data
     */

    public function updateData($data)
    {
        $builder =$this->table($this->table);
        if($builder->save($data)){
            return true;
        }else{
            return false;
        }
    }
}

?>
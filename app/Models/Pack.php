<?php

namespace App\Models;

use CodeIgniter\Model;

class Pack extends Model
{
    
    protected $table                = 'packs';
    protected $primaryKey           = 'pack_id';
  
    protected $allowedFields        = ['v_id','lodge','package','pax','amount','total_amount','total_amount','created_on','created_by','updated_on','updated_by'];

    // Dates
   
    protected $createdField         = 'created_on';
    protected $updatedField         = 'updated_on';
    protected $db;

    public function __construct()
    {
        date_default_timezone_set('Africa/Nairobi');
          $this->db = \Config\Database::connect();
    }


    public function select_pack()
    {
        $builder = $this->db->table('packs');
        $result  = $builder->get();

        return $result->getResultArray();
    }
    public function insert_pack($array)
    {
       
        $builder = $this->db->table('packs');
        
        $result = $builder->insertBatch($array);
         
        if($result)
        {
            return true;
        }

    }

    public function update_pack($array)
    {    
        $builder = $this->db->table('packs');
        $result  = $builder->updateBatch($array,'pack_id');


        if ($result) 
        {
           return true;
        }

        
    }

    public function delete_pack($id)
    {   
        $id = $id;
        $builder = $this->db->table('packs');
        $result = $builder->where('pack_id',$id)->delete();

        if ($result) 
        {
           echo true;
        }
    }


   
}

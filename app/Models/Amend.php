<?php

namespace App\Models;

use CodeIgniter\Model;

class Amend extends Model
{
   
    protected $table                = 'amends';
    protected $primaryKey           = 'u_id';
    protected $allowedFields        = ['v_id','amend','updated_on','updated_by'];

    // Dates
    
    protected $updatedField         = 'updated_on';
    protected $db;
 
 public function __construct()
 {
      date_default_timezone_set('Africa/Nairobi');
          $this->db = \Config\Database::connect();
 }

 public function amend($id)
 {
    $id = $id;
    $builder = $this->db->table('amends');
    $result = $builder->where('v_id',$id)->countAllResults();
    
    return $result;

 }
 
}

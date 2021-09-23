<?php

namespace App\Models;

use CodeIgniter\Model;

class Charge extends Model
{
    
    protected $table                = 'charges';
    protected $primaryKey           = 'c_id';
  
    protected $allowedFields        = ['member','code','charge','created_on','created_by','updated_on','updated_by'];

    // Dates
   
    protected $createdField         = 'created_on';
    protected $updatedField         = 'updated_on';
    
}

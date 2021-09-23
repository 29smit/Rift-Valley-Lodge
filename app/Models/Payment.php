<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
    
    protected $table                = 'payment';
    protected $primaryKey           = 'p_id';
    protected $allowedFields        = ['modename','mode_code','created_on','created_by','updated_on','updated_by'];

    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

   
}

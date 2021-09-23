<?php

namespace App\Models;

use CodeIgniter\Model;

class Room extends Model
{
   
    protected $table                = 'rooms';
    protected $primaryKey           = 'r_id';
    protected $allowedFields        = ['name','created_on','created_by','updated_on','updated_by'];

    protected $createdField         = 'created_on';
    protected $updatedField         = 'updated_on';
   
}

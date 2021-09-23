<?php

namespace App\Models;

use CodeIgniter\Model;

class Activity extends Model
{
    
    protected $table                = 'activity';
    protected $primaryKey           = 'a_id';
    protected $allowedFields        = ['u_id','activity','ip','created_on','created_by','updated_on','updated_by'];

    protected $createdField         = 'created_on';
    protected $updatedField         = 'updated_on';
    
}

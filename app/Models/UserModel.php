<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'admins';
    protected $primaryKey = 'u_id';

    protected $allowedFields = ['name','email','mobile','password','status','created_on','updated_on','created_by','updated_by'];


    protected $createdField  = 'created_on';
    protected $updatedField  = 'updated_on';
 

}
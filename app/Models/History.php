<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Activity;
use App\Models\Room;
use App\Models\Amend;
use App\Models\Charge;
use App\Models\Pack;
use App\Models\Payment;
use App\Models\UserModel;
use App\Models\Voucher;

class History extends Model
{
    
    public function __construct()
    {
         date_default_timezone_set('Africa/Nairobi');
          $this->db = \Config\Database::connect();
    }

    public function history()
    {  
        echo "function called";
        $query = $this->db->query('SELECT admins.name AS name,activity.activity AS activity,activity.created_on FROM `admins` INNER JOIN activity ON admins.u_id = activity.u_id');


        $result= $query->getResultArray();
        
       echo view('admin/history',['result'=>$result]);
    }



}

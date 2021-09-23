<?php 

namespace App\Libraries;
use App\Models\Activity;

class Activities
{
    
    public function __construct()
    {
    	date_default_timezone_set('Africa/Nairobi');
    }
	public function add_activity($activity)
	{
       $session = session();
       $id = $session->get('id');
       $time = date('y-m-d H:i:s');
       $ip  = $_SERVER['REMOTE_ADDR'];
       $activity = $activity;
       $datas = [
       
         'u_id' =>$id,
         'activity'=>$activity,
         'ip'=>$ip,
         'created_on'=>$time,
         'created_by'=>$id,


       ];
       

       $obj = new Activity;
       $obj->insert($datas);
	}
	
}
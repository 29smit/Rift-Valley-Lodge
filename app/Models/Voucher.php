<?php

namespace App\Models;
use App\Models\Room;

use CodeIgniter\Model;

class Voucher extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'vouchers';
    protected $primaryKey           = 'v_id';
    protected $returnType           = 'array';
    protected $allowedFields        = ['V_no','booked_by','booking_date','name','lodgename','pobox','tel','town','email','arrival_date','dept_date','created_at','created_by','updated_at','updated_by'];

    // Dates
    
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $db;
   
   public function __construct()
   {
        $this->db =  \Config\Database::connect();
   }  

   public function last_voucher()
   {      
         

          $query = $this->db->query("SELECT * FROM `vouchers` ORDER BY v_id DESC LIMIT 1");
          $result = $query->getResultArray();
         
           return $result;
   }

   public function all_voucher()
   {
     $builder = $this->db->table('vouchers');
     $result  = $builder->countAll();

      return $result;
   }
   
   public function get_booking($date)
   {
    $date = $date;
    $result  = $this->db->query("SELECT * FROM `packs` WHERE DATE(created_on) ='$date'");
    $result = $result->getResultArray();
    $no=1;
    $rooms = new Room;
    $data = $rooms->findAll();
    $total_rooms = array();
    if (!empty($result)) 
    {

      $count = count($result);
      
      //var_dump($count);
      
      $roomdata = array();
      for($i=0;$i<$count;$i++)
      {
        
         $roomdata[$i] = $result[$i]['lodge'];

       }

      

       $count = count($data);
       for($i=0;$i<$count;$i++)
      {
        
         $total_rooms[$i] = $data[$i]['name'];

       }


       $not_booked = array_diff($total_rooms,$roomdata);

       
       foreach($roomdata as $value)
       {
          echo'<tr>';
          echo'<td>'.$no.'</td>';
          echo'<td>'.$value.'</td>';
          echo'<td class="bg-light-danger">booked</td>';
          echo'</tr>';
          $no++;
       }
       
       foreach($not_booked as $value)
       {
          echo'<tr>';
          echo'<td>'.$no.'</td>';
          echo'<td>'.$value.'</td>';
          echo'<td class="bg-light-success" >Not booked</td>';
          echo'</tr>';
          $no++;
       }


      
      
       
                                                                   
    }
     
    else
    {
       
          echo'<tr>';
          echo'<td>'.$no.'</td>';
          echo'<td>ALL Rooms are</td>';
          echo'<td class="bg-light-success">not booked</td>';
          echo'</tr>';
          $no++;
       
    }
   

   }
   public function paid()
   {
     $builder   = $this->db->table('vouchers');
     $result    = $builder->where('payment_status',1)->countAllResults();
     return $result;

   }

   public function panding()
   {  
     $builder   = $this->db->table('vouchers');
     $result    = $builder->where('payment_status',0)->countAllResults();
     return $result;

   }
   public function cancel_v()
   {
     $builder   = $this->db->table('vouchers');
     $result    = $builder->where('cancel',0)->countAllResults();
     return $result; 
   }

   public function paid_amount()
   {
     $builder   = $this->db->table('vouchers');
     $result   = $builder->selectSum('to_pay')->where('payment_status',1)->get();
    
     return $result->getResult();
     
   }
   public function panding_amount()
   {
     $builder   = $this->db->table('vouchers');
     $result   = $builder->selectSum('to_pay')->where('payment_status',0)->get();
    
     return $result->getResult();
     
   }
   
   public function bookings()
   {
      $builder = $this->db->query('SELECT COUNT(*) AS total_count,booking_date,name FROM `vouchers` GROUP BY CAST(booking_date AS DATE)');
      
      return $builder->getResultArray();

      
   }
   public function vouchers()
   {
       $builder = $this->db->table('vouchers');
       $result  = $builder->where('cancel',1)->get();
        
      return  $result->getResultArray();
       
   }

   public function paid_voucher()
   {
     $builder   = $this->db->table('vouchers');
     $result    = $builder->where('payment_status',1)->get();
     return $result->getResultArray();
   }

   public function panding_voucher()
   {
     $builder   = $this->db->table('vouchers');
     $result    = $builder->where('payment_status',0)->get();
     return $result->getResultArray();
   }
   public function cancel()
   {

      $builder = $this->db->table('vouchers');
       $result  = $builder->where('cancel',0)->get();
        
      return  $result->getResultArray();

   }

   public function single_voucher($id)
   {
       $id = $id;
       $builder = $this->db->table('vouchers');
       $result  =  $builder->where('v_id', $id)->get();

       return $result->getResultArray();
   }

   public function package($id)
   {
     $id = $id;
     $builder = $this->db->table('packs');
     $result  = $builder->where('v_id',$id)->get();
     
     return $result->getResultArray();
     
   }

}


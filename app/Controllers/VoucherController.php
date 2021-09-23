<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Voucher;
use App\Models\Pack;
use App\Models\Amend;

class VoucherController extends BaseController
{
    private $booked_by;
    private $voucher_no;
    private $fullname;
    private $pobox;
    private $tel;
    private $town;
    private $email;
    private $arrival_date;
    private $dept_date;
    private $grand_total;
    private $disc;
    private $disc_per;
    private $disc_amount;
    private $to_pay;
    private $pay_mode;
    private $cheque_no;
    private $bank; 
    private $pay_status;
    private $booking_date;
    private $lodgename;
    private $db;

    public function __construct()
    {   
        helper(['form','url','error']);
        date_default_timezone_set('Africa/Nairobi');
        $this->db      = \Config\Database::connect();
    }

    public function create_voucher()
    {

        
           $this->booked_by    = $this->request->getPost('booked_by');
           $this->voucher_no   = $this->request->getPost('voucher_No');
           $this->fullname     = $this->request->getPost('fullname');
           $this->pobox        = $this->request->getPost('pobox');
           $this->tel          = $this->request->getPost('tel');
           $this->town         = $this->request->getPost('town');
           $this->email        = $this->request->getPost('email');
           $this->arrival_date = $this->request->getPost('arrival_date');
           $this->dept_date    = $this->request->getPost('dept_date');
           $this->grand_total  = $this->request->getPost('grand_total');
           $this->to_pay       = $this->request->getPost('pay');
           $this->pay_mode     = $this->request->getPost('paymode');
           $this->bank         = $this->request->getPost('bank');
           $this->cheque_no    = $this->request->getPost('cheque');
           $this->pay_status   = $this->request->getPost('status');
           $this->booking_date = date('Y-m-d H:i:s');
           $this->lodgename    = $this->request->getPost('lodgename');
          
          
          
          $this->disc         = $this->request->getPost('disc');
          if ($this->request->getPost('dis_per') == "") 
          {
           $this->disc_per     = 0;
              
          }
          else
          {
             $this->disc_per     = $this->request->getPost('dis_per');
          }
          
          if ($this->request->getPost('dis_amount') == "") 
          {
           $this->disc_amount     = 0;
              
          }
          else
          {
            $this->disc_amount     = $this->request->getPost('dis_amount');
          }
          
          



       
      $session = session();
      $id = $session->get('id');
      //insert basic data 
      
      $data = [
          
          'v_no'           => $this->voucher_no,
          'booked_by'      => $this->booked_by,
          'booking_date'   => $this->booking_date,
          'name'           => $this->fullname,
          'lodgename'      => $this->lodgename,
          'pobox'          => $this->pobox,
          'tel'            => $this->tel,
          'town'           => $this->town,
          'email'          => $this->email,
          'arrival_date'   => $this->arrival_date,
          'dept_date'      => $this->dept_date,
          'grand_total'    => $this->grand_total,
          'dis_per'        => $this->disc_per,
          'dis_amount'     => $this->disc_amount,
          'to_pay'         => $this->to_pay,
          'pay_mode'       => $this->pay_mode,
          'cheque_no'      => $this->cheque_no,
          'bank'           => $this->bank,
          'payment_status' => $this->pay_status,
          'created_at'     => $this->booking_date,
          'created_by'     => $id,
          'cancel'         => 1

          
           ];



     
      
      $builder = $this->db->table('vouchers');


      $result = $builder->insert($data);
     


    
      $obj = new Voucher;

      $vid = $obj->last_voucher();

      $vid = $vid['0']['v_id'];

       echo"<pre>";
        var_dump($_POST);

        $lodge = $this->request->getPost('lodge');
        $charge = $this->request->getPost('charge');
        $pax = $this->request->getPost('pax');
        $price = $this->request->getPost('price');
        $total = $this->request->getPost('total');
        
        // var_dump($lodge);
        // var_dump($charge);
        // var_dump($pax);
        // var_dump($price);
        // var_dump($total);

         $count = count($lodge);

         for($i=0;$i<$count;$i++)
         {
            $value_array[$i] = array
            (   
                'v_id' => $vid,
               'lodge' => $lodge[$i],
               'package' => $charge[$i],
               'pax'     => $pax[$i],
               'amount'  => $price[$i],
               'total_amount'=>$total[$i],
               'created_on'=> $this->booking_date,
               'created_by'=> $id

            );
         }


      $obj1 = new Pack;
      $result = $obj1->insert_pack($value_array);

      if($result == true) 
      {
         
         return redirect()->to('/new_voucher')->with('success','voucher has been created successfully!');
      }
        
    }

    public function delete_voucher()
    {
        $id = $this->request->getPost('v_id');
        $builder = $this->db->table('vouchers');
        
        $data = [
                  'cancel' => 0
                  
                ];

        $builder->where('v_id',$id);


        $result = $builder->update($data);
        
        if ($result) 
        {
            echo true;
        }
     

    }
    public function revert_voucher()
    {
        $id = $this->request->getPost('v_id');
        $builder = $this->db->table('vouchers');
        
        $data = [
                  'cancel' => 1
                  
                ];

        $builder->where('v_id',$id);


        $result = $builder->update($data);
        
        if ($result) 
        {
            echo true;
        }
     

    }
    public function get_voucher()
    {
         $builder = $this->db->table('vouchers')->where('cancel !=',0);
         $result  = $builder->get();
         $data = $result->getResultArray();
          
         $html  = ""; 
         foreach($data as $value)
         {
             $html.= '<tr>';
             $html.= '<td>'.$value['v_no'].'</td>';
             $html.='<td>'.$value['name'].'</td>';
             $html.='<td>'.$value['booked_by'].'</td>';
             $html.='<td>'.$value['booking_date'].'</td>';
             $html.='<td><a href=""><button  class="btn btn-primary"><i class="fas fa-eye"></i> / <i class="fas fa-edit"></i></button></a></td>';
             $html.='<td><button onclick="warning('.$value['v_id'].')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
             $html.='<td><a href="print/'.$value['v_id'].'"><button class="btn btn-info" ><i class="fas fa-file-alt"></i></button></a></td>';
             $html.='</tr>';

         }
        
        echo $html;
    }
     public function cancel_voucher()
    {
         $builder = $this->db->table('vouchers')->where('cancel =',0);
         $result  = $builder->get();
         $data = $result->getResultArray();
          
         $html  = ""; 
         foreach($data as $value)
         {
             $html.= '<tr>';
             $html.= '<td>'.$value['v_no'].'</td>';
             $html.='<td>'.$value['name'].'</td>';
             $html.='<td>'.$value['booked_by'].'</td>';
             $html.='<td>'.$value['booking_date'].'</td>';
             $html.='<td><a href=""><button  class="btn btn-primary"><i class="fas fa-eye"></i> / <i class="fas fa-edit"></i></button></a></td>';
             $html.='<td><button onclick="warning('.$value['v_id'].')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
             $html.='<td><a href="print/'.$value['v_id'].'"><button class="btn btn-info" ><i class="fas fa-file-alt"></i></button></a></td>';
             $html.='</tr>';

         }
        
        echo $html;
    }


    public function update_voucher($id)
    {  
        echo "<pre>";
        var_dump($_POST);

           $this->booked_by    = $this->request->getPost('booked_by');
           $this->voucher_no   = $this->request->getPost('voucher_No');
           $this->fullname     = $this->request->getPost('fullname');
           $this->pobox        = $this->request->getPost('pobox');
           $this->tel          = $this->request->getPost('tel');
           $this->town         = $this->request->getPost('town');
           $this->email        = $this->request->getPost('email');
           $this->arrival_date = $this->request->getPost('arrival_date');
           $this->dept_date    = $this->request->getPost('dept_date');
           $this->grand_total  = $this->request->getPost('grand_total');
           $this->to_pay       = $this->request->getPost('pay');
           $this->pay_mode     = $this->request->getPost('paymode');
           $this->bank         = $this->request->getPost('bank');
           $this->cheque_no    = $this->request->getPost('cheque');
           $this->pay_status   = $this->request->getPost('status');
           $this->booking_date = date('Y-m-d H:i:s');
           $this->lodgename    = $this->request->getPost('lodgename');
           $voucher_id         = $id;
          
          
           $this->disc         = $this->request->getPost('disc');
          if ($this->request->getPost('dis_per') == "") 
          {
           $this->disc_per     = 0;
              
          }
          else
          {
             $this->disc_per     = $this->request->getPost('dis_per');
          }
          
          if ($this->request->getPost('dis_amount') == "") 
          {
           $this->disc_amount     = 0;
              
          }
          else
          {
            $this->disc_amount     = $this->request->getPost('dis_amount');
          }
          
          



       
      $session = session();
      $id = $session->get('id');
      //insert basic data 
      
      $data = [
          
          'v_no'           => $this->voucher_no,
          'booked_by'      => $this->booked_by,
          'booking_date'   => $this->booking_date,
          'name'           => $this->fullname,
          'lodgename'      => $this->lodgename,
          'pobox'          => $this->pobox,
          'tel'            => $this->tel,
          'town'           => $this->town,
          'email'          => $this->email,
          'arrival_date'   => $this->arrival_date,
          'dept_date'      => $this->dept_date,
          'grand_total'    => $this->grand_total,
          'dis_per'        => $this->disc_per,
          'dis_amount'     => $this->disc_amount,
          'to_pay'         => $this->to_pay,
          'pay_mode'       => $this->pay_mode,
          'cheque_no'      => $this->cheque_no,
          'bank'           => $this->bank,
          'payment_status' => $this->pay_status,
          'updated_at'     => $this->booking_date,
          'updated_by'     => $id,

          
           ];



     
      
      $builder = $this->db->table('vouchers');


      $result = $builder->where('v_id',$voucher_id)->update($data);

      if ($result) 
      {
      

            $pack_id = $this->request->getPost('p_id');
            $lodge   = $this->request->getPost('lodge');
            $charge  = $this->request->getPost('charge');
            $pax     = $this->request->getPost('pax');
            $price   = $this->request->getPost('price');
            $total   = $this->request->getPost('total');

              $count = count($lodge);

         for($i=0;$i<$count;$i++)
         {
            if (isset($pack_id[$i])) 
            {
                 $update_array[$i] = array
            (   
               'pack_id'=>$pack_id[$i],
               'v_id' => $voucher_id,
               'lodge' => $lodge[$i],
               'package' => $charge[$i],
               'pax'     => $pax[$i],
               'amount'  => $price[$i],
               'total_amount'=>$total[$i],
               'updated_on'=> $this->booking_date,
               'updated_by'=> $id

            );
            }
            else
            {
                $insert_array[$i] = array
                (   
               
               'v_id' => $voucher_id,
               'lodge' => $lodge[$i],
               'package' => $charge[$i],
               'pax'     => $pax[$i],
               'amount'  => $price[$i],
               'total_amount'=>$total[$i],
               'created_on'=> $this->booking_date,
               'created_by'=> $id
              );
            }
           
         }

    // separate array  
       

      if (isset($insert_array)) 
      {
          $obj = new Pack;
          $result = $obj->insert_pack($insert_array);

      }

      if (isset($update_array)) 
      {
          $obj = new Pack;
          $result = $obj->update_pack($update_array);
      }

       $data = array('v_id'=>$voucher_id,'amend'=>1,'updated_on'=>$this->booking_date,'updated_by'=>$id);
       $obj = new Amend;
       $obj->insert($data);
      
      

      }
     
        echo"<pre>";
        var_dump($_POST);
        

       
        
        // var_dump($lodge);
        // var_dump($charge);
        // var_dump($pax);
        // var_dump($price);
        // var_dump($total);

      

      if($result == true) 
      {

          $session = session();
          $session->setFlashdata('success','your voucher has been successfully updated!');
         
         return redirect()->back();
      }
    }


}

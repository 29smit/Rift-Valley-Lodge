<?php

namespace App\Controllers;
use App\Models\Voucher;
use App\Models\Payment;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public function index()
    {
        $id = $this->request->getPost('id');
        $obj = new Voucher;
        $result= $obj->single_voucher($id);
       
        $pax  = $obj->package($id);
        $obj4 = new Payment;
        $payment = $obj4->findAll();
        
        $start_ts = strtotime($result[0]['arrival_date']); 
        $end_ts = strtotime($result[0]['dept_date']); 
        $diff = $end_ts - $start_ts; 
        $nights =  round($diff / 86400);
         
        
        // $date1 = new DateTime(date('Y-m-d',strtotime($result[0]['arrival_date'])));
        // $date2 = new DateTime(date('Y-m-d',strtotime($result[0]['dept_date']))); 
        // $numberOfNights= $date2->diff($date1)->format("%a");
        $to = $result[0]['email'];
 
        $subject = 'Voucher';

        $headers = "From: <info@rvl4788ec.com>\r\n ";
        $headers .= "Reply-To: <info@rvl47788ec.com>\r\n";
        $headers .= "Return-Path:  <info@rvl47788ec.com>\r\n";
        $headers .= "Organization: Rift Valley Lodge\r\n";
        $headers .= "CC: info@rvl47788ec.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
        
        $msg='<html>';
        $msg.='<head>';
        $msg.='<title>Voucher</title>';
        $msg ='<style>';
        $msg.='.bdr {';
        $msg.='padding-left: 5px;';
        $msg.='border: 1px solid black;';
        $msg.='}';
        $msg.='</style>';
        $msg.='</head>';
        $msg.='<body>';
       
        $msg.= '<table border="2" id="voucher">';
        $msg.='<tr>' ;
        $msg.='<td colspan="12" class="title" style="text-align: center;"><h1><b>Rift Valley Lodge No. 4788 E.C.</b></h1></td>';
        $msg.='</tr>';
        $msg.='<tr>';     
        $msg.='<td colspan="12" style="text-align: center;"><h2><b>Naivasha</b></h2></td>';
        $msg.='</tr>';
        $msg.='<tr>'; 
        $msg.='<td class="bdr text-center" colspan="8"><h3><b>Residence Booking Form<b></h3></td>';
        $msg.='<td class="bdr" colspan="2" id="v_no"><h3><b>Voucher No.</b></h3></td>';
        $msg.='<td class="bdr" colspan="2"><h3><b>'.$result[0]['v_no'].'</b><h3></td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td  class="bdr" colspan="2"><b>Booked By:</b></td>';
        $msg.='<td class="bdr" colspan="6">'.$result[0]['booked_by'].'</td>';
        $msg.='<td class="bdr" colspan="2"><b>Booking Date:</b></td>';
        $msg.='<td  class="bdr" colspan="2">'.date('d-M-Y',strtotime($result[0]['booking_date'])).'</td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr" colspan="2" id="v_name" ><b>Name:</b></td>';
        $msg.='<td class="bdr" colspan="6">'.$result[0]['name'].'</td>';
        $msg.='<td class="bdr" colspan="2"><b>Lodge Name:</b></td>';
        $msg.='<td class="bdr" colspan="2">'.$result[0]['lodgename'].'</td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr" colspan="2" id="v_name" ><b>P. O. Box:</b></td>';
        $msg.='<td class="bdr" colspan="6">'.$result[0]['pobox'].'</td>';
        $msg.='<td class="bdr" colspan="2"><b>Tel:</b></td>';
        $msg.='<td class="bdr" colspan="2">'.$result[0]['tel'].'</td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr" colspan="2" id="v_name" ><b>Town:</b></td>';
        $msg.='<td class="bdr" colspan="6">'.$result[0]['town'].'</td>';
        $msg.='<td class="bdr" colspan="2"><b>Email:</b></td>';
        $msg.='<td class="bdr" colspan="2">'.$result[0]['email'].'</td>';
        $msg.='</tr>';
        $msg.='<tr>';  
       
        $msg.='<td colspan="12">&nbsp;</td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr" colspan="12" style="text-align:center;"><h1>BOOKING INFORMATION</h1></td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td colspan="12">&nbsp;</td>'; 
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr" colspan="6"><b>Arrival Date:</b></td>';
        $day = date('D',strtotime($result[0]['arrival_date']));
        $date= date('d-M-Y',strtotime($result[0]['arrival_date']));
        $msg.='<td class="bdr" colspan="6">'.$day.'-'.$date.'</td>';
      
        $msg.='</tr>';
        $msg.='<tr>';
        $day = date('D',strtotime($result[0]['dept_date']));
        $date = date('d-M-Y',strtotime($result[0]['dept_date']));
        $msg.='<td class="bdr" colspan="6"><b>Departure Date:</b></td>';
        $msg.='<td class="bdr" colspan="6">'.$day.'-'.$date.'</td>';
        
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr" colspan="6"><b>Number Of Nights:</b></td>';
        $msg.='<td class="bdr" colspan="6">'.$nights.'</td>';
      
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td colspan="12">&nbsp;</td>';
        $msg.='</tr>';
        $msg.='<tr>';
        $msg.='<td class="bdr"><b>Item</b></td>';
        $msg.='<td class="bdr" colspan="2"><b>Room</b></td>';
        $msg.='<td class="bdr" colspan="4"><b>Description</b></td>';
        $msg.='<td class="bdr" ><b>Pax</b></td>';
        $msg.='<td class="bdr" colspan="2"><b>K. Shs. @</b></td>';
        $msg.='<td class="bdr" colspan="2"><b>Total K. Shs.</b></td>';
        $msg.='</tr>';
        
         if (isset($pax)) 
         {     
          $i= 1;
          $paxvalue = 0;                
          foreach($pax as $value)
          {

                                                                    
           $msg.='<tr>';
           $msg.='<td class="bdr">'.$i.'</td>';
           $msg.='<td class="bdr" colspan="2">'.$value['lodge'].'</td>';
           $msg.='<td class="bdr" colspan="4">'.$value['package'].'</td>';
           $msg.='<td class="bdr" >'.$value['pax'].'</td>';
           $msg.='<td class="bdr" colspan="2">'.$value['amount'].'</td>';
           $msg.='<td class="bdr" colspan="2">'.$value['total_amount'].'</td>';
           $msg.='</tr>';
           
           $i++;
           $paxvalue+= intval($value['pax']); 
           
          }
          
          }

         $msg.='<tr>';
         $msg.='<td class="bdr" colspan="7">&nbsp;</td>';
         $msg.='<td class="bdr" ><b>'.$paxvalue.'</b></td>';
         $msg.='<td class="bdr" colspan="2"><b>Total Donation:</b></td>';
         $msg.='<td  class="bdr" colspan="2"><b>'.$result[0]['grand_total'].'</b></td>';
         $msg.='</tr>';
         $msg.='<tr>'; 
         $msg.='<td class="bdr" colspan="8">&nbsp;</td>';
         $msg.='<td class="bdr" colspan="2"><b>Discount:</b></td>';
         $msg.='<td class="bdr" colspan="2">';


         if ($result[0]['dis_per']!=0)
         {
            $msg.= $result[0]['dis_per'].'%';

          }
        else
        {
            $msg.= $result[0]['dis_amount'];

        }
            

            $msg.='</td>';
            $msg.='</tr>';
            $msg.='<tr>';
            $msg.='<td class="bdr" colspan="8">&nbsp;</td>';
            $msg.='<td class="bdr" colspan="2"><b>Due Donation:</b></td>';
            $msg.='<td class="bdr" colspan="2"><b>'.$result[0]['to_pay'].'</b></td>';
            $msg.='</tr>';
            $msg.='<tr>';
            $msg.='<td colspan="12">&nbsp;</td>';
            $msg.='</tr>';
            $msg.='<tr>';
            $msg.='<td class="bdr" colspan="3"><b>Payment Mode:</b></td>';
            $msg.='<td class="bdr" colspan="4">';
            foreach($payment as $paydata) 
            {
                if ($paydata['mode_code']==$result[0]['pay_mode']) 
                {
                    $msg.=$paydata['modename'];

                }

            }
            $msg.='</td>';
            $msg.='</tr>';
            $msg.='<tr>';
            $msg.='<td class="bdr" colspan="6"><b>Cheque Number:</b></td>';
            $msg.='<td  class="bdr"colspan="6">';

           if(!empty($result[0]['cheque_no']))
           {
             $msg.=$result[0]['cheque_no'];
            }
           else
           {
             $msg.="N/A";

           }  
          $msg.='</td>';
          $msg.='</tr>';
          $msg.='<tr>';
          $msg.='<td class="bdr" colspan="6"><b>Bank & Branch:</b></td>';
          $msg.='<td class="bdr" colspan="6">'.$result[0]['bank'].'</td>';
          $msg.='</tr>';
          $msg.='<tr>';
          $msg.='<td class="bdr" colspan="6"><b>Payment Status:</b></td>';
          $msg.='<td class="bdr" colspan="6"';
          if ($result[0]['payment_status']==1)
         { 


            $msg.='style="background:#77A977" >'; 

         }
         else
         { 
            $msg.='style="background:#FF6666" >';

         }  
        if ($result[0]['payment_status']==1)
         {
          
          $msg.='<b><i style="color:#ffffff">paid</i></b>';
         }
         else
         {
           $msg.='<b><i style="color:#ffffff">panding</i></b>';
         } 
         
         $msg.='</td>';
         $msg.='</tr>';
         $msg.='<tr>';
       
         $msg.='<td colspan="12">&nbsp;</td>';
        
         $msg.='</tr>';
         $msg.='<tr>';
         $msg.='<td class="bdr" colspan="12">All payment must be made at the time of booking by CHEQUE and receipt must be obtained for the payment made.</td>';
         $msg.='</tr>';
         $msg.='<tr><td class="bdr" colspan="12">NO CASH PAYMENTS TO BE MADE AT THE LODGE.</td></tr>';
         $msg.='<tr><td class="bdr" colspan="12">No refunds for any cancellations. All cheques must be written in favour of RIFT VALLEY LODGE.</td></tr>'; 
         $msg.='<tr><td class="bdr" colspan="12">Above Donation are minimum chargable Donation.</td></tr>';
         $msg.='<tr><td colspan="12">Cottage booking will be charged for minimum of 9-pax if it has booked for less than 9-people. If Cottage is occupied</td></tr>';
         $msg.='<tr><td class="bdr" colspan="12">by more than 9 people will be charged accordingly.</td></tr>';
         $msg.='<tr><td class="bdr" colspan="12">AT LEAST ONE OF THE LODGE MEMBER MUST ACCOMPANY WITH THE VISITORS/GUESTS DURING THEIR ENTIRE STAY.</td></tr>';
         $msg.='</td>';
         $msg.='</tr>';
         $msg.='<tr>';
         $msg.='<tr>';
         $msg.='<td colspan="12">&nbsp;</td>';
         
         $msg.='</tr>';
         $msg.='<tr>';
         $msg.='<tr><td class="bdr" style="text-align:center;" colspan="12"><h1>BANKING DETAILS</h1></td></tr>';
         $msg.='<tr><td class="bdr" colspan="6"><b>Account Name:</b></td><td class="bdr" colspan="6">RIFT VALLEY LODGE NO. 4788</td></tr>';
         $msg.='<tr><td class="bdr" colspan="6"><b>Account No:</b></td><td class="bdr" colspan="6">9 5 8 6 0 1 0 0 0 0 0 5 2 0</td></tr>';
         $msg.='<tr><td class="bdr" colspan="6"><b>Bank Name:</b></td><td class="bdr" colspan="6">BANK OF BARODA (K.) LTD.</td></tr>';
         $msg.='<tr><td class="bdr" colspan="6"><b>Branch & Address:</b></td><td  class="bdr" colspan="6">SARIT CENTRE BRANCH, NAIROBI.</td></tr>';
         $msg.='<tr>';
         $msg.='<td colspan="12">&nbsp;</td>';
         
         $msg.='</tr>';
         $msg.='<tr><td class="bdr" style="text-align:center;" colspan="12"><h1>Checkin time: 12:00 PM & Checkout Time: 11:00 AM</h1></td></tr>';
         $msg.='<tr><td class="bdr" colspan="3">Harshes Patel</td><td class="bdr" colspan="6">Mob. 0737-411175</td><td class="bdr" colspan="3">Email: harshes@hotmail.com</td></tr>';     
         $msg.='<tr><td class="bdr" colspan="3">J. C. Patel</td><td class="bdr" colspan="6">Mob. 0722-519924</td><td class="bdr" colspan="3">Email: jessieassociates@yahoo.com</td></tr>';
         $msg.='<tr><td class="bdr" colspan="3">Vijay R. Patel </td><td class="bdr" colspan="6">Mob. 0737-100866</td><td class="bdr" colspan="3">Email: dhruvijay@gmail.com</td></tr>';    
         $msg.='<tr><td class="bdr" style="text-align:center;" colspan="12"><h1>This voucher must be presented on your arrival.</h1></td></tr>';
         $msg.='</table>'; 
         $msg.='</body>';
         $msg.='</html>';
                                                                    
    
        // Please specify your Mail Server - Example: mail.example.com.
          ini_set("SMTP","smtp.hostinger.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
          ini_set("smtp_port","465");

// Please specify the return address to use
          ini_set('sendmail_from', 'info@rvl4788ec.com');                                                        
                                                                    
                                                                    
                                                                     
        $result =  mail($to, $subject, $msg, $headers);                                                       
                  
        if ($result) 
        {
           echo "email has been sent!";

        }
        else
        {
            echo "email not sent!";
        }                                                  
                                                                    
                                                                     
                                                                        
                                                                    
                                                                   
    }
}

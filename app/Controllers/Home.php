<?php

namespace App\Controllers;
use App\Models\Voucher;
use App\Models\UserModel;
use App\Models\Room;
use App\Models\Charge;
use App\Models\Payment;
use App\Models\Amend;
use App\Models\Activity;
use App\Libraries\Activities;
use App\Libraries\Hashed;
use App\Models\History;

class Home extends BaseController
{
    protected $session;


    public function __construct()
    {
       $this->session = session();
        helper(['form','url','error']);
         date_default_timezone_set('Africa/Nairobi');
    }
    public function index()
    {
        $obj = new Voucher;
        $all = $obj->all_voucher();
        $paid = $obj->paid();
        $panding = $obj->panding();
        $cancel  = $obj->cancel_v();
        $paid_amount = $obj->paid_amount();
        $panding_amount = $obj->panding_amount();
        $books    = $obj->bookings();
        return view('admin/index',['active'=>'index','all'=>$all,'paid'=>$paid,'panding'=>$panding,'cancel'=>$cancel,'paid_amount'=>$paid_amount,'panding_amount'=>$panding_amount,'books'=>$books]);
    }

    public function logout()
    {

        $obj = new Activities;
        $activity = "logged out from system";
        $obj->add_activity($activity);
       
       $this->session->destroy();
        
       


        return redirect()->to('login');
    }
    public function new_voucher()
    {  


        $obj = new Voucher;
        $result = $obj->last_voucher();

        $obj1 = new UserModel;
        $names  = $obj1->findAll();
        $obj2 = new Room;
        $rooms = $obj2->findAll();
        $obj3 = new Charge;
        $charge= $obj3->findAll(); 
        $obj4 = new Payment;
        $payment = $obj4->findAll();
        


        return view('admin/add_voucher',['result' => $result , 'names' =>$names,'rooms'=>$rooms,'charges'=>$charge,'payment'=>$payment,'active'=>'add_v']);
    }

    public function show_voucher()
    {
         
        $obj = new Voucher;
        $data = $obj->vouchers();
        return view('admin/show',['data'=>$data,'active'=>'show']);
    
    }
    
    public function account()
    {
        $obj = new UserModel;
        $id  = $this->session->get('id');
        $result = $obj->find($id);
        
        return view('admin/account',['result'=>$result]);
    }
    public function email()
    {
        $obj = new UserModel;
        $id  = $this->session->get('id');
        $result = $obj->find($id);
        
        return view('admin/email',['result'=>$result]);
    }

    public function password()
    {
        return view('admin/password');
    }
     

    public function update_acc($id)
    {   
        $validation = $this->validate(

               [
                  'name' => 
                  [
                   'rules'  => 'required',
                   'errors' => [
                   'required' => 'please insert your fullname.',
                   ],

                  ],

                  
                    'phone' => 
                    [

                       'rules' => 'required|integer',
                       'errors'=>
                       [
                        'required' => 'please insert your mobile number',
                        'integer'  => 'please insert valid mobile number',

                       ],
                   ]
               ]);
         if (!$validation) 
        {
           
             $obj = new UserModel;
             $id  = $this->session->get('id');
             $result = $obj->find($id);
             return view('admin/account',['validator'=>$this->validator,'result'=>$result]);
            
        }
       
       else
       {
          
        $obj  = new UserModel;
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        


        $data = [
    'name' => $name,
    'mobile'   => $phone
               ];

         $result = $obj->update($id, $data);
         if ($result) 
         {
              return redirect()->back()->with('success','profile updated successfully');      
         }
         else
         {
            var_dump($result);
         }

       }
        
    }
    public function update_email($id)
    {   
        $validation = $this->validate(

               [
                  'email' => 
                  [
                   'rules'  => 'required|valid_email|is_unique[admins.email]',
                   'errors' => [
                   'required' => 'please insert your fullname.',
                   'valid_email'=>'please insert valid email',
                   'is_unique'  => 'please try other email'
                   ],

                  ]
               ]);
         if (!$validation) 
        {
           
             $obj = new UserModel;
             $id  = $this->session->get('id');
             $result = $obj->find($id);
             return view('admin/account',['validator'=>$this->validator,'result'=>$result]);
            
        }
       
       else
       {
          
        $obj  = new UserModel;
        
        
        $email = $this->request->getPost('email');
        
        


        $data = [
    'email' => $email,
  
               ];

         $result = $obj->update($id, $data);
         if ($result) 
         {
              return redirect()->back()->with('success','email updated successfully');      
         }
         else
         {
            var_dump($result);
         }

       }
        
    }
     public function update_pass()
    {   
         
         $session = session();
         $id = $session->get('id');

        $validation = $this->validate(

               [
                  'old_pass' => 
                  [
                   'rules'  => 'required|old_pass[old_pass]',
                   'errors' => [
                   'required' => 'please insert password',
                   'old_pass'=>'old password is not matching please try again',
                 
                   ]
                   ],
                   'new_pass' =>
                    [
                        'rules'=> 'required|min_length[8]|max_length[12]',
                        'errors' =>
                        [
                           'required' =>'please insert confirm password',
                           'min_length' => 'password must have atleast 8 character',
                            'max_length' =>'password must not have more than 12 charecter',


                        ]


                    ],

                  
               ]);
         if (!$validation) 
        {

       
             return view('admin/password',['validator'=>$this->validator]);
            
        }
       
       else
       {

          
        $obj  = new UserModel;
        
        
        $pass = $this->request->getPost('new_pass');
        $hashed = new Hashed;
        $new_pass = $hashed->make($pass);
        


        $data = [
             
             'password' => $new_pass,
  
               ];

         $result = $obj->update($id,$data);
         if ($result) 
         {
              return redirect()->back()->with('success','password changed successfully');      
         }
         else
         {
            var_dump($result);
         }

       }
        
    }
    public function show_cancel()
    {
        $obj = new Voucher;
        $data = $obj->cancel();
        return view('admin/cancel',['data'=>$data,'active'=>'cancel']);
    }

    public function update_voucher($id)
    {    
         $obj = new Voucher;
        $result = $obj->last_voucher();

        $obj1 = new UserModel;
        $names  = $obj1->findAll();
        $obj2 = new Room;
        $rooms = $obj2->findAll();
        $obj3 = new Charge;
        $charge= $obj3->findAll(); 
        $obj4 = new Payment;
        $payment = $obj4->findAll();
        $id = $id;
        $obj = new Voucher;
        $data = $obj->single_voucher($id);
        $pax  = $obj->package($id);
        $ob   = new Amend;
        $amends = $ob->amend($id);
        return view('admin/update',['result' => $result , 'names' =>$names,'rooms'=>$rooms,'charges'=>$charge, 'payment'=>$payment,'data'=>$data,'pax'=>$pax,'amend'=>$amends]);
    }

    public function print($id)
    {
        $obj = new Voucher;
        $result= $obj->single_voucher($id);
        $pax  = $obj->package($id);
        $obj4 = new Payment;
        $payment = $obj4->findAll();

        return view('admin/print',['data'=>$result,'pax'=>$pax,'payment'=>$payment]);



    }
    public function rooms()
    {
        $obj3 = new Charge;
        $charge= $obj3->findAll(); 
        return view('admin/room',['data'=>$charge,'active'=>'charge']);
    }

    public function add_charge()
    {
        return view('admin/add_charge',['active'=>'add_charge']);
    }

    public function update_room($id)
    {

        $obj3 = new Charge;
        $charge= $obj3->find($id);
        return view('admin/update_room',['charge'=>$charge]);
    }

    public function update_charge($id)
    {
        $obj3 = new Charge;
        $charge= $obj3->find($id);
        
        $validation = $this->validate(

               [
                  'desc' => 
                  [
                   'rules'  => 'required',
                   'errors' => [
                   'required' => 'please insert description',
                 
                 
                   ]
                   ],
                   'code' =>
                    [
                        'rules'=> 'required',
                        'errors' =>
                        [
                           'required' =>'please insert code',
                           

                        ]


                    ],
                    'price'=>
                    [

                     'rules' => 'required',
                     'errors' => [

                        'required' => 'please insert amount',
                     ]

                    ]

                  
               ]);
         if (!$validation) 
        {

       
             return view('admin/update_room',['validator'=>$this->validator,'charge'=>$charge]);
            
        }
       
       else
       {

          
        $obj  = new Charge;
        
        $session = session();
        $uid      = $session->get('id');
        $member = $this->request->getPost('desc');
        $code = $this->request->getPost('code');
        $price = $this->request->getPost('price');
        $date = date('Y-m-d H:i:s');


        $data = [
             
             'member' => $member,
             'code'   => $code,
             'charge' => $price,
             'updated_on'=>$date,
             'updated_by'=>$uid
  
               ];

         $result = $obj->update($id,$data);
         if ($result) 
         {
              return redirect()->back()->with('success','charges changed successfully');      
         }
         else
         {
            var_dump($result);
         }

       }
        
    }

    public function delete_charge()
    {
        $id = $this->request->getPost('r_id');

        $obj = new Charge;
        $result = $obj->delete($id);

        if ($result) 
        {
          echo true;
        }
        else
        {
            echo false;
        }

    }


    public function get_charge()
    {
        $obj = new Charge;
        $result = $obj->findAll();

             $i = 1;
        foreach($result as $value)
        {
            echo'<tr>';
            echo'<td>'.$i.'</td>';
            echo'<td>'.$value['member'].'</td>';
            echo'<td>'.$value['code'].'</td>';
            echo'<td>'.$value['charge'].'</td>';

            
            echo'<td><a href="update_room/'.$value['c_id'].'"><button  class="btn btn-primary"><i class="fas fa-eye"></i> / <i class="fas fa-edit"></i></button></a></td>';
            echo'<td><button onclick="warning('.$value['c_id'].')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
           
         echo'</tr>';
         $i++;
        }
    }
    public function paid()
    {
        $obj = new Voucher;
        $data = $obj->paid_voucher();
        return view('admin/paid',['data'=>$data,'active'=>'paid']);
    }

    public function panding()
    {
        $obj = new Voucher;
        $data = $obj->panding_voucher();
        return view('admin/paid',['data'=>$data,'active'=>'panding']);
    }

    public function get_booking()
    {   
        $date = $this->request->getPost('date');
        $obj = new Voucher;
        $result = $obj->get_booking($date);
    }
    public function history()
    {
         $obj = new History;
         $obj->history();
    }
}

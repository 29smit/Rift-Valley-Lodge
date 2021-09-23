<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pack;
use App\Models\Charge;

class PackageController extends BaseController
{
     protected $desc;
     protected $code;
     protected $price;

    public function __construct()
    {
        helper(['form','url','error']);
        date_default_timezone_set('Africa/Nairobi');
        $this->db      = \Config\Database::connect();
    }
    
    public function delete_pack()
    {
        $id = $this->request->getPost('id');
        $obj = new Pack;
        $result = $obj->delete_pack($id);

        if ($result) 
        {
            echo true;
        }

    }

    public function add_pack()
    {
         $this->desc = $this->request->getPost('desc');
         $this->code = $this->request->getPost('code');
         $this->price = $this->request->getPost('price');
         $date        = date('Y-m-d H:i:s');
         $session     = session();
         $id          = $session->get('id');

          $validation = $this->validate(

               [
                  'desc' => 
                  [
                   'rules'  => 'required',
                   'errors' => [
                   'required' => 'please enter description.',
                   ],

                  ],

                  'code'  =>
                  [
                    'rules' => 'required|is_unique[charges.code]',
                    'errors' =>
                    [
                       'required' => 'please enter code.',
                       
                       'is_unique'  => 'please use another code'
                      ],
                   
                    ],
                    'price' => 
                    [

                       'rules' => 'required|integer',
                       'errors'=>
                       [
                        'required' => 'please enter price',
                        'integer'  => 'please insert valid price',

                       ],

                    ],

                    

               ]

        );

          if (!$validation) 
          { 

            return view('admin/add_charge',['validator'=>$this->validator]);
             
          }
          else 
          {
            $obj = new Charge;
            $data = array(

                 'member'     => $this->desc,
                 'code'       => $this->code,
                 'charge'     => $this->price,
                 'created_on' => $date,
                 'created_by' => $id


            );
            
            $result = $obj->insert($data);
            
            if ($result) 
            {
                return redirect()->back()->with('success','data has been inserted successfully');
            }

          }
    }
  
}

<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Hashed;
use App\Models\UserModel;


class RegisterController extends Controller
{
    protected $fullname;
    protected $email;
    protected $password;
    protected $mobile;
    protected $status;


	public function __construct()
	{
		helper(['form','url','error']);
	}
	public function index()
	{
		 
         return view('register');		
	}

	public function check()
	{

        $validation = $this->validate(

               [
                  'fullname' => 
                  [
                   'rules'  => 'required',
                   'errors' => [
                   'required' => 'please insert your fullname.',
                   ],

                  ],

                  'email'  =>
                  [
                    'rules' => 'required|valid_email|is_unique[admins.email]',
                    'errors' =>
                    [
                       'required' => 'please insert your email.',
                       'valid_email' => 'please insert valid email address',
                       'is_unique'  => 'please use another email address'
                      ],
                   
                    ],
                    'mobile' => 
                    [

                       'rules' => 'required|integer|is_unique[admins.mobile]',
                       'errors'=>
                       [
                       	'required' => 'please insert your mobile number',
                       	'integer'  => 'please insert valid mobile number',
                        'is_unique'=>'please choose another mobile number'

                       ],

                    ],

                    'password' =>
                    [
                       'rules' => 'required|min_length[8]|max_length[12]',
                        'errors' =>
                        [
                        	'required' => 'please insert password',
                        	'min_length' => 'password must have atleast 8 character',
                        	'max_length' =>'password must not have more than 12 charecter',
                        ],

                    ],
                    'confirm-password' =>
                    [
                        'rules'=> 'required|matches[password]',
                        'errors' =>
                        [
                           'required' =>'please insert confirm password',
                           'matches'=> 'password is not matching, please insert again',


                        ]


                    ],

               ]

        );


        if (!$validation) 
        {
             
             return view('register',['validator'=>$this->validator]);
            
        }
        else
        {

           date_default_timezone_set('Africa/Nairobi');
           $hash = new Hashed;
           $this->fullname = $this->request->getPost('fullname');
           $this->email    = $this->request->getPost('email');
           $this->mobile   = $this->request->getPost('mobile');
           $this->password = $hash->make($this->request->getPost('password'));
           $this->status   = 0;
           $this->created_on = date('Y-m-d H:i:s');

           $user = new UserModel;

           $data = 
           [ 
              'name' => $this->fullname,
              'email' => $this->email,
              'mobile' => $this->mobile,
              'password' => $this->password,
              'status'   => $this->status,
              'created_on' => $this->created_on




           ];

           $result = $user->insert($data);

           if ($result) 
           {
             $session = session();
             $session->setFlashdata('success','you have been successfully registered');

             return view('login');
              
           }

          
        }

	}
}
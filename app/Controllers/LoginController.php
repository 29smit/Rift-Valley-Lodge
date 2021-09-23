<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\Activities;

class LoginController extends Controller
{

    protected $email;
    protected $password;
    public function __construct()
    {
        helper(['form','url','error']);
    }

    public function index()
    {
        helper(['form','url']);
        echo view('login');
    } 
  
    public function loginAuth()
    {

        $validation = $this->validate(

               [
                  

                  'email'  =>
                  [
                    'rules' => 'required|valid_email|is_not_unique[admins.email]',
                    'errors' =>
                    [
                       'required' => 'please insert your email.',
                       'valid_email' => 'please insert valid email address',
                       'is_not_unique'  => 'please use registered email address'
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
                   

               ]

        );


        if (!$validation) 
        {
             
             return view('login',['validator'=>$this->validator]);
            
        }
        else
        {
        
        $session = session();

        $userModel = new UserModel();

        $this->email = $this->request->getPost('email');
        $this->password = $this->request->getPost('password');
        
        $data = $userModel->where('email', $this->email)->first();
        
        if($data)
        {
            $pass = $data['password'];
            $authenticatePassword = password_verify($this->password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['u_id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                $obj = new Activities;
                $activity="logged in to system";
                $obj->add_activity($activity);
                return redirect()->to('/dashboard');
            
            }
            else
            {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return view('login');
            }

        }

        else
        {
            $session->setFlashdata('msg', 'Email does not exist.');
            return view('login');
        }
    }
    }
}
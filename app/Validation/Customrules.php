<?php
namespace App\Validation;

use App\Models\UserModel;

class Customrules{

  // Rule is to validate mobile number digits
  public function old_pass($pass)
  {
    
      $session = session();
      $id = $session->get('id');
      $obj = new UserModel;
      $result = $obj->find($id);
      $password = $result['password'];
      $result = password_verify($pass, $password);
    

      if (!$result) 
      {
          return false;
      }
      else
      {
        return true;
      }
   
  }
}
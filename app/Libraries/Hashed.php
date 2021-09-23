<?php 

namespace App\Libraries;

class Hashed
{

	public function make($password)
	{
       $hashed_pass = password_hash($password,PASSWORD_BCRYPT);

       return $hashed_pass;

	}
	
}
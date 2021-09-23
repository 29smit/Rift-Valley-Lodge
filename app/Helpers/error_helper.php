<?php 

// Function: used to convert a string to revese in order
if (!function_exists("show_error")) {
    function show_error($validator,$field)
    {
        if($validator->hasError($field)) 
			{
				echo'<div class="alert alert-danger">';
				echo $validator->showError($field);
				echo'</div>';
			}				
							
								
							
						    
    }
}




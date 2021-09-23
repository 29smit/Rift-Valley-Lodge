<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
create voucher | lodge
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-lg-row">
									<!--begin::Content-->
									<div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
										<!--begin::Card-->
										<div class="card">
											<?php 
											$session = session(); 

                                             if($session->has('success')) 
                                             {
                                             	echo'<div class="alert alert-success">';
                                             	echo $session->getFlashdata('success');
                                             	echo'</div>';
                                                	
                                             }

											?>
											<!--begin::Card body-->
											<div class="card-body p-12">
                                                  
												<!--begin::Form-->
												<form  method="post" action="<?php echo base_url('/create'); ?>" name="myform" id="kt_invoice_form">
													<div class="row">
														<div class="col-md-12 text-center">

															<?php 
                                                               
															?>
															<?php if(empty($result))
                                                               {
                                                               echo "<h1>Voucher #1</h1>";
                                                                }
                                                                else 
                                                                {
                                                                 ?>
                                                                 <h1>Voucher # <?=$result[0]['v_no']+1; ?></h1>
                                                                
                                                                <?php 
                                                                 }
															 ?>
															
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12 m-5">
													    <?php echo csrf_field(); ?>
                                                         <?php $session = session(); ?>
                                                         <input type="hidden" name="booked_by" value="<?=$session->get('name')?>">
                                                         <input type="hidden" name="voucher No" value="<?=empty($result) ?1:$result[0]['v_no']+1?>">
														</div>
														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Full Name</label>
															<input type="text" id="fullname" name="fullname" class="form-control form-control-solid">
															<div class="alert alert-danger name-error"></div>
														</div>
														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Lodge Name</label>
															 <select name="lodgename" id="lodge" class="form-select form-select-solid" aria-label="Select example">
															 	<option value="Naivash Lodge">Naivash Lodge</option>
                                                            </select>
                                                            <div class="alert alert-danger lodge-error"></div>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">P. O. Box</label>
															<input type="text" id="pobox" name="pobox" class="form-control form-control-solid">
															<div class="alert alert-danger pobox-error"></div>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Tel.</label>
															<input type="text" id="tel" name="tel" class="form-control form-control-solid">
															<div class="alert alert-danger tel-error"></div>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Town.</label>
															<input type="text" id="town" name="town" class="form-control form-control-solid">
															<div class="alert alert-danger town-error"></div>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Email.</label>
															<input type="text" id="email" name="email" class="form-control form-control-solid">
															<div class="alert alert-danger email-error"></div>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Arrival date.</label>
															<input type="datetime-local" id="arrival_date" name="arrival_date" class="form-control form-control-solid">
															<div class="alert alert-danger arrival-error"></div>

 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Departure date.</label>
															<input type="datetime-local" id="dept_date" name="dept_date" class="form-control form-control-solid">
															<div class="alert alert-danger dept-error"></div>
 														</div>
 														<div class="col-sm-12 my-2">
 															<div class="alert alert-danger table-error"></div>
 															<table class="table table-row-dashed table-row-gray-300 gy-7">
 																 <thead>
                                                                 <tr class="fw-bolder fs-6 text-gray-800">
                                                                    
                                                                     <th>Room</th>
                                                                     <th>Description</th>
                                                                     <th>Pax</th>
                                                                     <th>K. Shs. @</th>
                                                                     <th>Total K. Shs.</th>
                                                                     <th><button class="btn btn-info" id="add_button">ADD</button></th>
                                                                 </tr>
                                                                 </thead>
                                                                <tbody id="add">
                                                              	
                                                              	<tr>
                                                              		
                                                              		<td>
                                                              			 <select name="lodge[]" class="form-select form-select-solid lodge validate" aria-label="Select example">
                                                              			 	<option value=""><--please select---></option>
                                                              			 	
															 	        <?php foreach($rooms as $room) 
															 	        {
                                                                             ?>	
                                                                             <option><?php echo $room['name']; ?></option>														 	        	
															 	       <?php }
															 	        ?>
                                                                        </select>
                                                              		</td>
                                                              		<td>
                                                              			 <select name="charge[]" id="desc1" class="form-select form-select-solid charge validate" aria-label="Select example" onchange="getprice(1,this.value)">
                                                              			 	<option value=""><--please select---></option>
															 	        <?php foreach($charges as $charge) 
															 	        {
                                                                             ?>	
                                                                             <option value="<?php echo $charge['code']; ?>"><?php echo $charge['member']; ?></option>														 	        	
															 	       <?php }
															 	        ?>
                                                                        </select>
                                                              		</td>
                                                              		<td>
                                                              			 <input type="number" name="pax[]" id="pax1" class="form-control form-control-solid pax validate" onkeyup="count(1,this.value)" onchange="count(1,this.value)" >
                                                              		</td>
                                                              		<td>
                                                              			 <input type="text" name="price[]" class="form-control form-control-solid price validate" id="price1"  readonly>
                                                              		</td>
                                                              		<td>
                                                              			 <input type="text" name="total[]" class="form-control form-control-solid total_val validate" id="total1"  readonly>
                                                              		</td>

                                                              	</tr>

                                                              
                                                              </tbody>
 															 
															<tr>
                                                              		
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td>Total Donation</td>
                                                              		<td>                                                            
                                                              			<input type="text" name="grand_total" class="form-control form-control-solid validate" id="Gt"  readonly></td>
                                                              	</tr>
                                                              	<tr>
                                                              		
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td>Discount</td>
                                                              		<td><input type="radio" name="disc"  id="dis_per">in percent
                                                              			<input type="text" name="dis_per" class="form-control form-control-solid" id="add_per">
                                                              		<td>                                                            
                                                              			<input type="radio" name="disc"  id="dis_amount">in amount

                                                              			<input type="text" name="dis_amount" class="form-control form-control-solid" id="add_amount"></td>

                                                              	</tr>
                                                              	<tr>
                                                              		
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td></td>
                                                              		<td>To be paid</td>
                                                              		<td>                                                            
                                                              			<input type="text" name="pay" class="form-control form-control-solid validate" id="pay"  readonly></td>
                                                              	</tr>
                                                              	
															</table>
															
 														</div>
                                                        <div class="col-sm-6 my-2">
															 <label  class="required form-label">Payment Mode.</label>
															 <select name="paymode" class="form-select form-select-solid" id="paymode">
															 	<option value=""><--please select--></option>
															 	option
															 <?php 
															   foreach($payment as $value)
															   {
															   	 ?>
															   	 <option value="<?php echo $value['mode_code']; ?>"><?php echo $value['modename'] ?></option>
															   <?php }
															 ?>
															 </select>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Cheque Number.</label>
															<input type="text" id="cheque" name="cheque" class="form-control form-control-solid"
															readonly>
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Bank & Branch.</label>
															<input type="text" id="bank" name="bank" class="form-control form-control-solid">
 														</div>
 														<div class="col-sm-6 my-2">
															 <label  class="required form-label">Payment Status.</label>
															<select name="status" id="status" class="form-select form-select-solid" style="background:#FF6666;color: #ffffff;" >
																<option value="0"  style="background:#FF6666">panding</option>
																<option value="1" style="background:#77A977">paid</option>
															</select>
 														</div>
													</div>
													<div class="row">
														<div class="col-sm-12 text-center">
															<button type="submit" class="btn btn-primary" id="submit_btn" style="width:50%;margin:20px;padding: 10px;">
																submit
															</button>
														</div>
													</div>
													<!--end::Wrapper-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Content-->
									<!--begin::Sidebar-->
									
									<!--end::Sidebar-->
								</div>
								<!--end::Layout-->
							</div>
							<!--end::Container-->
						</div>
<script>
     
     //status 
     //
     $('#status').change(function()
     {
       var status = $('#status').val();
      
       if(status == 1)
       {
       	  $('#status').css('background','#77A977');
       }
       if(status == 0)
       {
       	  $('#status').css('background','#FF6666');
       }
          
     });
    

     //pay mode 
     //
      $('#paymode').change(function(event) 
      {

      	var mode = $('#paymode').val();

      	if(mode == 2)
      	{
           $('#cheque').removeAttr('readonly')
      	}
      	else 
      	{
      		$('#cheque').attr('readonly',true)
      	}
     
      });
    //check box 
    //
    //
   
     
     $('#dis_per').click(function()
     {
     	  $('#add_per').removeAttr('readonly');
          $('#add_amount').attr('readonly', 'true');
          var gt = $('#Gt').val();
         
          if(gt == "")
          {
          	alert('please fill above details first');
          }
          else 
          {

          	var precent =  $('#add_per').val();

          	var discount = gt - (gt*precent/100);

          	$('#pay').val(discount);
          }

     });
     $('#dis_amount').click(function()
     {    
     	   $('#add_amount').removeAttr('readonly');
          $('#add_per').attr('readonly', 'true');
           var gt = $('#Gt').val();
          if(gt == "")
          {
          	alert('please fill above details first');
          }
          else 
          {
          	var amount =  $('#add_amount').val();

          	var discount = gt - amount;

          	$('#pay').val(discount);
          }
          
     });

     $('#add_per').on('keyup', function(event) 
     {
     	event.preventDefault();
     	
        
          var gt = $('#Gt').val();
         
          if(gt == "")
          {
          	alert('please fill above details first');
          }
          else 
          {

          	var precent =  $('#add_per').val();

          	var discount = gt - (gt*precent/100);

          	$('#pay').val(discount);
          }
     });

    $('#add_amount').on('keyup', function(event) 
     {
     	event.preventDefault();
     	
        
         var gt = $('#Gt').val();

          if(gt == "")
          {
          	alert('please fill above details first');
          }
          else 
          {
          	var amount =  $('#add_amount').val();

          	var discount = gt - amount;

          	$('#pay').val(discount);
          }
     });

	function getprice(id,val)
	{


         var price = <?php echo json_encode($charges); ?>;
       
         code = val

        
         $.each(price, function(index, val) 
         {
         	if(val.code == code)
         	{
         		var charge = val.charge
         		$('#price'+id).val(charge);
         		var pax = $('#pax'+id).val();
         		if(pax == 0)
         		{
         			pax =1;
         		}
                var price = $('#price'+id).val();
                var total = pax*price;
                $('#total'+id).val(total);
               

         	}
         
         });

        var grand_total = 0
   $('.total_val').each(function() 
	{ 


		grand_total += parseInt($(this).val()) 

		$('#Gt').val(grand_total);
          
          $('#pay').val(grand_total);

	});
          if($('#dis_per').is(':checked'))
             {
                var per = $('#add_per').val();
                var discount = grand_total - (grand_total*per/100);

          	 $('#pay').val(discount);

             }
            
             if ($('#dis_amount').is(':checked')) 
             {
                var per = $('#add_amount').val();
                var discount = grand_total - per;

          	 $('#pay').val(discount);



             }
            
             
       
         
	}

	function count(id,val)
	{    
       
       var desc = $('#desc'+id).val();

       if(desc== "")
       {
       	alert('please select description first!');
       }



		 var price = <?php echo json_encode($charges); ?>;
         var price = $('#price'+id).val();
         
         var total = price*val;

         $('#total'+id).val(total);
       
        var grand_total = 0
     $('.total_val').each(function() 
	{ 


		grand_total += parseInt($(this).val()) 

        $('#Gt').val(grand_total);
        $('#pay').val(grand_total);

	});

	if($('#dis_per').is(':checked'))
             {
                var per = $('#add_per').val();
                var discount = grand_total - (grand_total*per/100);

          	 $('#pay').val(discount);

             }
             
             if ($('#dis_amount').is(':checked')) 
             {
                var per = $('#add_amount').val();
                var discount = grand_total - per;

          	 $('#pay').val(discount);



             }
           
             
           
       

	}
						$(document).ready(function() 
{

	 
	 
   var count = 1;
	$('#add_button').click(function(event) 
	{
		 event.preventDefault();
		
	count++;
          
       $('#add').append('<tr><td><select name="lodge[]" class="form-select form-select-solid lodge validate" aria-label="Select example"><option value=""><--please select---></option><?php foreach($rooms as $room){?><option><?php echo $room['name']; ?></option><?php }?></select></td><td><select name="charge[]" class="form-select form-select-solid charge validate" id="desc'+count+'" onchange="getprice('+count+',this.value)" aria-label="Select example"><option value=""><--please select---></option><?php foreach($charges as $charge){?><option id="change'+count+'" value="<?php echo $charge['code'] ?>"><?php echo $charge['member']; ?></option><?php }?></select></td><td><input type="number" id="pax'+count+'" onkeyup="count('+count+',this.value)" onchange="count('+count+',this.value)" name="pax[]" class="form-control form-control-solid pax validate"></td><td><input type="text" name="price[]" class="form-control form-control-solid price validate"  id="price'+count+'" readonly></td><td><input type="text" name="total[]" class="form-control form-control-solid total_val validate" id="total'+count+'" readonly></td><td><button class="btn btn-danger cancel">X</button></div></div></td></tr>');
		
	});
	$('#add').on('click', '.cancel', function(e) {
    e.preventDefault();


    var grand_total = 0;
    $(this).closest('tr').remove();
    $('.total_val').each(function() 
	{ 


		grand_total += parseInt($(this).val()) 

        $('#Gt').val(grand_total)

	});
     
});
});





	</script>
    <script type="text/javascript">
    	//jquery validation
    	//
    	 $('.alert-danger').hide();
    	 $('#submit_btn').click(function(event) 
    	 {  

    	 	event.preventDefault();
            var name = $('#fullname').val();
    	 	var lodge = $('#lodge').val();
    	 	var pobox = $('#pobox').val();
    	 	var tel   = $('#tel').val();
    	 	var town  = $('#town').val();
    	 	var email =$('#email').val();
    	 	var arrival= $('#arrival_date').val();
    	 	var dept   = $('#dept_date').val();
           
            console.log(name+lodge+pobox+tel+town+email+arrival+dept);
    	 	var name_err = false;
    	 	var lodge_err = false;
    	 	var pobox_err = false;
    	 	var tel_err   = false;
    	 	var town_err = false;
    	 	var email_err = false;
    	 	var arrival_err = false;
    	 	var dept_err  = false;
            var validate_err = false;
             function check_name()
             {

            
    	 	if( name == "")
    	 	{
    	 		
                  name_err = true;
                $('.name-error').html('please enter name !');
                $('.name-error').show();

    	 	}
    	 	else 
    	 	{
    	 		 name_err = false ;
                
                $('.name-error').hide();

             }
    	 	}
    	 	function check_lodge()
             {

             
    	 	if( lodge == "" )
    	 	{
    	 		
                lodge_err = true;
                $('.lodge-error').html('please select lodge!');
                $('.lodge-error').show();

    	 	}
    	 	else 
    	 	{
    	 		lodge_err = false ;
                
                $('.lodge-error').hide();

             }
    	 	}
    	 	function check_pobox()
             {

               poboxreg = "^[0-9]+$";
    	 	if( pobox == "" || !pobox.match(poboxreg))
    	 	{
    	 		
                var pobox_err = true;
                $('.pobox-error').html('please enter valid zipcode!');
                $('.pobox-error').show();

    	 	}
    	 	else 
    	 	{
    	 		 pobox_err = false ;
                
                $('.pobox-error').hide();

             }
    	 	}
    	 	function check_tel()
             {

               telreg = "^[0-9]+$";
    	 	if( tel == "" || !tel.match(telreg))
    	 	{
    	 		
                var tel_err = true;
                $('.tel-error').html('please enter valid phonenumber!');
                $('.tel-error').show();

    	 	}
    	 	else 
    	 	{
    	 		 tel_err = false ;
                
                $('.tel-error').hide();

             }
    	 	}
    	 	function check_email()
             {

               emailreg = "^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$";
    	 	if( email == "" || !email.match(emailreg))
    	 	{
    	 		
                email_err = true;
                $('.email-error').html('please enter valid email!');
                $('.email-error').show();

    	 	}
    	 	else 
    	 	{
    	 		email_err = false ;
                
                $('.email-error').hide();

             }
    	 	}
    	 	function check_town()
             {

             
    	 	if( town == "")
    	 	{
    	 		
                 town_err = true;
                $('.town-error').html('please enter town!');
                $('.town-error').show();

    	 	}
    	 	else 
    	 	{
    	 		 town_err = false ;
                
                $('.town-error').hide();

             }
    	 	}
    	 	function check_arrival()
             {

              
    	 	if( arrival == "")
    	 	{
    	 		
                arrival_err = true;
                $('.arrival-error').html('please select arrival date!');
                $('.arrival-error').show();

    	 	}
    	 	else 
    	 	{
    	 	    arrival_err = false ;
                
                $('.arrival-error').hide();

             }
    	 	}
    	 	function check_dept()
             {

              
    	 	if( dept == "")
    	 	{
    	 		
                dept_err = true;
                $('.dept-error').html('please select departure date!');
                $('.dept-error').show();

    	 	}
    	 	else if( dept < arrival)
    	 	{
    	 	    dept_err = true;
                $('.dept-error').html('please select proper departure date!');
                $('.dept-error').show();
    	 	}
    	 	else 
    	 	{
    	 	    arrival_err = false ;
                
                $('.dept-error').hide();

             }
    	 	}

    	 	function check_validate()
    	 	{
    	 		
    	 		
    	 		$('.validate').each(function()
    	 		{    

                        
                       if($(this).val()=="")
                       {
                          validate_err = true;
                          
                       }
                       else
                       {
                       	
                          $('.table-error').hide();

                       }
    	 		});

    	 		if(validate_err == true)
    	 		{
    	 			      validate_err = true;
                       	 $('.table-error').html('please fill the table content correctly')
                       	 $('.table-error').show();
    	 		}
    	 	}
           
            check_name();
            check_lodge();
            check_pobox();
            check_tel();
            check_town();
            check_email();
            check_arrival();
            check_dept();
            check_validate();
    	 	

            
            if(name_err == true || lodge_err == true || pobox_err == true || tel_err   == true || town_err == true  || email_err == true  || arrival_err == true || dept_err  == true || validate_err == true)
            {
            	swal("Error!", "you have some errors, please correct it !", "error");
            	

            }
            else
            {
            	 $('#kt_invoice_form').submit();
            }
            
    	 
    	 });
    	
    	
    </script>


<?= $this->endSection() ?>

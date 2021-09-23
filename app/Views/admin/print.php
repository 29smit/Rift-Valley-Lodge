<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
 voucher | lodge
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<style>

.bdr {
  border: none;
  padding-left: 5px;
  border: 1px solid black;
  border-collapse: ;
  border-width: thin;
}

@font-face
{
	font-family: 'old';
	src: url('<?php echo base_url('/assets/OLD.ttf') ?>');
}

.title
{
	font-family: old;
}


</style>
<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-lg-row">
									<!--begin::Content-->
									<div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
										<!--begin::Card-->
										<div class="card">

											
											<!--begin::Card body-->
											<div class="card-body p-12">
												<div class="container">
                                                                  <div class="row">
												
												<div class="col-md-4"> <button id="pdf" class="btn btn-danger">TO PDF</button></div>
												
												<div class="col-md-4"> <button id="email" class="btn btn-success">Email</button></div>

											</div>
											</div>
											<br>
											<hr>
                                                           <table border="2" id="voucher">
                                                           	<tr>
                                                           		<td colspan="12" class="title" style="text-align: center;"><h1><b>Rift Valley Lodge No. 4788 E.C.</b></h1></td>
                                                           		
                                                           	</tr>
                                                           	<tr>
                                                           		<td colspan="12" style="text-align: center;"><h2><b>Naivasha</b></h2></td>
                                                           		
                                                           	</tr>
                                                           	<tr >

                                                           		<td class="bdr text-center" colspan="8"><h3><b>Residence Booking Form<b></h3></td>
                                                           		<td class="bdr" colspan="2" id="v_no"><h3><b>Voucher No.</b></h3></td>
                                                           		<td class="bdr" colspan="2"><h3><b><?php echo $data[0]['v_no']; ?></b><h3></td>
                                                           		
                                                           	</tr>
                                                           	<tr>
                                                           		<td  class="bdr" colspan="2"><b>Booked By:</b></td>
                                                           		<td class="bdr" colspan="6"><?php echo $data[0]['booked_by']; ?></td>
                                                           		
                                                           		<td class="bdr" colspan="2"><b>Booking Date:</b></td>
                                                           		<td  class="bdr" colspan="2"><?php echo date('d-M-Y',strtotime($data[0]['booking_date'])); ?></td>
                                                           	</tr>
                                                           	<tr>
                                                           		<td class="bdr" colspan="2" id="v_name" ><b>Name:</b></td>
                                                           		<td class="bdr" colspan="6"><?php echo $data[0]['name']; ?></td>
                                                           
                                                           		<td class="bdr" colspan="2"><b>Lodge Name:</b></td>
                                                           		<td class="bdr" colspan="2"><?php echo $data[0]['lodgename']; ?></td>
                                                           	</tr>
                                                           	<tr>
                                                           		<td class="bdr" colspan="2" id="v_name" ><b>P. O. Box:</b></td>
                                                           		<td class="bdr" colspan="6"><?php echo $data[0]['pobox']; ?></td>
                                                           
                                                           		<td class="bdr" colspan="2"><b>Tel:</b></td>
                                                           		<td class="bdr" colspan="2"><?php echo $data[0]['tel']; ?></td>
                                                           	</tr>
                                                           	<tr>
                                                           		<td class="bdr" colspan="2" id="v_name" ><b>Town:</b></td>
                                                           		<td class="bdr" colspan="6"><?php echo $data[0]['town']; ?></td>
                                                           
                                                           		<td class="bdr" colspan="2"><b>Email:</b></td>
                                                           		<td class="bdr" colspan="2"><?php echo $data[0]['email']; ?></td>
                                                           	</tr>
                                                           	<tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	</tr>
                                                           	<tr>
                                                           		<td class="bdr" colspan="12" style="text-align:center;"><h1>BOOKING INFORMATION</h1></td>
                                                           	</tr>
                                                           		<tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	</tr>
                                                           	<tr>
                                                           		<td class="bdr" colspan="3"><b>Arrival Date:</b></td>
                                                           		<td class="bdr" colspan="3"><?php echo date('D',strtotime($data[0]['arrival_date'])); ?>-<?php echo date('d-M-Y',strtotime($data[0]['arrival_date'])); ?></td>
                                                           		<td colspan="6">&nbsp;</td>
                                                           	</tr>
                                                           		<tr>
                                                           		<td class="bdr" colspan="3"><b>Departure Date:</b></td>
                                                           		<td class="bdr" colspan="3"><?php echo date('D',strtotime($data[0]['dept_date'])); ?>-<?php echo date('d-M-Y',strtotime($data[0]['dept_date'])); ?></td>
                                                           		<td colspan="6">&nbsp;</td>

                                                           	</tr>
                                                           	<tr>
                                                           		<?php 
                                                           		  $date1 = new DateTime(date('Y-m-d',strtotime($data[0]['arrival_date'])));
                                                                 $date2 = new DateTime(date('Y-m-d',strtotime($data[0]['dept_date'])));

                                                                  // this calculates the diff between two dates, which is the number of nights
                                                                 $numberOfNights= $date2->diff($date1)->format("%a"); ?>
                                                           		<td class="bdr" colspan="3"><b>Number Of Nights:</b></td>
                                                           		<td class="bdr" colspan="3"><?php echo $numberOfNights; ?></td>
                                                           		<td colspan="6">&nbsp;</td>
                                                           		
                                                           	</tr>
                                                           	</tr>
                                                           		<tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	     </tr>
                                                           	     <tr>
                                                           	        <td class="bdr"><b>Item</b></td>
                                                           	        <td class="bdr" colspan="2"><b>Room</b></td>
                                                           	        <td class="bdr" colspan="4"><b>Description</b></td>
                                                           	        <td class="bdr" ><b>Pax</b></td>
                                                           	        <td class="bdr" colspan="2"><b>K. Shs. @</b></td>
                                                           	        <td class="bdr" colspan="2"><b>Total K. Shs.</b></td>
                                                           	     </tr>
                                                           	     
                                                           	     <?php if (isset($pax)) 
                                                           	     {     


                                                           	       	$i= 1;
                                                           	       	$paxvalue = 0;                
                                                           	       	foreach($pax as $value)
                                                           	     	     {

                                                           	     	?>
                                                           	     	  <tr>
                                                           	        <td class="bdr"><?php echo $i; ?></td>
                                                           	        <td class="bdr" colspan="2"><?php echo $value['lodge']; ?></td>
                                                           	        <td class="bdr" colspan="4"><?php echo $value['package'];?></td>
                                                           	        <td class="bdr" ><?php echo $value['pax']; ?></td>
                                                           	        <td class="bdr" colspan="2"><?php echo $value['amount']; ?></td>
                                                           	        <td class="bdr" colspan="2"><?php echo $value['total_amount']; ?></td>
                                                           	        </tr> 
                                                           	         <?php  
                                                           	               $i++;
                                                           	               $paxvalue+= intval($value['pax']); 

                                                           	     	     
                                                           	           }
                                                           	     }

                                                           	     	 ?>
                                                           	     	  
                                                           	        <tr>
                                                           	        <td class="bdr" colspan="7">&nbsp;</td>
                                                           	        <td class="bdr" ><b><?php echo $paxvalue; ?></b></td>
                                                           	        <td class="bdr" colspan="2"><b>Total Donation:</b></td>
                                                           	        <td  class="bdr" colspan="2"><b><?php 
                                                           	        
                                                           	        	echo $data[0]['grand_total'];
                                                           	         
                                                           	    ?></b></td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        <td class="bdr" colspan="8">&nbsp;</td>
                                                           	        <td class="bdr" colspan="2"><b>Discount:</b></td>
                                                           	        <td class="bdr" colspan="2"><?php if ($data[0]['dis_per']!=0) 
                                                           	        {
                                                           	        	echo $data[0]['dis_per'].'%';
                                                           	        }
                                                           	        else
                                                           	        {
                                                           	        	echo $data[0]['dis_amount'];
                                                           	        } 
                                                           	    ?></td>
                                                           	        </tr> 
                                                           	        <tr>
                                                           	        <td class="bdr" colspan="8">&nbsp;</td>
                                                           	     
                                                           	        <td class="bdr" colspan="2"><b>Due Donation:</b></td>
                                                           	        <td class="bdr" colspan="2"><b><?php 
                                                           	        
                                                           	        	echo $data[0]['to_pay'];
                                                           	         
                                                           	    ?></b></td>
                                                           	        </tr>
                                                           	        <tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	     </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3"><b>Payment Mode:</b></td>
                                                           	        	<td class="bdr" colspan="4"><?php 
                                                                                      foreach($payment as $paydata) 
                                                                                      {
                                                                                      	if ($paydata['mode_code']==$data[0]['pay_mode']) 
                                                                                      	{
                                                                                      		echo $paydata['modename'];
                                                                                      		
                                                                                      	}
                                                                                         
                                                                                      }


 
                                                           	                      ?></td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3"><b>Cheque Number:</b></td>
                                                           	        	<td  class="bdr"colspan="4"><?php 
                                                                                          
                                                                                          if(!empty($data[0]['cheque_no']))
                                                                                          {
                                                                                          	echo $data[0]['cheque_no'];
                                                                                          }
                                                                                          else
                                                                                          {
                                                                                          	echo "N/A";
                                                                                          }


 
                                                           	                      ?></td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3"><b>Bank & Branch:</b></td>
                                                           	        	<td class="bdr" colspan="4"><?php 
                                                                                          
                                                                                         
                                                                                          	echo $data[0]['bank'];
                                                                                         
 
                                                           	                      ?></td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3"><b>Payment Status:</b></td>
                                                           	        	<td class="bdr" colspan="4"  <?php if ($data[0]['payment_status']==1){ echo'style="background:#77A977"'; }else{ echo'style="background:#FF6666"';} ?> ><?php 
                                                                                          
                                                                                         
                                                                                          if ($data[0]['payment_status']==1) 
                                                                                          {
                                                                                              echo '<b><i style="color:#ffffff">paid</i></b>';
                                                                                          }
                                                                                          else
                                                                                          {
                                                                                          	echo '<b><i style="color:#ffffff">panding</i></b>';
                                                                                          }
                                                                                         
 
                                                           	                      ?></td>
                                                           	        </tr>
                                                           	         <tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	     </tr>
                                                           	        <tr>

                                                           	        	<td class="bdr" colspan="12">
                                                           	        		All payment must be made at the time of booking by CHEQUE and receipt must be obtained for the payment made.
                                                           	        	</td>

                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="12">
                                                           	        		NO CASH PAYMENTS TO BE MADE AT THE LODGE.
                                                           	        	</td>
                                                           	        	
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="12">
                                                           	        		No refunds for any cancellations. All cheques must be written in favour of RIFT VALLEY LODGE.
                                                           	        		
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="12">
                                                           	        		Above Donation are minimum chargable Donation.
                                                           	        		
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td colspan="12">
                                                           	        		Cottage booking will be charged for minimum of 9-pax if it has booked for less than 9-people. If Cottage is occupied
                                                           	        		
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="12">
                                                           	        		by more than 9 people will be charged accordingly.
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="12">
                                                                        AT LEAST ONE OF THE LODGE MEMBER MUST ACCOMPANY WITH THE VISITORS/GUESTS DURING THEIR ENTIRE STAY.
                                                           	        		
                                                           	        	</td>
                                                           	        </tr>
                                                           	         <tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	     </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" style="text-align:center;" colspan="9">
                                                           	        		<h1>BANKING DETAILS</h1>
                                                           	        	</td>
                                                           	        	
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        		<b>Account Name:</b>
                                                           	        	</td>
                                                           	        	<td class="bdr" colspan="6">
                                                           	        		RIFT VALLEY LODGE NO. 4788
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        		<b>Account No:</b>
                                                           	        	</td>
                                                           	        	<td class="bdr" colspan="6">
                                                           	        		9 5 8 6 0 1 0 0 0 0 0 5 2 0
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        		<b>Bank Name:</b>
                                                           	        	</td>
                                                           	        	<td class="bdr" colspan="6">
                                                           	        		BANK OF BARODA (K.) LTD.
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        		<b>Branch & Address:</b>
                                                           	        	</td>
                                                           	        	<td  class="bdr" colspan="6">
                                                           	        		SARIT CENTRE BRANCH, NAIROBI.
                                                           	        	</td>
                                                           	        </tr>
                                                           	         <tr>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           		<td>&nbsp;</td>
                                                           	     </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" style="text-align:center;" colspan="12">
                                                           	        	<h1>Checkin time: 12:00 PM & Checkout Time: 11:00 AM	
                                                           	        		</h1>
                                                           	        	</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        	Harshes Patel	
                                                           	        	</td>
                                                           	        	
                                                           	        	<td class="bdr" colspan="6">
                                                           	        		Mob. 0737-411175
                                                           	        	</td>
                                                           	        	
                                                           	        
                                                           	        	<td class="bdr" colspan="3">Email: harshes@hotmail.com</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        	J. C. Patel	
                                                           	        	</td>
                                                           	        
                                                           	        	<td class="bdr" colspan="6">
                                                           	        		Mob. 0722-519924
                                                           	        	</td>
                                                           	        	
                                                           	        	<td class="bdr" colspan="3">Email: jessieassociates@yahoo.com</td>
                                                           	        </tr>
                                                           	        <tr>
                                                           	        	<td class="bdr" colspan="3">
                                                           	        	Vijay R. Patel	
                                                           	        	</td>
                                                           	        
                                                           	        	<td class="bdr" colspan="6">
                                                           	        		Mob. 0737-100866
                                                           	        	</td>
                                                           	        	
                                                           	        	<td class="bdr" colspan="3">Email: dhruvijay@gmail.com</td>
                                                           	        </tr>
                                                           	         <tr>
                                                           	         	<td class="bdr" style="text-align:center;" colspan="12">
                                                           	        		<h1>This voucher must be presented on your arrival.</h1>
                                                           	        	</td>
                                                           	         </tr>
                                                           	        	
                                                           	        
                                                           </table>

												
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
    	
<script type="text/javascript">


     var no = $('#v_no').val();
     var name = $('#v_name').val();
     var file_name = no+' '+name;


  $('#pdf').on('click',function(){
  
        var element = document.getElementById('voucher');
        var opt = {
           margin:       1,
          filename:     'myfile.pdf',
  // image:        { type: 'jpeg', quality: 0.98 },
  // html2canvas:  { scale: 1 },
  // jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
};


       html2pdf().set(opt).from(element).save();
      // $("#voucher").tableHTMLExport({type:'pdf',filename:'sample.pdf'});
  })

   // $("body").on("click", "#pdf", function () {
   //          html2canvas($('#voucher')[0], {
   //              onrendered: function (canvas) {
   //                  var data = canvas.toDataURL();
   //                  var docDefinition = {
   //                      content: [{
   //                          image: data,
   //                          width: 500
   //                      }]
   //                  };
   //                  pdfMake.createPdf(docDefinition).download('voucher.pdf');
   //              }
   //          });
   //      });
   
   
   $('#email').click(function()
   {
        var v_no = <?php echo $data[0]['v_id']; ?>;
   	    $.ajax(
   	    {
   	    	url:'/email',
   	    	type:'POST',
   	    	data:{id:v_no},
   	    	success:function (result,status,xhr) 
   	    	{
   	    		alert('result');
   	    	}
          
   	    });
      
   });

</script>


<?= $this->endSection() ?>

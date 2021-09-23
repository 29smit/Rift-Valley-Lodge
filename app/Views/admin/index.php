<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
Dashboard | lodge
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<style>
    
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
                                                <div class="card-body p-0">
                                                <!--begin::Chart-->
                                               
                                                <!--end::Chart-->
                                                <!--begin::Stats-->
                                                <div class="card-p mt-n20 position-relative">
                                                    <!--begin::Row-->
                                                    <div class="row g-0">
                                                        <!--begin::Col-->
                                                        <div class="col-md-3" style="">
                                                            <div class="card shadow-sm mt-5 bg-light-warning" style="width: 18rem; ">
                                                             
                                                             <div class="card-body" >
                                                                <span ><i class="fas fa-file-invoice-dollar m-2" style="font-size:3rem;color: #FFC700;"></i></span>
                                                               <h5 class="card-title" style="color:#FFC700;">Total Vouchers</h5>
                                                               <p class="card-text"><h1  style="color:#FFC700;"><?php echo $all; ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-md-3">
                                                             <div class="card shadow-sm mt-5 bg-light-success" style="width: 18rem;">
                                                             
                                                             <div class="card-body">
                                                                <span ><i class="fas fa-file-invoice-dollar m-2" style="font-size:3rem;color: #50CD89;"></i></span>
                                                               <h5 class="card-title" style="color: #50CD89;">Paid Vouchers</h5>
                                                               <p class="card-text"><h1 style="color: #50CD89;"><?php echo $paid; ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                            
                                                        </div>
                                                        <!--end::Col-->
                                                    
                                                    
                                                    <!--begin::Row-->
                                                    
                                                        <!--begin::Col-->
                                                        <div class="col-md-3">
                                                            <div class="card shadow-sm mt-5 bg-light-info" style="width: 18rem; ">
                                                             
                                                             <div class="card-body">
                                                                <span ><i class="fas fa-file-invoice-dollar m-2" style="font-size:3rem;color: #009EF7;"></i></span>
                                                               <h5 class="card-title" style="color:#009EF7">Panding Vouchers</h5>
                                                               <p class="card-text"><h1 style="color: #009EF7;"><?php echo $panding; ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                            
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                       <div class="col-md-3">
                                                         <div class="card shadow-sm mt-5 bg-light-danger" style="width: 18rem;">
                                                             
                                                             <div class="card-body">
                                                                <span ><i class="fas fa-file-invoice-dollar m-2" style="font-size:3rem;color: #F1416C;"></i></span>
                                                               <h5 class="card-title" style="color:#F1416C">Cancelled Vouchers</h5>
                                                               <p class="card-text"><h1 style="color:#F1416C"><?php echo $cancel; ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                           
                                                       </div>                                                   
                                                    </div>
                                                    <!--end::Row-->
                                                    <!--begin::Row-->
                                                    <div class="row g-0">
                                                        <!--begin::Col-->
                                                        <div class="col-md-3" style="">
                                                            <div class="card shadow-sm mt-5 bg-light-warning" style="width: 18rem;">
                                                             
                                                             <div class="card-body">
                                                                <span ><i class="fas fa-money-bill-alt m-2" style="font-size:3rem;color: #FFC700;"></i></span>
                                                               <h5 class="card-title" style="color:#FFC700;">Total paid Amount</h5>
                                                               <p class="card-text"><h1 style="color:#FFC700;"><?php if ($paid_amount[0]->to_pay != 0) {
                                                                                           echo $paid_amount[0]->to_pay;
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            echo "0";
                                                                                        }



                                                                                         ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-md-3">
                                                             <div class="card shadow-sm mt-5 bg-light-success" style="width: 18rem;">
                                                             
                                                             <div class="card-body">

                                                                <span ><i class="fas fa-money-bill-alt m-2" style="font-size:3rem;color: #50CD89;"></i></span>
                                                               <h5 class="card-title" style="color: #50CD89;">Total Panding Amount</h5>
                                                               <p class="card-text"><h1 style="color: #50CD89;"><?php if ($panding_amount[0]->to_pay != 0) {
                                                                                           echo $panding_amount[0]->to_pay;
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            echo "0";
                                                                                        }



                                                                                         ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                            
                                                        </div>
                                                        <!--end::Col-->
                                                    
                                                    
                                                    <!--begin::Row-->
                                                    
                                                        <!--begin::Col-->
                                                        <!-- <div class="col-md-3">
                                                            <div class="card shadow-sm mt-5 bg-light-info" style="width: 18rem; border: 2px solid #000;border-radius: 20px;">
                                                             
                                                             <div class="card-body">
                                                                <span ><i class="fas fa-file-invoice-dollar m-2" style="font-size:3rem;color: #000;"></i></span>
                                                               <h5 class="card-title">Panding Vouchers</h5>
                                                               <p class="card-text"><h1><?php //echo $panding; ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                            
                                                        </div> -->
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                       <!-- <div class="col-md-3">
                                                         <div class="card shadow-sm mt-5 bg-light-danger" style="width: 18rem; border: 2px solid #000;border-radius: 20px;">
                                                             
                                                             <div class="card-body">
                                                                <span ><i class="fas fa-file-invoice-dollar m-2" style="font-size:3rem;color: #000;"></i></span>
                                                               <h5 class="card-title">Cancelled Vouchers</h5>
                                                               <p class="card-text"><h1><?php //echo $cancel; ?></h1></p>
                                                               
                                                             </div>
                                                           </div>
                                                           
                                                       </div>  -->                                                  
                                                    </div>
                                                    <br>
                                                    <hr>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h1>Datewise Bookings</h1>
                                                               <table id="kt_datatable_example_1" class="table table-striped gy-7 gs-7">
                                                                <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>No</th>
            <th>Date</th>
            <th>Bookings</th>
            
        </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php if (isset($books)) 
                                                                { 
                                                                    $i = 1;
                                                                   foreach($books as $value)
                                                                   {?>
                                                                     <tr>
                                                                     <td><?=$i?></td>
                                                                     <td><?php echo date('d-M-Y',strtotime($value['booking_date'])) ?></td>
                                                                     <td><?=$value['total_count']?></td>
                                                                     </tr>

                                                                   <?php

                                                                      $i++;
                                                                      }
                                                                }
                                                                ?>

       
        
                                                                </tbody>
                                                            </table>                                                    
                                                        </div>
                                                    </div>
                                                    <!--end::Row-->
                                                    <hr>
                                                    <!--begin::Row-->
                                                    <script>

                                              document.addEventListener('DOMContentLoaded', function() 
                                              {
                                                var calendarEl = document.getElementById('calendar');
                                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                                 initialView: 'dayGridMonth'
                                                     });
                                                        calendar.render();

                                                        calendar.on('dateClick', function(info) 
                                                        {
                                                         var date = info.dateStr
                                                           
                                                           $.ajax(
                                                           {
                                                             url:'get_booking',
                                                             type:'POST',
                                                             data:{date:date},
                                                             success:function(result,status,xhr)
                                                             {
                                                                $('#c-data').html(result);

                                                             },

                                                           });

                                                        });
                                                       
                                               });

    </script>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div id='calendar'></div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3>check Booking</h3>
                                                           <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col">#</th>
                                                                      <th scope="col">Room Name</th>
                                                                      <th scope="col">Status</th>
                                                                    </tr>
                                                                  </thead>
                                                                    <tbody id="c-data">
                                                                      
                                                                    </tbody>
                                                                  </table>
                                                        </div>
                                                        
                                                    </div>
                                
                                <!--end::Row-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <script>

                            $(document).ready(function()
                            {
                                 $('#kt_datatable_example_1').DataTable( {
                          dom: 'Bfrtip', 
                         buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ] 
                         } );

                            });
                        
                        </script>
<?= $this->endSection() ?>

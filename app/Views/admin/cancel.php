<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
vouchers | lodge
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
											
											<!--begin::Card body-->
											<div class="card-body p-12">
												<table id="kt_datatable_example_1" class="table table-row-bordered gy-5">
    <thead>
        <tr class="fw-bold fs-6 text-muted">
            <th>#Voucher No</th>
            <th>Name</th>
            <th>Booked By</th>
            <th>Booking Date</th>
            <th>Edit/Show</th>
            <th>Revert</th>
        </tr>
    </thead>
    <tbody id="t-data">
         <?php 
         foreach($data as $value) 
         {
           ?>
           <tr>
            <td><?=$value['v_no'];?></td>
            <td><?=$value['name'];?></td>
            <td><?=$value['booked_by'];?></td>
            <td><?=$value['booking_date'];?></td>
            <td><a href="update/<?=$value['v_id']?>"><button  class="btn btn-primary"><i class="fas fa-eye"></i> / <i class="fas fa-edit"></i></button></a></td>
            <td><button onclick="warning(<?=$value['v_id']?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
            

        <?php  }      


         ?>

        
        
    </tbody>
    <tfoot>
        <tr>
            <th>#Voucher No</th>
            <th>Name</th>
            <th>Booked By</th>
            <th>Booking Date</th>
            <th>Edit/Show</th>
            <th>Revert</th>
        </tr>
    </tfoot>
</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                                                  
<script type="text/javascript">
	$(document).ready(function() {
    $('#kt_datatable_example_1').DataTable( {
     dom: 'Bfrtip', 
        buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ] 
    } );
} );
      function show_data()
      {
      	$.ajax(
      {
             type:'GET',
             url : '/cancel_voucher',
             success:function(result,status,xhr)
             {
             	  $('#t-data').html(result);
             }

      });
      }
	function warning(id)
	{

		var id = id;
		swal({
				title: "Are you sure?",
				text: "This data will be reverted!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
               })
          .then((willDelete) => {
                if (willDelete) 
                {

                       $.ajax(
                       {
                       	type: 'POST',
                       	url : '/revert',
                       	data : {v_id : id},
                       	success : function (result,status,xhr) 
                       	{
                       	  if(result == true)
                       	  {
                              show_data();
                       	  	swal(" Your data  has been reverted!", {
                              icon: "success",
                                });
                       	  }
                       	}

                       });
                       
                } 
                else {
                      swal("Your data is safe!");
                     }
                });

	}
</script>
<?= $this->endSection() ?>

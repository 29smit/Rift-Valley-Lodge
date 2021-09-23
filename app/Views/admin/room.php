<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
rooms | lodge
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
            <th>#Sr. No</th>
            <th>Member</th>
            <th>Code</th>
            <th>Charge</th>
            <th>Update</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody id="t-data">
         <?php 
          $i = 1;
         foreach($data as $value) 
         { 
           
           ?>
           <tr>
            <td><?php echo $i; ?></td>
            <td><?=$value['member'];?></td>
            <td><?=$value['code'];?></td>
            <td><?=$value['charge'];?></td>

            
            <td><a href="update_room/<?=$value['c_id']?>"><button  class="btn btn-primary"><i class="fas fa-eye"></i> / <i class="fas fa-edit"></i></button></a></td>
            <td><button onclick="warning(<?=$value['c_id']?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
           
        </tr>
            

        <?php $i++; }      


         ?>

        
        
    </tbody>
    <tfoot>
        <tr>
            <th>#Sr. No</th>
            <th>Member</th>
            <th>Code</th>
            <th>Charge</th>
            <th>Update</th>
            <th>Delete</th>
            
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
             url : '/get_charge',
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
				text: "Once deleted, you will not be able to recover this data!",
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
                       	url : '/delete_charge',
                       	data : {r_id : id},
                       	success : function (result,status,xhr) 
                       	{
                       	  if(result == true)
                       	  {
                              show_data();
                       	  	swal(" Your data  has been deleted!", {
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

<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
History | lodge
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
            <th>#No</th>
            <th>User Name</th>
            <th>Action</th>
            <th>Date/Time</th>
            
        </tr>
    </thead>
    <tbody id="t-data">
         <?php
         $i =1; 
         foreach($result as $value) 
         {
           ?>
           <tr>
            <td><?=$i?></td>
            <td><?=$value['name'];?></td>
            <td><?=$value['activity'];?></td>
            <td><?=$value['created_on'];?></td>
           
        </tr>
            

        <?php  $i++; }      


         ?>

        
        
    </tbody>
    <tfoot>
        <tr>
             <th>#No</th>
            <th>User Name</th>
            <th>Action</th>
            <th>Date/Time</th>
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
    
</script>
<?= $this->endSection() ?>

<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
create charge | lodge
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
												<form  method="post" action="<?php echo base_url('update_charge'); ?>/<?=$charge['c_id']?>" name="myform" id="kt_invoice_form">
													<div class="row">
														<div class="col-md-12 text-center">

															
															
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12 m-5">
													    <?php echo csrf_field(); ?>
                                                                     <?php $session = session(); ?>
                                                       			</div>
														<div class="col-sm-12 my-2">
															 <label  class="required form-label">Description:</label>
															<input type="text" id="desc" name="desc" class="form-control form-control-solid" value="<?=$charge['member']?>">
															
														</div>
															<?= isset($validator) ? show_error($validator,'desc'):''; ?>
														<div class="col-sm-12 my-2">
															 <label  class="required form-label">Code</label>
															 
                                                                <input type="text" id="code" name="code" class="form-control form-control-solid" value="<?=$charge['code']?>" >
                                                            
 														</div>
 															<?= isset($validator) ? show_error($validator,'code'):''; ?>
 														<div class="col-sm-12 my-2">
															 <label  class="required form-label">Price</label>
															<input type="number" id="price" name="price" class="form-control form-control-solid" value="<?=$charge['charge']?>" >
															
 														</div>
 															<?= isset($validator) ? show_error($validator,'price'):''; ?>
 	
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

    

<?= $this->endSection() ?>

<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
Password | lodge
<?= $this->endSection(); ?>
<?= $this->section('content') ?>

    <!--begin::Post-->
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <!--begin::Container-->
                            <div id="kt_content_container" class="container">
                                <!--begin::Navbar-->
                                <div class="card mb-5 mb-xl-10">
                                    <div class="card-body pt-9 pb-0">
                                        
                                        <!--begin::Navs-->
                                        <div class="d-flex overflow-auto h-55px">
                                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                                                <!--begin::Nav item-->
                                                
                                                <!--end::Nav item-->
                                                <!--begin::Nav item-->
                                                <li class="nav-item">
                                                    <a class="nav-link text-active-primary me-6 " href="<?php echo base_url('account') ?>">Basic Settings</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-active-primary me-6 active" href="<?php echo base_url('email') ?>">Change Email</a>
                                                </li>
                                                <!--end::Nav item-->
                                                <!--begin::Nav item-->
                                                <li class="nav-item">
                                                    <a class="nav-link text-active-primary me-6 " href="<?php echo base_url('password') ?>">Change Password</a>
                                                </li>
                                                <!--end::Nav item-->
                                                <!--begin::Nav item-->
                                                <!--end::Nav item-->
                                            </ul>
                                        </div>
                                        <!--begin::Navs-->
                                    </div>
                                </div>
                                <!--end::Navbar-->
                                <!--begin::Basic info-->
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bolder m-0">Change Email</h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                     <?php 

                                        $session = session();

                                        if ($session->has('success')) 
                                        {
                                          ?>
                                            <div class="alert alert-success">
                                                <?=$session->getFlashdata('success')?>
                                            </div>

                                        <?php }

                                     ?>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_profile_details" class="collapse show">
                                        <!--begin::Form-->
                                        <form id="kt_account_profile_details_form" method="post" action="<?php echo base_url('change_email'); ?>/<?=$result['u_id']?>" class="form">
                                            <!--begin::Card body-->
                                            <div class="card-body border-top p-9">
                                               
                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8 fv-row">
                                                                <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="<?=$result['email']?>" placeholder="Email"  />
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            
                                                            <!--end::Col-->
                                                        </div>
                                                         <?= isset($validator) ? show_error($validator,'email'):''; ?>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                               
                                                <!--end::Input group-->
                                               
                                                <!--end::Input group-->
                                               
                                            </div>
                                            <!--end::Card body-->
                                            <!--begin::Actions-->
                                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Basic info-->
                             
                            
                            
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Post-->


<?= $this->endSection() ?>

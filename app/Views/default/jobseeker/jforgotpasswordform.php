<?php
    if(!session()->get('jobseekerForgot'))
    redirect()->to('jlogin');
?>

<?= $this->include('default/inc/logheader')?>
<body>
    <!-- Start Hero -->
    <section class="bg-home d-flex align-items-center" style="background: url('images/hero/bg3.jpg') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <a href="index.html"><img src="assets/admin/images/logoo.jpg" class="mb-4 d-block mx-auto" alt="" width="50"></a>
            <div class="row justify-content-center"><!-- Center the row -->
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form action="<?= site_url('jobseekerforgotformprocess') ?>" method="post">

                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <h6 class="mb-3 text-uppercase fw-semibold">Reset your password</h6>

                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="password">New Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="password">Confirm New Password</label>
                                <input name="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="Password">
                            </div>
                        
                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                                        <!-- <label class="form-label form-check-label text-muted" for="flexCheckDefault">Remember me</label> -->
                                    </div>
                                </div>
                            </div>
            
                            <button class="btn btn-primary w-100" type="submit">Update Password</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2 small"></span> <a href="<?= site_url('jlogout') ?>" class="text-dark fw-semibold small">Back to login</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->
<?= $this->include('employer/inc/logfooter')?>
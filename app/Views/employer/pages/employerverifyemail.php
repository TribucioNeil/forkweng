<?= $this->include('employer/inc/logheader')?>
<?php
    if(!session()->get('isEmailVerify'))
    redirect()->to('employersignup');
    ?>
<body>
    <!-- Start Hero -->
    <section class="bg-home d-flex align-items-center" style="background: url('images/hero/bg3.jpg') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <a href="index.html"><img src="assets/admin/images/logoo.jpg" class="mb-4 d-block mx-auto" alt="" width="50"></a>
            <div class="row justify-content-center"><!-- Center the row -->
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form action="<?= site_url('employerResend') ?>" method="post">
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

                            <h5 class="mb-3 fw-semibold">Verify Your Email Address</h5>
                           
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="emailAddress">Email Address</label>
                                <input name="emailAddress" id="emailAddress" type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            
                            <button class="btn btn-primary w-100" type="submit">Resend Email</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2 small"></span> <a href="<?= site_url('logoutEmployer') ?>" class="text-dark fw-semibold small">back</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->
<?= $this->include('default/inc/logfooter')?>
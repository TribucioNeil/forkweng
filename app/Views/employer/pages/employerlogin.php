<?= $this->include('employer/inc/logheader')?>
<body>
    <!-- Start Hero -->
    <section class="bg-home d-flex align-items-center" style="background: url('images/hero/bg3.jpg') center;">
        <div class="bg-overlay bg-linear-gradient-2"></div>
        <div class="container">
            <a href="index.html"><img src="assets/admin/images/logoo.jpg" class="mb-4 d-block mx-auto" alt="" width="50"></a>
            <div class="row justify-content-center"><!-- Center the row -->
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                        <form action="<?= site_url('employerLoginProcess') ?>" method="post">

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

                            <h6 class="mb-3 text-uppercase fw-semibold text-center">Log in to continue</h6>
                        
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="email">Email Address</label>
                                <input name="email" id="email" type="email" class="form-control" placeholder="Email Address">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        
                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                <span class="forgot-pass text-muted small mb-0"><a href="<?= site_url('employerVerifyEmail') ?>" class="text-muted">Verify your Account</a></span>
                                    <div class="form-check">
                                        <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                                        <!-- <label class="form-label form-check-label text-muted" for="flexCheckDefault">Remember me</label> -->
                                    </div>
                                </div>
                                <span class="forgot-pass text-muted small mb-0"><a href="<?= site_url('employerForgot') ?>" class="text-muted">I forgot my password</a></span>
                            </div>
            
                            <button class="btn btn-primary w-100" type="submit">Sign in</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2 small">Don't have an account ?</span> <a href="employersignup" class="text-dark fw-semibold small">Sign Up</a></span>
                            </div><!--end col-->
                        </form>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->
<?= $this->include('employer/inc/logfooter')?>
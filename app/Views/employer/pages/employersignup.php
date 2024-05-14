<?= $this->include('employer/inc/signupheader')?>
    <body>        
        <section class="bg-home d-flex align-items-center" style="background: url('images/hero/bg3.jpg') center;">
            <div class="bg-overlay bg-linear-gradient-2"></div>
            <div class="container">
                <a href="index.html"><img src="assets/admin/images/logoo.jpg" class="mb-4 d-block mx-auto" alt="" width="50"></a>
                <div class="row justify-content-center"><!-- Center the row -->
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                            <form action="<?= site_url('employerSignupProcess') ?>" method="post">
                                
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

                                <a href="index.html"><img src="images/logo-dark.png" class="mb-4 d-block mx-auto" alt=""></a>
                                <h6 class="mb-3 text-uppercase fw-semibold">Register your account</h6>
                            
                                <div class="mb-3">
                                    <!-- <label class="form-label fw-semibold">Your Name</label> -->
                                    <input name="Fullname" id="Fullname" type="text" class="form-control" placeholder="Username" required>
                                </div>

                                <!-- <div class="mb-3">
                                    <label class="form-label fw-semibold">Bir</label>
                                    <input name="birPic" id="birPic" type="file" class="form-control" placeholder="">
                                </div> -->

                                <div class="mb-3">
                                    <!-- <label class="form-label fw-semibold">Your Email</label> -->
                                    <input name="Email" id="Email" type="email" class="form-control" placeholder="Email" required>
                                </div>

                                <div class="mb-3">
                                    <!-- <label class="form-label fw-semibold" for="Password">Password</label> -->
                                    <input type="password" name="Password" class="form-control" id="Password" placeholder="Password" required>
                                </div>

                                <div class="mb-3">
                                    <!-- <label class="form-label fw-semibold" for="Password">Password</label> -->
                                    <input type="password" name="confirmPassword" class="form-control" id="Password" placeholder="Confirm password" required>
                                </div>

                                <div class="mb-3">
                                    <input name="captcha" type="text" class="form-control" id="captcha" placeholder="Enter Captcha" required>
                                    <small class="text-muted"></small>
                                </div>

                                <?php
                                    $captcha = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()'), 0, 6);
                                    session()->set('captcha', $captcha);
                                ?>

                                <div class="mb-3" style="text-align: center;">
                                    <p style="font-style: italic; font-family: 'Comic Sans MS', cursive; font-size: 24px; font-weight: 10; letter-spacing: 3px; color: rgba(0, 0, 0, 0.5); text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); background-image: url('uploads/captcha/download.jpg'); background-size: 110%; background-repeat: no-repeat; background-position: center; padding: 5px 10px; border-radius: 5px;"><?= $captcha ?></p>
                                </div>

                                <button class="btn btn-primary w-100" type="submit">Register</button>

                                <div class="col-12 text-center mt-3">
                                    <span><span class="text-muted small me-2">Already have an account ? </span> <a href="employerlogin" class="text-dark fw-semibold small">Sign in</a></span>
                                </div><!--end col-->
                            </form>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- ENd Hero -->
<?= $this->include('employer/inc/signupfooter')?>
<?php
    if(!session()->get('isLoggedIn'))
    redirect()->to('jlogin');
?>


<?= $this->include('default/inc/top')?>
<body>

<?= $this->include('default/inc/header')?>
<?= $this->include('default/chatbot')?>
        <!-- Hero Start -->
        <section class="bg-half-260 d-table w-100" style="background: url('assets/default/images/hero/bg.jpg');">
            <div class="bg-overlay bg-primary-gradient-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-10">
                        <div class="title-heading text-center">
                            <h1 class="heading text-white fw-bold">Find & Hire Experts <br> for any Job</h1>
                            <p class="para-desc text-white-50 mx-auto mb-0">Find Jobs, Employment & Career Opportunities. Some of the companies we've helped recruit excellent applicants over the years.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Start -->
        <section class="section">
            

            <div class="container mt-100 mt-60">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="about-left">
                            <div class="position-relative shadow rounded img-one">
                                <img src="assets/default/images/about/ab01.jpg" class="img-fluid rounded" alt="work-image">
                            </div>

                            <div class="img-two shadow rounded p-2 bg-white">
                                <img src="assets/default/images/about/ab02.jpg" class="img-fluid rounded" alt="work-image">

                                <div class="position-absolute top-0 start-50 translate-middle">
                                    <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="avatar avatar-md-md rounded-pill shadow card d-flex justify-content-center align-items-center lightbox">
                                        <i class="mdi mdi-play mdi-24px text-primary"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-md-6">
                        <div class="section-title ms-lg-5">
                            <h4 class="title mb-3">Millions of jobs. <br> Find the one that's right for you.</h4>
                            <p class="text-muted para-desc mb-0">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                        
                            <ul class="list-unstyled text-muted mb-0 mt-3">
                                <li class="mb-1"><span class="text-primary h5 me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                                <li class="mb-1"><span class="text-primary h5 me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                                <li class="mb-1"><span class="text-primary h5 me-2"><i class="mdi mdi-check-circle-outline align-middle"></i></span>Create your own skin to match your brand</li>
                            </ul>

                            <div class="mt-4">
                                <a href="aboutus.html" class="btn btn-primary">About Us <i class="mdi mdi-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row justify-content-center mb-4 pb-2">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h4 class="title mb-3">Popular Job Listing</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row g-4 mt-0">
                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/facebook-logo.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Web Designer / Developer</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/google-logo.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Marketing Director</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/android.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Application Developer</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/lenovo-logo.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Senior Product Designer</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/spotify.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">C++ Developer</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/linkedin.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Php Developer</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/circle-logo.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Web Designer / Developer</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-310px">
                                <img src="assets/default/images/company/skype.png" class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                                <div class="ms-3">
                                    <a href="job-detail-one.html" class="h5 title text-dark">Marketing Director</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                                <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock" class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin" class="fea icon-sm me-1 align-middle"></i>Australia</span>
                                <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                                <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-12">
                        <div class="text-center">
                            <a href="job-list-one.html" class="btn btn-link primary text-muted">See More Jobs <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            
        </section><!--end section-->
        <!-- End -->

        <?= $this->include('default/inc/footer')?>
        <?= $this->include('default/inc/end')?>

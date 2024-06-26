<?php
    if(!session()->get('isLoggedIn'))
    redirect()->to('jlogin');
?>


<?= $this->include('default/inc/top')?>
<body>

<?= $this->include('default/inc/header')?>
        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100">
        <div class="bg-overlayy bg-primary-gradient-overlay"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Activities</h5>
                        <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index-2.html">Jobnova</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ul>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <!--end container-->
    </section>
        <!-- Hero End -->
        <!-- Start -->
        <section class="section" style="padding: 0px; margin-bottom: 30px;">
            <div class="container mt-0">
                <div class="row g-4 mt-0">
                    <div class="col-lg-4 col-md-6">
                        <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="assets/default/images/blog/01.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body blog-content position-relative p-0">
                                <div class="blog-tag px-4">
                                    <a href="#" class="badge bg-primary rounded-pill">Arts</a>
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled text-muted small mb-2">
                                        <li class="d-inline-flex align-items-center me-2"><i data-feather="calendar" class="fea icon-ex-sm me-1 text-dark"></i>31st October 2023</li>
                                        <li class="d-inline-flex align-items-center"><i data-feather="clock" class="fea icon-ex-sm me-1 text-dark"></i>5 min read</li>
                                    </ul>

                                    <a href="blog-detail.html" class="title fw-semibold fs-5 text-dark">11 Tips to Help You Get New Clients Through Cold Calling</a>
                                    
                                    <ul class="list-unstyled d-flex justify-content-between align-items-center text-muted mb-0 mt-3">
                                        <li class="list-inline-item me-2"><a href="#" class="btn btn-link primary text-dark">Read Now <i class="mdi mdi-arrow-right"></i></a></li>
                                        <li class="list-inline-item"><span class="text-dark">By</span> <a href="#" class="text-muted link-title">Google</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="assets/default/images/blog/02.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body blog-content position-relative p-0">
                                <div class="blog-tag px-4">
                                    <a href="#" class="badge bg-primary rounded-pill">Illustration</a>
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled text-muted small mb-2">
                                        <li class="d-inline-flex align-items-center me-2"><i data-feather="calendar" class="fea icon-ex-sm me-1 text-dark"></i>31st October 2023</li>
                                        <li class="d-inline-flex align-items-center"><i data-feather="clock" class="fea icon-ex-sm me-1 text-dark"></i>5 min read</li>
                                    </ul>

                                    <a href="blog-detail.html" class="title fw-semibold fs-5 text-dark">DigitalOcean launches first Canadian data centre in Toronto</a>
                                    
                                    <ul class="list-unstyled d-flex justify-content-between align-items-center text-muted mb-0 mt-3">
                                        <li class="list-inline-item me-2"><a href="#" class="btn btn-link primary text-dark">Read Now <i class="mdi mdi-arrow-right"></i></a></li>
                                        <li class="list-inline-item"><span class="text-dark">By</span> <a href="#" class="text-muted link-title">Facebook</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="assets/default/images/blog/03.jpg" class="img-fluid" alt="">
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body blog-content position-relative p-0">
                                <div class="blog-tag px-4">
                                    <a href="#" class="badge bg-primary rounded-pill">Music</a>
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled text-muted small mb-2">
                                        <li class="d-inline-flex align-items-center me-2"><i data-feather="calendar" class="fea icon-ex-sm me-1 text-dark"></i>31st October 2023</li>
                                        <li class="d-inline-flex align-items-center"><i data-feather="clock" class="fea icon-ex-sm me-1 text-dark"></i>5 min read</li>
                                    </ul>

                                    <a href="blog-detail.html" class="title fw-semibold fs-5 text-dark">Using Banner Stands To Increase Trade Show Traffic</a>
                                    
                                    <ul class="list-unstyled d-flex justify-content-between align-items-center text-muted mb-0 mt-3">
                                        <li class="list-inline-item me-2"><a href="#" class="btn btn-link primary text-dark">Read Now <i class="mdi mdi-arrow-right"></i></a></li>
                                        <li class="list-inline-item"><span class="text-dark">By</span> <a href="#" class="text-muted link-title">Linkedin</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <?= $this->include('default/inc/footer')?>
        <?= $this->include('default/inc/end')?>

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
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Job Fairs</h5>
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
                    <table class="table-striped">
                        <tr>
                            <th>Date</th>
                            <th>Event</th>
                            <th>Venue</th>
                        </tr>
                        <tr>
                            <td>gd</td>
                            <td>gd</td>
                            <td>gd</td>
                        </tr>
                    </table>
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <?= $this->include('default/inc/footer')?>
        <?= $this->include('default/inc/end')?>

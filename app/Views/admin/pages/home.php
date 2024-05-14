<?php
    if(!session()->get('adminLoggedIn'))
    redirect()->to('adminlogin');
?>

<?= $this->include('admin/inc/top')?>
<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        
        <?= $this->include('admin/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h2 class="font-weight-bold">Welcome Admin</h2>
                               
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="justify-content-end d-flex">
                                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <p class="btn btn-sm btn-light bg-white" type="button">
                                    <i class="fas fa-calendar"> <span
                                            style="font-family: Nunito, sans-serif; font-size: 15px;"
                                            id="datetime"></span></i>
                                </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card tale-bg">
                            <div class="card-people mt-auto">
                                <img src="assets/admin/images/dashboard/people.svg" alt="people">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4">Today’s Bookings</p>
                                        <p class="fs-30 mb-2">4006</p>
                                        <p>10.00% (30 days)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-dark-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Total Bookings</p>
                                        <p class="fs-30 mb-2">61344</p>
                                        <p>22.00% (30 days)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Number of Meetings</p>
                                        <p class="fs-30 mb-2">34040</p>
                                        <p>2.00% (30 days)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <p class="mb-4">Number of Clients</p>
                                        <p class="fs-30 mb-2">47033</p>
                                        <p>0.22% (30 days)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
            </div>
            <?= $this->include('admin/inc/footer')?>

        </div>
    </div>
</div>

<script>
    const datetime = document.getElementById("datetime");

    setInterval(() => {
        const date = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            timeZone: 'Asia/Shanghai'
        };

        const formattedDate = date.toLocaleString('en-US', options);

        datetime.textContent = formattedDate;
    }, 1000);
    </script>

<?= $this->include('admin/inc/end')?>
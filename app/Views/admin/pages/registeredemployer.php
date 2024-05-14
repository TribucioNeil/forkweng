<?= $this->include('admin/inc/top')?>
<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= $this->include('admin/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <p><a href="/adminhome">Home/</a> Employers</p>
                <div class="col-lg-12 stretch-card" style="display: flex;
                justify-content: flex-end;">
                    
                </div>
                <div class="card-body">
                <p><strong>Employer Name:</strong> <?=$emps['employerName']?></p>
                <p><strong>Company Name:</strong> <?=$emps['companyName']?></p>
                <p><strong>Company Address:</strong> <?=$emps['address']?></p>
             
              </div>
            </div>

            <?= $this->include('admin/inc/footer')?>

        </div>
    </div>
</div>
<?= $this->include('admin/inc/end')?>
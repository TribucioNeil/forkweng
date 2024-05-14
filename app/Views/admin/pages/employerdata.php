<?= $this->include('admin/inc/top')?>
<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= $this->include('admin/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div id="div1" class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div style="border-radius: 0px;">
                            <p class="text-success"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 grid-margin">
                                <button style="border-radius: 5px;" class="btn-primary mb-2" onclick="goBack()">    Back</button>
                                    <h4>Review Employer's Company Profile</h4>
                                    <hr>

                                    <div class="myrow ml-4">
                                        <div>
                                            <div>
                                                <label for="surname">EMPLOYER NAME: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $employer['employerName']; ?></span></label>
                                                    </div>

                                            <div>
                                                <label for="surname">COMPANY NAME: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $employer['companyName']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">TOTAL WORK FORCE: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $employer['workForce']; ?></span></label>

                                            </div>

                                            <div>
                                                <label for="surname">LINE OF BUSINESS/INDUSTRY: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $employer['industry']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">ADDRESS: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $employer['address']; ?>, <?php echo $employer['barangay']; ?>, <?php echo $employer['city']; ?>, <?php echo $employer['province']; ?></span></label>
                                            </div>
                                            <div>
                                                <hr>
                                                <label for="surname">Lists of Required Documents:</label>
                                            </div>

                                            <div>
                                                <a href="/uploads/employerProfile/renewalLicense/<?=$employer['renewalLicense']?>"
                                                    target="_blank"
                                                    <?php if (empty($employer['renewalLicense'])) { echo 'class="disabled-link"'; } ?>>1.
                                                    Certificate
                                                    of Renewal License (LATEST) Business Permit</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/jobOrder/<?=$employer['jobOrder']?>"
                                                    target="_blank"
                                                    <?php if (empty($employer['jobOrder'])) { echo 'class="disabled-link"'; } ?>>2.
                                                    Latest
                                                    Job Order/Job Vacancies</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/certificationRegistration/<?=$employer['certificationRegistration']?>"
                                                    target="_blank"
                                                    <?php if (empty($employer['certificationRegistration'])) { echo 'class="disabled-link"'; } ?>>3.
                                                    Certification
                                                    of Registration(BIR)</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/exchangeCommission/<?=$employer['exchangeCommission']?>"
                                                    target="_blank"
                                                    <?php if (empty($employer['exchangeCommission'])) { echo 'class="disabled-link"'; } ?>>4.
                                                    Security
                                                    Exchange Commission(SEC) Registration/DTI</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/letterIntent/<?=$employer['letterIntent']?>"
                                                    target="_blank"
                                                    <?php if (empty($employer['letterIntent'])) { echo 'class="disabled-link"'; } ?>>5.
                                                    Letter
                                                    of Intent(Include the requested date of
                                                    recruitment/interview)</a>
                                            </div>
                                            <div>
                                                <a <?php if (empty($employer['accreditation'])) echo 'class="disabled-link"'; ?>
                                                    href="<?php if (!empty($employer['accreditation'])) echo '/uploads/employerProfile/accreditation/' . $employer['accreditation']; ?>"
                                                    target="_blank">6. Certification of Accreditation of Philjobnet</a>

                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/poea/<?=$employer['poea']?>"
                                                    target="_blank"
                                                    <?php if (empty($employer['poea'])) { echo 'class="disabled-link"'; } ?>>7.
                                                    POEA
                                                    Registration (if overseas)-for SRA</a>
                                            </div>
                                        </div>
                                        <br>
                                        <?php if($employer['profileStatus'] === 'Pending'): ?>
                                            <form action="<?= site_url('approveEmployer') ?>" method="post" style="display: inline-block;">
                                                <input type="hidden" name="employerId" value="<?= $employer['id']?>">
                                                <button type="submit" class="btn btn-primary" style="border-radius: 5px;" class="btn-success">Approve</button>
                                            </form>
                                            <form action="<?= site_url('declineEmployer') ?>" method="post" style="display: inline-block;">
                                                <input type="hidden" name="employerId" value="<?= $employer['id']?>">
                                                <button type="submit" class="btn btn-danger" style="border-radius: 5px;" class="btn-success">Decline</button>
                                            </form>
                                        <?php endif; ?>

                                        <?php if($employer['profileStatus'] === 'Approved'): ?>
                                            <form action="<?= site_url('blockedEmployer') ?>" method="post" style="display: inline-block;">
                                                <input type="hidden" name="employerId" value="<?= $employer['id']?>">
                                                <button type="submit" class="btn btn-danger" style="border-radius: 5px;" class="btn-success">Blocked</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div2" class="col-lg-12 grid-margin stretch-card" style="display: none;">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-danger" style="border-radius: 0px;">
                            <p class="text-danger"></p>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Pending Registration</h4>
                            <div class="table-responsive"></div>
                        </div>
                    </div>
                </div>
                <div id="div3" class="col-lg-12 grid-margin stretch-card" style="display: none;">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-dark" style="border-radius: 0px;">
                            <p class="text-dark"></p>
                        </div>
                        <div class="card-body">

                            <h4 class="card-title">Blocked Employers</h4>
                            
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->include('admin/inc/footer')?>

        </div>
    </div>
</div>
<script>
  function goBack() {
    window.history.back();
  }
</script>
<?= $this->include('admin/inc/end')?>
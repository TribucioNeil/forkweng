<?= $this->include('employer/inc/top')?>
<div class="container-scroller">
    <?= $this->include('employer/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">
        <?= $this->include('employer/inc/sidebar')?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-success" style="border-radius: 0px;">
                            <p class="text-success">h</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin">
                                    <div class="float-right">
                                        <a href="<?= site_url('employerprofile') ?>"><button style="border-radius: 5px;" class="btn-success"><i class="fas fa-edit mr-1"></i>Update</button></a>
                                    </div>
                                    <h4>Company Profile</h4>
                                    <hr>
                                    <?php if(empty($empdata['employerName'])): ?>
                                        <button id="myModalTrigger" type="button" class="d-none" data-toggle="modal" data-target="#myModal"> Show Modal</button>
                                    <?php else: ?>

                                    <div class="myrow ml-4">
                                        <div>
                                            <div>
                                                <label for="surname">EMPLOYER NAME: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $empdata['employerName']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">COMPANY NAME: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $empdata['companyName']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">TOTAL WORK FORCE: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $empdata['workForce']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">LINE OF BUSINESS/INDUSTRY: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $empdata['industry']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">ADDRESS: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $empdata['address']; ?>, <?php echo $empdata['barangay']; ?>, <?php echo $empdata['city']; ?>, <?php echo $empdata['province']; ?></span></label>
                                            </div>
                                            <div>
                                                <hr>
                                                <label for="surname">Lists of Required Documents:</label>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/renewalLicense/<?=$empdata['renewalLicense']?>" target="_blank" <?php if (empty($empdata['renewalLicense'])) { echo 'class="disabled-link"'; } ?>>1. Certificate of Renewal License (LATEST) Business Permit</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/jobOrder/<?=$empdata['jobOrder']?>" target="_blank" <?php if (empty($empdata['jobOrder'])) { echo 'class="disabled-link"'; } ?>>2. Latest Job Order/Job Vacancies</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/certificationRegistration/<?=$empdata['certificationRegistration']?>" target="_blank" <?php if (empty($empdata['certificationRegistration'])) { echo 'class="disabled-link"'; } ?>>3. Certification of Registration(BIR)</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/exchangeCommission/<?=$empdata['exchangeCommission']?>" target="_blank" <?php if (empty($empdata['exchangeCommission'])) { echo 'class="disabled-link"'; } ?>>4. Security Exchange Commission(SEC) Registration/DTI</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/letterIntent/<?=$empdata['letterIntent']?>" target="_blank" <?php if (empty($empdata['letterIntent'])) { echo 'class="disabled-link"'; } ?>>5. Letter of Intent(Include the requested date of recruitment/interview)</a>
                                            </div>
                                            <div>
                                                <a <?php if (empty($empdata['accreditation'])) echo 'class="disabled-link"'; ?> href="<?php if (!empty($empdata['accreditation'])) echo '/uploads/employerProfile/accreditation/' . $empdata['accreditation']; ?>" target="_blank">6. Certification of Accreditation of Philjobnet</a>
                                            </div>
                                            <div>
                                                <a href="/uploads/employerProfile/poea/<?=$empdata['poea']?>" target="_blank" <?php if (empty($empdata['poea'])) { echo 'class="disabled-link"'; } ?>>7. POEA Registration (if overseas)-for SRA</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->include('employer/inc/footer')?>
        </div>
    </div>
</div>
<?= $this->include('employer/inc/end')?>
<div class="modal" id="myModal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                To continue, please register your company profile.
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" onclick="goBack()" >Close</button>
                <a href="<?= site_url('employerprofile') ?>"><button type="button" class="btn btn-success" >Proceed</button></a>
            </div>
        </div>
    </div>
</div>
<script>
  function goBack() {
    window.history.back();
  }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (<?= empty($empdata['employerName']) ? 'true' : 'false' ?>) {
            $('#myModal').modal('show');
        }
    });
</script>

<!-- <script>
  // Function to open modal and load content
  $('.open-modal').click(function(e) {
    e.preventDefault();
    var url = $(this).data('url');
    $('#myModal').modal('show');
    $('#myModal iframe').attr('src', url);
  });

  // Function to close modal and clear content
  $('#myModal').on('hidden.bs.modal', function () {
    $('#myModal iframe').attr('src', '');
  });
</script>
<div class="modal" id="myModal" style="overflow-y: hidden;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Certificate of Renewal License (LATEST) Business Permit</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <iframe src="" frameborder="0" style="height: 500px;"></iframe>
      </div>
    </div>
  </div>
</div> -->
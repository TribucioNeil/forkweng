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
                            <p class="text-success"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin">
                                  
                                    <h4>Applicant Information</h4>
                                    <hr>

                                    <div class="myrow ml-4">
                                        <div>
                                            <div>
                                                <label for="surname">APPLICANT NAME: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $info['fullname']; ?></span></label>
                                            </div>

                                            <div>
                                                <label for="surname">JOB TITLE: <span style="text-transform: uppercase; font-weight: bold;"><?php echo $info['jobTitle']; ?></span></label>
                                            </div>

                                            <div>
                                                <hr>
                                                <label for="surname">Lists of Required Documents:</label>
                                            </div>
                                            <div>
                                                <a href="/uploads/resume/<?=$info['resume']?>" target="_blank" <?php if (empty($info['resume'])) { echo 'class="disabled-link"'; } ?>>Resume</a>
                                            </div>
                                            <?php if (!empty($info['vaccination'])): ?>
                                                <div>
                                                    <a href="/uploads/jobseekerRequirements/vaccination/<?=$info['vaccination']?>" target="_blank">Vaccination</a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($info['sss'])): ?>
                                                <div>
                                                    <a href="/uploads/jobseekerRequirements/sss/<?=$info['sss']?>" target="_blank">SSS</a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($info['pagibig'])): ?>
                                                <div>
                                                    <a href="/uploads/jobseekerRequirements/pagibig/<?=$info['pagibig']?>" target="_blank">Pag-ibig</a>
                                                </div>
                                            <?php endif; ?>
                                       
                                            <?php if (!empty($info['tin'])): ?>
                                                <div>
                                                    <a href="/uploads/jobseekerRequirements/tin/<?=$info['tin']?>" target="_blank">TIN</a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($info['otherrequirements']) && !empty($jobpostid['otherrequirements'])): ?>
                                                <h6>Other Requirements</h6>
                                                <?php
                                                    $otherRequirementsArray = explode(',', $info['otherrequirements']);
                                                    $otherRequirementsName = explode(',', $jobpostid['otherrequirements']);

                                                    $count = min(count($otherRequirementsArray), count($otherRequirementsName));

                                                    for($i = 0; $i < $count; $i++):
                                                        $requirement = $otherRequirementsArray[$i];
                                                        $requirementname = $otherRequirementsName[$i];
                                                    ?>
                                                        <div>
                                                            <a href="/uploads/jobseekerRequirements/others/<?=$requirement?>" target="_blank"> <?=$requirementname?></a>
                                                        </div>
                                                    <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
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
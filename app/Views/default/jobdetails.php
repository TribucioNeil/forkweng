<?= $this->include('default/inc/top')?>
	<body>
    <h4 class="card-title">Job Details</h4>

    <div class="table-responsive">
        
    <p><strong>Job Title:</strong> <?=$details['jobTitle']?></p>
    <form action="<?= site_url('barangaymap') ?>" method="post">
        <input type="hidden" name=id value="<?= $details['id'] ?>">
        <button type="submit"><?= $details['barangay'] . $details['city'] . $details['province'] ?></button>
    </form>
    <p><strong></strong> <?=$details['jobOption']?></p>
    <p><strong></strong> <?=$details['salary']?></p>
    <p><strong>Job Description:</strong> <?=$details['jobDescription']?></p>
    <p><strong>Qualification/Requirements:</strong> <?=$details['jobQualification']?></p>
    <p><strong>Remarks:</strong> <?=$details['remarks']?></p>
    <p><strong>Posted Date:</strong> <?=$details['postedDate']?></p>

    

    <?php
                    if (!empty($personalInfo['SurName'])) {
                    echo'
                        <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i data-feather="bookmark" class="icons"></i></a>
                        <button type="button" class="btn btn-social-icon-text btn-twitter bg-success" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#exampleModal_'. $details['id'] .'">
                            <i class="ti-plus"></i><b>Apply now</b>
                        </button>
                    ';
                    }else{
                    echo '<form action="' . site_url('showErrors') . '" method="post">
                        <button type="submit" class="btn btn-social-icon-text btn-twitter bg-success" style="border-radius: 2px;">
                            <i class="ti-plus"></i><b>Apply now</b>
                        </button>
                    </form>';
                    }
                ?>

            <div class="modal fade" id="exampleModal_<?php echo $details['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel_<?php echo $details['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel_<?php echo $details['id']; ?>">Apply Job</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= site_url('applyNowProcess') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="jobpostId" value="<?php echo $details['id']; ?>">
                                <?php if ($details['vaccination'] == "yes"): ?>
                                    <label for="vaccination">Vaccination</label>
                                    <input type="file" class="form-control-file" id="vaccination" name="vaccination" accept="image/*">
                                <?php endif; ?>
                                <?php if ($details['sss'] == "yes"): ?>
                                    <label for="sss">SSS</label>
                                    <input type="file" class="form-control-file" id="sss" name="sss" accept="image/*">
                                <?php endif; ?>
                                <?php if ($details['pagibig'] == "yes"): ?>
                                    <label for="pagibig">Pagibig</label>
                                    <input type="file" class="form-control-file" id="pagibig" name="pagibig" accept="image/*">
                                <?php endif; ?>
                                <?php if ($details['philhealth'] == "yes"): ?>
                                    <label for="philhealth">Philhealth</label>
                                    <input type="file" class="form-control-file" id="philhealth" name="philhealth" accept="image/*">
                                <?php endif; ?>
                                <?php if ($details['tin'] == "yes"): ?>
                                    <label for="tin">Tin</label>
                                    <input type="file" class="form-control-file" id="tin" name="tin" accept="image/*">
                                <?php endif; ?>

                                <?php if (!empty($details['otherrequirements'])): ?>
                                    <?php
                                        $otherRequirementsArray = explode(',', $details['otherrequirements']);
                                    
                                        foreach($otherRequirementsArray as $requirement): ?>
                                            <label for=""><?php echo $requirement; ?></label>
                                            <input type="file" class="form-control-file" id="<?php echo $requirement; ?>" name="otherRequirements[]" accept="image/*" multiple>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-primary float-right">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>
<?= $this->include('default/inc/end')?>
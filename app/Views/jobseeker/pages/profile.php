    <?= $this->include('jobseeker/inc/top')?>
    <link rel="stylesheet" href="assets/default/cssbundle/jquerysteps.min.css">

    <script src="assets/default/jsss/plugins.js"></script>
    <div class="container-scroller">
        <?= $this->include('jobseeker/inc/topbar')?>
        <div class="container-fluid page-body-wrapper">
            <style>
            body {
                margin: 0;
                padding: 0;
            }

            .container-scroller {
                padding: 0;
                margin: 0;
            }

            .page-body-wrapper {
                margin-left: 0;
            }

            input {
                text-transform: uppercase;
            }
            </style>
            <?= $this->include('jobseeker/inc/sidebar')?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12">
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
                            <form action="<?= site_url('generatePdf') ?>" method="post">
                            <span><button type="submit" style="border-radius: 5px; padding: 5px;"
                                                        class="btn-primary"><i class="fas fa-download"></i> Download PDF</button></span> 
                        </form>
                        <br>
                    
                        <div class="card">
                        

                            <div class="step-app v-wizard-demo2">
                                <ul class="step-steps" style="font-size: 10px;">


                                    <li data-step-target="step1"><span>1.</span> Personal Information</li>

                                    <?php if (!empty($personalInfo['FirstName'])): ?>
                                        <li data-step-target="step2" id="step2Tab"><span>2.</span> Job Preference</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');"  style="cursor: pointer; opacity: 0.5;"><span>2.</span> Job Preference</li>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($jobPreference['PreferredOccu1'])): ?>
                                        <li data-step-target="step3"><span>3.</span> Language Proficiency</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');"  style="cursor: pointer; opacity: 0.5;"><span>3.</span> Language Proficiency</li>
                                    <?php endif; ?>

                                    <?php if (!empty($language['EnglishRead'])): ?>
                                        <li data-step-target="step4"><span>4.</span> Educational Background</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');" style="cursor: pointer; opacity: 0.5;"><span>4.</span> Educational Background</li>
                                    <?php endif; ?>

                                    <?php if (!empty($educBackground['ElementarySchool'])): ?>
                                        <li data-step-target="step5"><span>5.</span> Training</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');" style="cursor: pointer; opacity: 0.5;"><span>5.</span> Training</li>
                                    <?php endif; ?>

                                    <?php if (!empty($training['TrainingTitle1'])): ?>
                                        <li data-step-target="step6"><span>6.</span> Eligibility</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');" style="cursor: pointer; opacity: 0.5;"><span>6.</span> Eligibility</li>
                                    <?php endif; ?>

                                    <?php if (!empty($eligibility['EligibilityTitle1'])): ?>
                                        <li data-step-target="step7"><span>7.</span> Work Experience</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');" style="cursor: pointer; opacity: 0.5;"><span>7.</span>Work Experience</li>
                                    <?php endif; ?>

                                    <?php if (!empty($workExperience['CompanyName1'])): ?>
                                        <li data-step-target="step8"><span>8.</span> Other Skills</li>
                                    <?php else: ?>
                                        <li onclick="alert('Please fill the previous form first');" style="cursor: pointer; opacity: 0.5;"><span>8.</span> Other Skills</li>
                                    <?php endif; ?>
                                </ul>

                                 <div class="row justify-content-start step-content">
                                    <div class="col-lg-12 step-tab-panel" data-step="step1">
                                        <form action="<?= site_url('personalInformation') ?>" method="post"
                                            class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>I. Personal Information</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="<?= strtoupper($personalInfo['SurName']) ?>" name="surName" id="surName" required style="height: 3rem;">
                                                            <label for="surName" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['SurName']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>SURNAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="firstName" id="firstName" required style="height: 3rem;">
                                                            <label for="firstName" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['FirstName']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>FIRST NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="middleName" id="middleName" style="height: 3rem;">
                                                            <label for="middleName" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['MiddleName']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>MIDDLE NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="suffix" id="suffix"  style="height: 3rem;">
                                                            <label for="suffix" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['Suffix']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>SUFFIX(Ex: Sr., Jr., III, etc.)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" placeholder="" name="dateOfBirth" id="dateOfBirth" required style="height: 3rem;">
                                                            <label for="dateOfBirth" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['DateOfBirth']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>DATE OF BIRTH</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="placeOfBirth" id="placeOfBirth" required style="height: 3rem;">
                                                            <label for="placeOfBirth" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['PlaceOfBirth']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>PLACE OF BIRTH</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input for="placeOfBirth" type="text" class="form-control" placeholder="" name="religion" required style="height: 3rem;">
                                                            <label for="religion" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['Religion']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>RELIGION</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="form-label fw-bold" style="padding-top: 15px;">PRESENT ADDRESS</labe1>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-floating">
                                                            <input for="houseNo" type="text" class="form-control" placeholder="" name="houseNo" id="houseNo" required style="height: 3rem;">
                                                            <label class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['HouseNoOrStreet']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 14px;"><span class="text-dark"></span>HOUSE NO./ STREET</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-floating">
                                                            <input for="barangay" type="text" class="form-control" placeholder="" name="barangay" id="barangay" required style="height: 3rem;">
                                                            <label class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['Barangay']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>BARANGAY</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input for="municipality" type="text" class="form-control" placeholder="" name="municipality" id="municipality" required style="height: 3rem;">
                                                            <label class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['MunicipalityOrCity']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>MUNICIPALITY/CITY</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input for="province" type="text" class="form-control" placeholder="" name="province" id="province" required style="height: 3rem;">
                                                            <label class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['Province']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>PROVINCE</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin: 3px;"></div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="row">
                                                    <div class="col-md-3" style="padding-top: 15px;">
                                                        <label class="form-label fw-bold" style="padding-right: 25px;">Sex:</label>
                                                        <input class="form-check-input" type="radio" value="male" id="male" name="sex" <?php echo ($personalInfo['Sex'] === 'male') ? 'checked' : ''; ?> required>
                                                        <label class="form-check-label" for="male" style="padding-right: 25px;">Male</label>

                                                        <input class="form-check-input" type="radio" value="female" id="female" name="sex" <?php echo ($personalInfo['Sex'] === 'female') ? 'checked' : ''; ?> required>
                                                        <label class="form-check-label" for="female">Female</label>
                                                    </div>

                                                    <div style="border-left: 2px solid #999;"></div>

                                                    <div class="col-md-8" style="padding-top: 15px;">
                                                        <label class="form-label fw-bold" style="padding-right: 35px;">Civil Status:
                                                        </label>
                                                        <input class="form-check-input" type="radio" value="Single" id="single" name="civilStatus" <?php echo ($personalInfo['CivilStatus'] === 'Single') ? 'checked' : ''; ?> required>
                                                        <label class="form-check-label" for="single" style="padding-right: 35px;">Single
                                                        </label>
                                                        <input class="form-check-input" type="radio" value="Married" id="married" name="civilStatus" <?php echo ($personalInfo['CivilStatus'] === 'Married') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="married">Married
                                                        </label>
                                                        <input class="form-check-input" type="radio" value="Widowed" id="widowed" name="civilStatus" <?php echo ($personalInfo['CivilStatus'] === 'Widowed') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="widowed">Widowed
                                                        </label>
                                                        <input class="form-check-input" type="radio" value="Separated" id="separated" name="civilStatus" <?php echo ($personalInfo['CivilStatus'] === 'Separated') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="separated">Separated
                                                        </label>
                                                        <input class="form-check-input" type="radio" value="LiveIn" id="liveIn" name="civilStatus" <?php echo ($personalInfo['CivilStatus'] === 'LiveIn') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="liveIn">Live In
                                                        </label>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>

                                            </div>
                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tin" id="tin" style="height: 3rem;" required>
                                                            <label for="tin" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['TinNo']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>TIN</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="height" id="height" required style="height: 3rem;" required>
                                                            <label for="height" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['Height']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>HEIGHT</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="gsis" id="gsis" style="height: 3rem;">
                                                            <label for="gsis" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['GsisOrSssNo']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>GSIS/SSS ID NO.</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" placeholder="" name="emailAddress" id="emailAddress" required style="height: 3rem;">
                                                            <label for="emailAddress" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['EmailAddress']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>EMAIL ADDRESS</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="pagibig" id="pagibig" style="height: 3rem;">
                                                            <label for="pagibig" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['PagibigNo']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>PAG-IBIG NO.</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="landlineNumber" id="landlineNumber" style="height: 3rem;">
                                                            <label for="landlineNumber" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['LandlineNo']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>LANDLINE NUMBER</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="Surname" name="philhealth" id="philhealth" style="height: 3rem;">
                                                            <label for="philhealth" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['PhilhealthNo']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>PHILHEALTH NO.</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" placeholder="First" name="cellphoneNumber" id="cellphoneNumber" required style="height: 3rem;">
                                                            <label for="cellphoneNumber" class="text-right"><span class="text-dark"><?= strtoupper($personalInfo['CellphoneNo']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>CELLPHONE NUMBER</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin: 3px;"></div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-top: 15px;">
                                                        <label class="form-label fw-bold" style="padding-right: 35px;">Disability:
                                                        </label>

                                                        <input class="form-check-input" type="radio" value="Visual" id="visual" name="disability" <?php echo ($personalInfo['Disability'] === 'Visual') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="visual" style="padding-right: 35px;">Visual
                                                        </label>

                                                        <input class="form-check-input" type="radio" value="Hearing" id="hearing" name="disability" <?php echo ($personalInfo['Disability'] === 'Hearing') ? 'checked' : ''; ?>>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="hearing">Hearing
                                                        </label>

                                                        <input class="form-check-input" type="radio" value="Speech" id="speech" name="disability" <?php echo ($personalInfo['Disability'] === 'Speech') ? 'checked' : ''; ?>>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="speech">Speech
                                                        </label>

                                                        <input class="form-check-input" type="radio" value="Physical" id="physical" name="disability" <?php echo ($personalInfo['Disability'] === 'Physical') ? 'checked' : ''; ?>>
                                                        <label style="padding-right: 35px;" class="form-check-label" for="physical">Physical
                                                        </label>
                                                        
                                                        
                                                        <?php if ($personalInfo['Disability'] != 'Visual' && $personalInfo['Disability'] != 'Hearing' && $personalInfo['Disability'] != 'Speech' && $personalInfo['Disability'] != 'Physical'): ?>
                                                            <input class="form-check-input" type="radio" value="others" id="others" name="disability" checked>
                                                            <label class="form-check-label" for="others">Others, Specify:</label>
                                                            <input id="othersInput" style="margin-left: 10px; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="disability" placeholder="<?php echo ($personalInfo['Disability']); ?>">
                                                        <?php else: ?>
                                                            <input class="form-check-input" type="radio" value="others" id="others" name="disability">
                                                            <label class="form-check-label" for="others">Others, Specify:</label>
                                                            <input id="othersInput" style="margin-left: 10px; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="disability">    
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                    <div class="row">
                                                        <div class="col-md-12" style="padding-top: 15px;">
                                                            <label class="form-label fw-bold" style="padding-right: 25px;">Employment Status
                                                            </label>

                                                            <input class="form-check-input" type="radio" value="Employed" id="employed" name="employmentStatus" <?php echo ($personalInfo['EmploymentStatus'] === 'Employed') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 35px;" class="form-check-label" for="employed">Employed</label>

                                                            <input class="form-check-input" type="radio" value="Unemployed" id="unemployed" name="employmentStatus" <?php echo ($personalInfo['EmploymentStatus'] === 'Unemployed') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 35px;" class="form-check-label" for="unemployed">Unemployed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-top: none;">
                                                        <div id="employedOptions" style="display: none;">
                                                            <label style="padding-right: 35px;" class="form-label fw-bold">EMPLOYED TYPE: </label>

                                                            <input class="form-check-input" type="radio" value="Wage Employed" id="wageEmployed" name="employmentType" <?php echo ($personalInfo['Type'] === 'Wage Employed') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 35px;" class="form-check-label" for="wageEmployed">Wage Employed</label>

                                                            <input class="form-check-input" type="radio" value="Self Employed" id="selfEmployed" name="employmentType" <?php echo ($personalInfo['Type'] === 'Self Employed') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 35px;" class="form-check-label" for="selfEmployed">Self Employed</label>
                                                        </div>
                                                    </div>
 
                                                    <div class="col-md-12" style="padding-top: none;">
                                                        <div id="unemployedOptions" style="display: none;">
                                                            <label style="padding-right: 35px;" class="form-label fw-bold">UNEMPLOYED TYPE: </label>

                                                            <input class="form-check-input" type="radio" value="New Entrant/ Fresh Graduate" id="newEntrant" name="employmentType" <?php echo ($personalInfo['Type'] === 'New Entrant/ Fresh Graduate') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 70px;" class="form-check-label" for="newEntrant">New Entrant/Fresh Graduate</label>

                                                            <input class="form-check-input" type="radio" value="Finished Contract" id="finishedContract" name="employmentType" <?php echo ($personalInfo['Type'] === 'Finished Contract') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 70px;" class="form-check-label" for="finishedContract">Finished Contract</label>

                                                            <input class="form-check-input" type="radio" value="Resigned" id="resigned" name="employmentType" <?php echo ($personalInfo['Type'] === 'Resigned') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 70px;" class="form-check-label" for="resigned">Resigned</label>

                                                            <input class="form-check-input" type="radio" value="Retired" id="retired" name="employmentType" <?php echo ($personalInfo['Type'] === 'Retired') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 70px;" class="form-check-label" for="retired">Retired</label>

                                                            <input class="form-check-input" type="radio" value="Terminated/Laidoff(local)" id="terminatedLaidOffLocal" name="employmentType" <?php echo ($personalInfo['Type'] === 'Terminated/Laidoff(local)') ? 'checked' : ''; ?> required>
                                                            <label style="padding-right: 70px;" class="form-check-label" for="terminatedLaidOffLocal">Terminated/Laidoff(local)</label>

                                                            <?php if ($personalInfo['Type'] === 'TerminatedAbroad'): ?>
                                                                <input class="form-check-input" type="radio" value="TerminatedAbroad" id="othersUnemployedTypeAbroad" name="employmentType" checked>
                                                                <label class="form-check-label" for="othersUnemployedTypeAbroad">Terminated/Laidoff(abroad)</label>
                                                                <input style="margin-left: 10px; margin-right: 30px; margin-bottom: 10px; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="terminatedAbroad" placeholder="<?php echo ($personalInfo['TerminatedAbroadSpecify']); ?>">
                                                            <?php else: ?>
                                                                <input class="form-check-input" type="radio" value="TerminatedAbroad" id="othersUnemployedTypeAbroad" name="employmentType">
                                                                <label class="form-check-label" for="othersUnemployedTypeAbroad">Terminated/Laidoff(abroad)</label>
                                                                <input style="margin-left: 10px; margin-right: 30px; margin-bottom: 10px; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="terminatedAbroad" placeholder="SPECIFY">
                                                            <?php endif; ?>

                                                            <?php if ($personalInfo['Type'] != 'New Entrant/ Fresh Graduate' && $personalInfo['Type'] != 'Finished Contract' && $personalInfo['Type'] != 'Resigned' && $personalInfo['Type'] != 'Retired' && $personalInfo['Type'] != 'Terminated/Laidoff(local)' && $personalInfo['Type'] != 'TerminatedAbroad'): ?>
                                                                <input class="form-check-input" type="radio" value="othersUnemployedType" name="employmentType" checked>
                                                                <label class="form-check-label" for="othersUnemployedType">Others, specify</label>
                                                                <input id="othersInputUnemployedTypeTwo" style="margin-left: 10px; margin-bottom: 10px; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="employmentType" placeholder="<?php echo ($personalInfo['Type']); ?>">
                                                            <?php else: ?>
                                                                <input class="form-check-input" type="radio" value="othersUnemployedType" name="employmentType">
                                                                <label class="form-check-label" for="othersUnemployedType">Others, specify</label>
                                                                <input id="othersInputUnemployedTypeTwo" style="margin-left: 10px; margin-bottom: 10px; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="employmentType" placeholder="SPECIFY">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label style="padding-right: 25px;" class="form-label fw-bold">Are you actively looking for work?</label>

                                                        <input class="form-check-input" type="radio" value="Yes" id="yesActively" name="activelyLooking" <?php echo ($personalInfo['ActivelyLooking'] === 'Yes') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 25px;" class="form-check-label" for="yesActively">Yes</label>

                                                        <input class="form-check-input" type="radio" value="No" id="noActively" name="activelyLooking" <?php echo ($personalInfo['ActivelyLooking'] === 'No') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 25px;" class="form-check-label" for="noActively">No</label>

                                                        <label style="padding-right: 25px;" for="howLong" class="form-label fw-bold">How long have you been looking for work?</label>
                                                        <input style="width: 20%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);  " name="howLong" id="howLong" type="text" placeholder="<?php echo ($personalInfo['LookingWork']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label style="padding-right: 25px;" class="form-label fw-bold">Willing to work immediately?</label>

                                                        <input class="form-check-input" type="radio" value="Yes" id="yesWilling" name="willingWork" <?php echo ($personalInfo['WillingWork'] === 'Yes') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 25px;" class="form-check-label" for="yesWilling">Yes</label>

                                                        <input class="form-check-input" type="radio" value="No" id="NoWilling" name="willingWork" <?php echo ($personalInfo['WillingWork'] === 'No') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 65px;" class="form-check-label" for="NoWilling">No</label>

                                                        <?php if ($personalInfo['WillingWork'] === 'No'): ?>
                                                            <label style="padding-right: 25px;" class="form-check-label" for="noWhen">If no, when?</label>
                                                            <input style="width: 20%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="ifNoWilling" placeholder="<?php echo ($personalInfo['IfNo']); ?>" required>
                                                        <?php else: ?>
                                                            <label style="padding-right: 25px;" class="form-check-label" for="noWhen">If no, when?</label>
                                                            <input style="width: 20%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="ifNoWilling" placeholder="SPECIFY WHEN" required>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin: 3px;"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label style="padding-right: 25px;" class="form-label fw-bold">Are you a 4PS beneficiary?</label>

                                                        <input class="form-check-input" type="radio" value="Yes" id="YesBeneficiary" name="beneficiary" <?php echo ($personalInfo['Beneficiary'] === 'Yes') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 25px;" class="form-check-label" for="YesBeneficiary">Yes</label>

                                                        <input class="form-check-input" type="radio" value="No" id="noBeneficiary" name="beneficiary" <?php echo ($personalInfo['Beneficiary'] === 'No') ? 'checked' : ''; ?> required>
                                                        <label style="padding-right: 89px;" class="form-check-label" for="noBeneficiary">No</label>
    
                                                        <?php if ($personalInfo['Beneficiary'] === 'Yes'): ?>
                                                            <label style="padding-right: 25px;" class="form-check-label" for="yesBeneficiary">If yes, Household ID No.</label>
                                                            <input id="yesInputHousehold" style="width: 20%; border-left: none; margin-bottom: 10px; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="householdId" placeholder="<?php echo ($personalInfo['IfYesHousehold']); ?>" required>
                                                        <?php else: ?>
                                                            <label style="padding-right: 25px;" class="form-check-label" for="yesBeneficiary">If yes, Household ID No.</label>
                                                            <input id="yesInputHousehold" style="width: 20%; border-left: none; margin-bottom: 10px; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" name="householdId" placeholder="HOUSEHOLD ID NO." required>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>

                                            </div>
                                        </form> <!-- .row end -->
                                    </div>
                                    <div class="col-lg-12 step-tab-panel" data-step="step2">

                                        <form action="<?= site_url('jobPreference') ?>" method="post" class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>II. Job Preference</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>
                                            <div class="container">
                                                <div style="border-top: 1ypx solid #999;"></div>
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                        <label class="form-label fw-bold" style="padding-right: 25px;">PREFERRED OCCUPATION</label>
                                                    </div>
                                                    <div class="col-md-5" style="padding-top: 1px; margin-top: 5px;">
                                                        <label class="form-label fw-bold" style="padding-right: 25px;">PREFERRED WORK LOCATION</label>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <label for="" class="form-label fw-bold">1.</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="occupation1" id="occupation1" type="text" placeholder="<?php echo ($jobPreference['PreferredOccu1']); ?>" required>
                                                        <br>
                                                        
                                                        <label for="" class="form-label fw-bold">2.</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="occupation2" id="occupation2" type="text" placeholder="<?php echo ($jobPreference['PreferredOccu2']); ?>" required>
                                                        <br>
                                                        
                                                        <label for="" class="form-label fw-bold">3.</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="occupation3" id="occupation3" type="text" placeholder="<?php echo ($jobPreference['PreferredOccu3']); ?>" required>
                                                        <br>
                                                        
                                                        <label for="" class="form-label fw-bold">4.</label>
                                                        <input style="width: 90%; border-left: none; margin-bottom: 20px; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="occupation4" id="occupation4" type="text" placeholder="<?php echo ($jobPreference['PreferredOccu4']); ?>" required>
                                                        <br>
                                                    </div>

                                                    <div class="col-md-7" style="padding-top: 15px;">
                                                        <?php if ($jobPreference['PreferredLocation'] === 'Cities'): ?>
                                                            <input style="margin-left: 15px;" class="form-check-input" type="radio" name="mybutton" value="Cities" id="localLocation" checked>
                                                            <label style="margin-left: 35px;" class="form-check-label" for="localLocation">Local, specify cities/municipalities:</label>
                                                        <?php else: ?>
                                                            <input style="margin-left: 15px;" class="form-check-input" type="radio" name="mybutton" value="Cities" id="localLocation" required>
                                                            <label style="margin-left: 35px;" class="form-check-label" for="localLocation">Local, specify cities/municipalities:</label>
                                                        <?php endif; ?>

                                                        <?php if ($jobPreference['PreferredLocation'] === 'Overseas'): ?>
                                                            <input name="mybutton" value="Overseas" style="margin-left: 15px;" class="form-check-input" type="radio" id="overseasLocation" checked>
                                                            <label style="margin-left: 35px;" class="form-check-label" for="overseasLocation">Overseas, specify countries:</label>
                                                        <?php else: ?>
                                                            <input name="mybutton" value="Overseas" style="margin-left: 15px;" class="form-check-input" type="radio" id="overseasLocation" required>
                                                            <label style="margin-left: 35px;" class="form-check-label" for="overseasLocation">Overseas, specify countries:</label>
                                                        <?php endif; ?>
                                                            <br>
                                                        <div style="margin: 10px;"></div>
                                                        
                                                        <div id="localSpecifyOptions" style="display: none;">
                                                            <?php if (!empty($jobPreference['PreferredLocCity1'])): ?>
                                                                <label for="" class="form-label fw-bold">1.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="localSpecify1" id="localSpecify1" type="text"placeholder="<?php echo ($jobPreference['PreferredLocCity1']); ?>" required><br>
                                                            <?php else: ?>
                                                                <label for="" class="form-label fw-bold">1.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="localSpecify1" id="localSpecify1" type="text" placeholder="Specify Municipality/City" required><br>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobPreference['PreferredLocCity2'])): ?>
                                                                <label for="" class="form-label fw-bold">2.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="localSpecify2" id="localSpecify2" type="text" placeholder="<?php echo ($jobPreference['PreferredLocCity2']); ?>" required><br>
                                                            <?php else: ?>
                                                                <label for="" class="form-label fw-bold">2.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="localSpecify2" id="localSpecify2" type="text" placeholder="Specify Municipality/City" required><br>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobPreference['PreferredLocCity3'])): ?>
                                                                <label for="" class="form-label fw-bold">3.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="localSpecify3" id="localSpecify3" type="text" placeholder="<?php echo ($jobPreference['PreferredLocCity3']); ?>" required><br>
                                                            <?php else: ?>
                                                                <label for="" class="form-label fw-bold">3.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="localSpecify3" id="localSpecify3" type="text" placeholder="Specify Municipality/City" required><br>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div id="overseasSpecifyOptions" style="display: none;">
                                                            <?php if (!empty($jobPreference['PreferredLocOverseas1'])): ?>
                                                                <label for="" class="form-label fw-bold">1.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="overseasSpecify1" id="overseasSpecify1" type="text" placeholder="<?php echo ($jobPreference['PreferredLocOverseas1']); ?>" required><br>
                                                            <?php else: ?>
                                                                <label for="" class="form-label fw-bold">1.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="overseasSpecify1" id="overseasSpecify1" type="text" placeholder="Specify Country" required><br>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobPreference['PreferredLocOverseas2'])): ?>
                                                                <label for="" class="form-label fw-bold">2.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="overseasSpecify2" id="overseasSpecify2" type="text" placeholder="<?php echo ($jobPreference['PreferredLocOverseas2']); ?>" required><br>
                                                            <?php else: ?>
                                                                <label for="" class="form-label fw-bold">2.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="overseasSpecify2" id="overseasSpecify2" type="text" placeholder="Specify Country" required><br>
                                                            <?php endif; ?>

                                                            <?php if (!empty($jobPreference['PreferredLocOverseas3'])): ?>
                                                                <label for="" class="form-label fw-bold">3.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="overseasSpecify3" id="overseasSpecify3" type="text" placeholder="<?php echo ($jobPreference['PreferredLocOverseas3']); ?>" required><br>
                                                            <?php else: ?>
                                                                <label for="" class="form-label fw-bold">3.</label>
                                                                <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="overseasSpecify3" id="overseasSpecify3" type="text" placeholder="Specify Country" required><br>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <label for="expectedSalary" class="form-label fw-bold">Expected Salary(Range)</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="expectedSalary" id="expectedSalary" type="text" placeholder="<?php echo ($jobPreference['ExpectedSalaryRange']); ?>" required>
                                                    </div>

                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <label for="passportNo" class="form-label fw-bold">Passport No.</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="passportNo" id="passportNo" type="text" placeholder="<?php echo ($jobPreference['PassportNo']); ?>" required>
                                                    </div>
                                                    <div class="col-md-3" style="padding-top: 15px;">
                                                    <?php if ($jobPreference['ExpiryDate'] === '0000-00-00'): ?>
                                                        <label for="passportExpiry" class="form-label fw-bold">Expiry date</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; margin-bottom: 20px; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="passportExpiry" id="passportExpiry" type="date" placeholder="" required>
                                                    <?php else: ?>
                                                        <label for="passportExpiry" class="form-label fw-bold">Expiry date</label>
                                                        <input style="width: 90%; border-left: none; border-right: none; margin-bottom: 20px; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" name="passportExpiry" id="passportExpiry" type="date" placeholder="<?php echo ($jobPreference['ExpiryDate']); ?>" required>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999; margin: 5px;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                            <div style="margin: 3px;"></div>
                                        </form>
                                    </div>
                                    <div class="col-lg-12 step-tab-panel" data-step="step3">
                                        <form action="<?= site_url('jobseekerLanguage') ?>" method="post"
                                            class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>III. Language/ Dialect Proficiency</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>
                                            
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                        <label class="form-label fw-bold" style="padding-right: 25px;">CHECK IF APPLICABLE</label>
                                                    </div>

                                                    <div class="col-md-12" style="padding-top: 15px;">
                                                        <label style="padding-right: 70px;" class="form-label fw-bold"></label>
                                                   
                                                        <label style="padding-right: 30px; font-size: 17px;" class="form-check-label" for="englishRead">READ</label>
                                                   
                                                        <label style="padding-right: 30px; font-size: 17px;" class="form-check-label" for="englishWrite">WRITE</label>
                                                   
                                                        <label style="padding-right: 30px; font-size: 17px;" class="form-check-label" for="englishWrite">SPEAK</label>
                                                   
                                                        <label style="font-size: 17px;" class="form-check-label" for="englishWrite">UNDERSTAND</label>
                                                    </div>
                                                </div>
                                            <div style="border-bottom: 2px solid #999;"></div>

                                            </div>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-top: 15px;">
                                                        <label class="form-label fw-bold" style="padding-right: 40px; font-size: 17px;">English</label>

                                                        <input class="form-check-input" type="checkbox" value="Yes" id="englishRead" name="englishRead" style="margin-right: 1px;" <?php echo ($language['EnglishRead'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="englishRead" style="padding-right: 75px;"></label>

                                                        <input class="form-check-input" type="checkbox" value="Yes" id="englishWrite" name="englishWrite" style="margin-right: 1px;" <?php echo ($language['EnglishWrite'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="englishWrite" style="padding-right: 75px;"></label>

                                                        <input class="form-check-input" type="checkbox" value="Yes" id="englishSpeak" name="englishSpeak" style="margin-right: 1px;" <?php echo ($language['EnglishSpeak'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="englishSpeak" style="padding-right: 90px;"></label>

                                                        <input class="form-check-input" type="checkbox" value="Yes" id="englishUnderstand" name="englishUnderstand" <?php echo ($language['EnglishUnderstand'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="englishUnderstand"></label>
                                                    </div>
                                                </div>
                                            <div style="border-bottom: 2px solid #999;"></div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-top: 15px;">
                                                        <label class="form-label fw-bold" style="padding-right: 37px; font-size: 17px;">Filipino</label>
                                                   
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoRead" name="filipinoRead" <?php echo ($language['FilipinoRead'] === 'Yes') ? 'checked' : ''; ?>>
                                                         <label class="form-check-label" style="padding-right: 75px;"></label>
                                                   
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoWrite" name="filipinoWrite" <?php echo ($language['FilipinoWrite'] === 'Yes') ? 'checked' : ''; ?>>
                                                         <label class="form-check-label" style="padding-right: 75px;"></label>
                                                   
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoSpeak" name="filipinoSpeak" <?php echo ($language['FilipinoSpeak'] === 'Yes') ? 'checked' : ''; ?>>
                                                         <label class="form-check-label" style="padding-right: 90px;"></label>
                                                   
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoUnderstand" name="filipinoUnderstand" <?php echo ($language['FilipinoUnderstand'] === 'Yes') ? 'checked' : ''; ?>>
                                                         <label class="form-check-label"></label>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                <div class="col-md-12" style="padding-top: 1px; margin-top: 5px;">
                                                        <label style="padding-right: 40px; font-size: 17px;" class="form-label fw-bold">Others:</label>
                                                        <input class="form-check-input" style="width: 15%; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" type="text" id="othersLanguage" name="othersLanguage" placeholder="<?php echo ($language['OthersLanguage']); ?>">
                                                    </div>

                                                    <div class="col-md-12" style="padding-top: 15px;">
                                                        <label class="form-check-label" style="padding-right: 90px;"></label>

                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoRead" name="othersRead" <?php echo ($language['OthersRead'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" style="padding-right: 90px;"></label>
                                                    
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoWrite" name="othersWrite" <?php echo ($language['OthersWrite'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" style="padding-right: 70px;"></label>
                                                    
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoSpeak" name="othersSpeak" <?php echo ($language['OthersSpeak'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" style="padding-right: 85px;"></label>
                                                    
                                                        <input class="form-check-input" type="checkbox" value="Yes" id="filipinoUnderstand" name="othersUnderstand" <?php echo ($language['OthersUnderstand'] === 'Yes') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;  margin: 5px;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-12 step-tab-panel" data-step="step4">
                                        <form action="<?= site_url('jobseekerEducBackground') ?>" method="post"
                                            class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>IV. Educational Background</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>
                                            <div class="container">
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px;">ELEMENTARY</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="elementarySchool" id="elementarySchool" required style="height: 3rem;">
                                                            <label for="elementarySchool" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['ElementarySchool']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>School</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="elementaryYearGrad" id="elementaryYearGrad" required style="height: 3rem;">
                                                            <label for="elementaryYearGrad" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['ElementaryYearGrad']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Year graduated</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="elementaryLevel" id="elementaryLevel" required style="height: 3rem;">
                                                            <label for="elementaryLevel" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['ElementaryLevel']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>If undergraduate, what level</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="elementaryLastAttend" id="elementaryLastAttend" required style="height: 3rem;">
                                                            <label for="elementaryLastAttend" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['ElementaryLastAttend']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 16px;"><span class="text-dark"></span>If undergraduate year last attend</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="elementaryAwardsReceived" id="elementaryAwardsReceived" required style="height: 3rem;">
                                                            <label for="elementaryAwardsReceived" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['ElementaryAwards']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Awards received</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;">SECONDARY</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="secondarySchool" id="secondarySchool" required style="height: 3rem;">
                                                            <label for="secondarySchool" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['SecondarySchool']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>School</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="secondaryCourse" id="secondaryCourse" required style="height: 3rem;">
                                                            <label for="secondaryCourse" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['SecondaryCourse']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Course</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="secondaryYearGrad" id="secondaryYearGrad" required style="height: 3rem;">
                                                            <label for="secondaryYearGrad" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['SecondaryYearGrad']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Year graduated</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="secondaryLevel" id="secondaryLevel" required style="height: 3rem;">
                                                            <label for="secondaryLevel" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['SecondaryLevel']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>If undergraduate, what level</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="secondaryLastAttend" id="secondaryLastAttend" required style="height: 3rem;">
                                                            <label for="secondaryLastAttend" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['SecondaryLastAttend']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 16px;"><span class="text-dark"></span>If undergraduate, year last attend</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="secondaryAwardsReceived" id="secondaryAwardsReceived" required style="height: 3rem;">
                                                            <label for="secondaryAwardsReceived" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['SecondaryAwards']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Awards received</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;">TERTIARY</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tertiarySchool" id="tertiarySchool" required style="height: 3rem;">
                                                            <label for="tertiarySchool" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['TertiarySchool']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>School</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tertiaryCourse" id="tertiaryCourse" required style="height: 3rem;">
                                                            <label for="tertiaryCourse" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['TertiaryCourse']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Course</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tertiaryYearGrad" id="tertiaryYearGrad" required style="height: 3rem;">
                                                            <label for="tertiaryYearGrad" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['TertiaryYearGrad']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Year graduated</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tertiaryLevel" id="tertiaryLevel" required style="height: 3rem;">
                                                            <label for="tertiaryLevel" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['TertiaryLevel']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>If undergraduate, what level</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tertiaryLastAttend" id="tertiaryLastAttend" required style="height: 3rem;">
                                                            <label for="tertiaryLastAttend" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['TertiaryLastAttend']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 16px;"><span class="text-dark"></span>If undergraduate, year last attend</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="tertiaryAwardsReceived" id="tertiaryAwardsReceived" required style="height: 3rem;">
                                                            <label for="tertiaryAwardsReceived" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['TertiaryAwards']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Awards received</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;">GRADUATE STUDIES</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="gradStudiesSchool" id="gradStudiesSchool" required style="height: 3rem;">
                                                            <label for="gradStudiesSchool" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['GradStudiesSchool']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>School</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="gradStudiesCourse" id="gradStudiesCourse" required style="height: 3rem;">
                                                            <label for="gradStudiesCourse" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['GradStudiesCourse']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Course</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="gradStudiesYearGrad" id="gradStudiesYearGrad" required style="height: 3rem;">
                                                            <label for="gradStudiesYearGrad" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['GradStudiesYearGrad']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Year graduated</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="gradStudiesAwardsReceived" id="gradStudiesAwardsReceived" required style="height: 3rem;">
                                                            <label for="gradStudiesAwardsReceived" class="text-right"><span class="text-dark"><?= strtoupper($educBackground['GradStudiesAward']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 17px;"><span class="text-dark"></span>Awards received</label>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;"></div>
                                            </div>

                                            <div class="container">
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-12 step-tab-panel" data-step="step5">
                                        <form action="<?= site_url('vocationalAndTraining') ?>" method="post"
                                            class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>V. TECHNICAL/VOCATIONAL AND OTHER TRAINING(Include courses takens as part of college education)</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>

                                            <div class="container">
                                               
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($training['TrainingTitle1'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="training1" id="training1" required style="height: 3rem;">
                                                                <label for="training1" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingTitle1']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="training1" id="training1" required style="height: 3rem;">
                                                                <label for="training1" class="text-right"><span class="text-dark">1.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>TRAINING/VOCATIONAL COURSE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" placeholder="" name="duration1" id="duration1" required style="height: 3rem; width: 100%;">
                                                                    <label for="duration1" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingDuration1']) ?></span></label>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" placeholder="" name="duration1A" id="duration1A" required style="height: 3rem; width: 100%;">
                                                                    <label for="duration1A" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingDuration1A']) ?></span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>DURATION(mm/dd/yyyy to mm/dd/yyyy)</label>
                                                    </div>
                                             
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="trainingInstitution1" id="trainingInstitution1" required style="height: 3rem; width: 100%;">
                                                            <label for="trainingInstitution1" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingInstitution1']) ?></span></label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>TRAINING INSTITUTION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="certificates1" id="certificates1" required style="height: 3rem;">
                                                            <label for="certificates1" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingCertificate1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>CERTIFICATES RECEIVED(NCI, NCII, NCIII)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($training['TrainingTitle2'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="training2" id="training2" required style="height: 3rem;">
                                                                <label for="training2" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingTitle2']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="training2" id="training2" required style="height: 3rem;">
                                                                <label for="training2" class="text-right"><span class="text-dark">2.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>TRAINING/VOCATIONAL COURSE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" placeholder="" name="duration2" id="duration2" required style="height: 3rem; width: 100%;">
                                                                    <label for="duration2" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingDuration2']) ?></span></label>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" placeholder="" name="duration2A" id="duration2A" required style="height: 3rem; width: 100%;">
                                                                    <label for="duration2A" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingDuration2A']) ?></span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>DURATION(mm/dd/yyyy to mm/dd/yyyy)</label>
                                                    </div>
                                             
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="trainingInstitution2" id="trainingInstitution2" required style="height: 3rem;">
                                                            <label for="trainingInstitution2" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingInstitution2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>TRAINING INSTITUTION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="certificates2" id="certificates2" required style="height: 3rem;">
                                                            <label for="certificates2" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingCertificate2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>CERTIFICATES RECEIVED(NCI, NCII, NCIII)</label>
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($training['TrainingTitle1'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="training3" id="training3" required style="height: 3rem;">
                                                                <label for="training3" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingTitle3']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="training3" id="training3" required style="height: 3rem;">
                                                                <label for="training3" class="text-right"><span class="text-dark">3.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>TRAINING/VOCATIONAL COURSE</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" placeholder="" name="duration3" id="duration3" required style="height: 3rem; width: 100%;">
                                                                    <label for="duration3" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingDuration3']) ?></span></label>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" class="form-control" placeholder="" name="duration3A" id="duration3A" required style="height: 3rem; width: 100%;">
                                                                    <label for="duration3A" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingDuration3A']) ?></span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>DURATION(mm/dd/yyyy to mm/dd/yyyy)</label>
                                                    </div>
                                             
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="trainingInstitution3" id="trainingInstitution3" required style="height: 3rem;">
                                                            <label for="trainingInstitution3" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingInstitution3']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>TRAINING INSTITUTION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="certificates3" id="certificates3" required style="height: 3rem;">
                                                            <label for="certificates3" class="text-right"><span class="text-dark"><?= strtoupper($training['TrainingCertificate1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>CERTIFICATES RECEIVED(NCI, NCII, NCIII)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div style="border-bottom: 2px solid #999; margin: 3px;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-12 step-tab-panel" data-step="step6">
                                        <form action="<?= site_url('eligibilityLicense') ?>" method="post"
                                            class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>VI. ELIGIBILITY/PROFESSIONAL LICENSE</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>



                                            <div class="container">
                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($eligibility['EligibilityTitle1'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="eligibilityA" id="eligibilityA" required style="height: 3rem;">
                                                                <label for="eligibilityA" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['EligibilityTitle1']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="eligibilityA" id="eligibilityA" required style="height: 3rem;">
                                                                <label for="eligibilityA" class="text-right"><span class="text-dark">1.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ELIGIBILITY(CIVIL SERVICE)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="ratingA" id="ratingA" required style="height: 3rem;">
                                                            <label for="ratingA" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['EligibilityRating1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>RATING</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="dateExamA" id="dateExamA" required style="height: 3rem;">
                                                            <label for="dateExamA" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['EligibilityDate1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>DATE OF EXAMINATION</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($eligibility['EligibilityTitle2'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="eligibilityB" id="eligibilityB" required style="height: 3rem;">
                                                                <label for="eligibilityB" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['EligibilityTitle2']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="eligibilityB" id="eligibilityB" required style="height: 3rem;">
                                                                <label for="eligibilityB" class="text-right"><span class="text-dark">2.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ELIGIBILITY(CIVIL SERVICE)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="ratingB" id="ratingB" required style="height: 3rem;">
                                                            <label for="ratingB" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['EligibilityRating2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>RATING</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="dateExamB" id="dateExamB" required style="height: 3rem;">
                                                            <label for="dateExamB" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['EligibilityDate2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>DATE OF EXAMINATION</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($eligibility['LicenseTitle1'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="proLicenseA" id="proLicenseA" required style="height: 3rem;">
                                                                <label for="proLicenseA" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['LicenseTitle1']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="proLicenseA" id="proLicenseA" required style="height: 3rem;">
                                                                <label for="proLicenseA" class="text-right"><span class="text-dark">1.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>PROFESSIONAL LICENSE(PRC)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" placeholder="" name="validUntilA" id="validUntilA" required style="height: 3rem;">
                                                            <label for="validUntilA" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['LicenseUntil1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>VALID UNTIL</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($eligibility['LicenseTitle2'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="proLicenseB" id="proLicenseB" required style="height: 3rem;">
                                                                <label for="proLicenseB" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['LicenseTitle2']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="proLicenseB" id="proLicenseB" required style="height: 3rem;">
                                                                <label for="proLicenseB" class="text-right"><span class="text-dark">2.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>PROFESSIONAL LICENSE(PRC)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="date" class="form-control" placeholder="" name="validUntilB" id="validUntilB" required style="height: 3rem;">
                                                            <label for="validUntilB" class="text-right"><span class="text-dark"><?= strtoupper($eligibility['LicenseUntil2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>VALID UNTIL</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div style="border-bottom: 2px solid #999; margin: 3px;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-12 step-tab-panel" data-step="step7">
                                        <form action="<?= site_url('workExperience') ?>" method="post" class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>VII. WORK EXPERIENCE(Limit to 10 year period, start
                                                        with the most recent employment)</b></h6>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>INSTRUCTIONS:</b> Indicate "NA" if not applicable</h6>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($workExperience['CompanyName1'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameA" id="companyNameA" required style="height: 3rem;">
                                                                <label for="companyNameA" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyName1']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameA" id="companyNameA" required style="height: 3rem;">
                                                                <label for="companyNameA" class="text-right"><span class="text-dark">1.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>COMPANY NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="addressCompanyA" id="addressCompanyA" required style="height: 3rem;">
                                                            <label for="addressCompanyA" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyAddress1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ADDRESS(CITY/MUNICIPALITY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="positionCompanyA" id="positionCompanyA" required style="height: 3rem;">
                                                            <label for="positionCompanyA" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyPosition1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>POSITION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="inclusiveDatesA" id="inclusiveDatesA" required style="height: 3rem;">
                                                            <label for="inclusiveDatesA" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyDates1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>INCLUSIVE DATES(MM/YYYY TO MM/YYYY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="statusCompanyA" id="statusCompanyA" required style="height: 3rem;">
                                                            <label for="statusCompanyA" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyStatus1']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>STATUS(PERMANENT, CONTRACTUAL, PART-TIME, PROBATIONARY)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($workExperience['CompanyName2'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameB" id="companyNameB" required style="height: 3rem;">
                                                                <label for="companyNameB" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyName2']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameB" id="companyNameB" required style="height: 3rem;">
                                                                <label for="companyNameB" class="text-right"><span class="text-dark">2.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>COMPANY NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="addressCompanyB" id="addressCompanyB" required style="height: 3rem;">
                                                            <label for="addressCompanyB" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyAddress2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ADDRESS(CITY/MUNICIPALITY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="positionCompanyB" id="positionCompanyB" required style="height: 3rem;">
                                                            <label for="positionCompanyB" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyPosition2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>POSITION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="inclusiveDatesB" id="inclusiveDatesB" required style="height: 3rem;">
                                                            <label for="inclusiveDatesB" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyDates2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>INCLUSIVE DATES(MM/YYYY TO MM/YYYY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="statusCompanyB" id="statusCompanyB" required style="height: 3rem;">
                                                            <label for="statusCompanyB" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyStatus2']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>STATUS(PERMANENT, CONTRACTUAL, PART-TIME, PROBATIONARY)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($workExperience['CompanyName3'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameC" id="companyNameC" required style="height: 3rem;">
                                                                <label for="companyNameC" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyName3']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameC" id="companyNameC" required style="height: 3rem;">
                                                                <label for="companyNameC" class="text-right"><span class="text-dark">3.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>COMPANY NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="addressCompanyC" id="addressCompanyC" required style="height: 3rem;">
                                                            <label for="addressCompanyC" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyAddress3']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ADDRESS(CITY/MUNICIPALITY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="positionCompanyC" id="positionCompanyC" required style="height: 3rem;">
                                                            <label for="positionCompanyC" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyPosition3']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>POSITION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="inclusiveDatesC" id="inclusiveDatesC" required style="height: 3rem;">
                                                            <label for="inclusiveDatesC" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyDates3']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>INCLUSIVE DATES(MM/YYYY TO MM/YYYY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="statusCompanyC" id="statusCompanyC" required style="height: 3rem;">
                                                            <label for="statusCompanyC" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyStatus3']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>STATUS(PERMANENT, CONTRACTUAL, PART-TIME, PROBATIONARY)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($workExperience['CompanyName4'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameD" id="companyNameD" required style="height: 3rem;">
                                                                <label for="companyNameD" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyName4']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameD" id="companyNameD" required style="height: 3rem;">
                                                                <label for="companyNameD" class="text-right"><span class="text-dark">4.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>COMPANY NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="addressCompanyD" id="addressCompanyD" required style="height: 3rem;">
                                                            <label for="addressCompanyD" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyAddress4']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ADDRESS(CITY/MUNICIPALITY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="positionCompanyD" id="positionCompanyD" required style="height: 3rem;">
                                                            <label for="positionCompanyD" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyPosition4']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>POSITION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="inclusiveDatesD" id="inclusiveDatesD" required style="height: 3rem;">
                                                            <label for="inclusiveDatesD" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyDates4']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>INCLUSIVE DATES(MM/YYYY TO MM/YYYY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="statusCompanyD" id="statusCompanyD" required style="height: 3rem;">
                                                            <label for="statusCompanyD" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyStatus4']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>STATUS(PERMANENT, CONTRACTUAL, PART-TIME, PROBATIONARY)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>
                                                <div class="col-md-6" style="padding-top: 1px; margin-top: 5px;">
                                                    <label class="form-label fw-bold" style="padding-right: 25px; margin-top: 20px;"></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <?php if (!empty($workExperience['CompanyName5'])): ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameE" id="companyNameE" required style="height: 3rem;">
                                                                <label for="companyNameE" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyName5']) ?></span>
                                                                </label>
                                                            <?php else: ?>
                                                                <input type="text" class="form-control" placeholder="" name="companyNameE" id="companyNameE" required style="height: 3rem;">
                                                                <label for="companyNameE" class="text-right"><span class="text-dark">5.</span>
                                                                </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>COMPANY NAME</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="addressCompanyE" id="addressCompanyE" required style="height: 3rem;">
                                                            <label for="addressCompanyE" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyAddress5']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>ADDRESS(CITY/MUNICIPALITY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="positionCompanyE" id="positionCompanyE" required style="height: 3rem;">
                                                            <label for="positionCompanyE" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyPosition5']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>POSITION</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="inclusiveDatesE" id="inclusiveDatesE" required style="height: 3rem;">
                                                            <label for="inclusiveDatesE" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyDates5']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 15px;"><span class="text-dark"></span>INCLUSIVE DATES(MM/YYYY TO MM/YYYY)</label>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" placeholder="" name="statusCompanyE" id="statusCompanyE" required style="height: 3rem;">
                                                            <label for="statusCompanyE" class="text-right"><span class="text-dark"><?= strtoupper($workExperience['CompanyStatus5']) ?></span>
                                                            </label>
                                                        </div>
                                                        <label for="firstName" class="text-right form-label fw-bold" style="font-size: 13px;"><span class="text-dark"></span>STATUS(PERMANENT, CONTRACTUAL, PART-TIME, PROBATIONARY)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="container">
                                                <div style="border-bottom: 2px solid #999;  margin: 5px;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-lg-12 step-tab-panel" data-step="step7">
                                        <form action="<?= site_url('otherSkills') ?>" method="post" class="row g-3">
                                            <div class="col-12 mb-3">
                                                <h6 class="mb-1"><b>VIII. OTHER SKILLS ACQUIRED WITHOUT FORMAL TRAINING</b></h6>
                                            </div>
                                            <div class="container">
                                                <div style="border-top: 2px solid #999;"></div>

                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Auto Mechanic" id="autoMechanic" name="autoMechanic" <?php echo ($otherSkills['AutoMechanic'] === 'Auto Mechanic') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="autoMechanic">AUTO MECHANIC</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Electrician" id="electrician" name="electrician" <?php echo ($otherSkills['Electrician'] === 'Electrician') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="electrician">ELECTRICIAN</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Photography" id="photography" name="photography" <?php echo ($otherSkills['Photography'] === 'Photography') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="photography">PHOTOGRAPHY</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Beautician" id="beautician" name="beautician" <?php echo ($otherSkills['Beautician'] === 'Beautician') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="beautician">BEAUTICIAN</label>
                                                    </div>
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Embroidery" id="embroidery" name="embroidery" <?php echo ($otherSkills['Embroidery'] === 'Embroidery') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="embroidery">EMBROIDERY</label>
                                                    </div>
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Plumbing" id="plumbing" name="plumbing" <?php echo ($otherSkills['Plumbing'] === 'Plumbing') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="plumbing">PLUMBING</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Carpentry Work" id="carpentryWork" name="carpentryWork" <?php echo ($otherSkills['CarpentryWork'] === 'Carpentry Work') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="carpentryWork">CARPENTRY WORK</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Gardening" id="gardening" name="gardening" <?php echo ($otherSkills['Gardening'] === 'Gardening') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="gardening">GARDENING</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Sewing Dresses" id="sewingDresses" name="sewingDresses" <?php echo ($otherSkills['SewingDresses'] === 'SewingnDresses') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="sewingDresses">SEWING DRESSES</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Computer Literate" id="computerLiterate" name="computerLiterate" <?php echo ($otherSkills['ComputerLiterate'] === 'Computer Literate') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="computerLiterate">COMPUTER LITERATE</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Masonry" id="masonry" name="masonry" <?php echo ($otherSkills['Masonry'] === 'Masonry') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="masonry">MASONRY</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Stenography" id="stenography" name="stenography" <?php echo ($otherSkills['Stenography'] === 'Stenography') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="stenography">STENOGRAPHY</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Domestic Chores" id="domesticChores" name="domesticChores" <?php echo ($otherSkills['DomesticChores'] === 'Domestic Chores') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="domesticChores">DOMESTIC CHORES</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Painter/Artist" id="painterArtist" name="painterArtist" <?php echo ($otherSkills['PainterArtist'] === 'Painter/Artist') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="painterArtist">PAINTER/ARTIST</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Tailoring" id="tailoring" name="tailoring" <?php echo ($otherSkills['Tailoring'] === 'Tailoring') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="tailoring">TAILORING</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Driver" id="driver" name="driver" <?php echo ($otherSkills['Driver'] === 'Driver') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="driver">DRIVER</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px;">
                                                        <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="Painting Jobs" id="paintingJobs" name="paintingJobs" <?php echo ($otherSkills['PaintingJobs'] === 'Painting Jobs') ? 'checked' : ''; ?>>
                                                        <label style="margin-left: 50px;" class="form-check-label" for="paintingJobs">PAINTING JOBS</label>
                                                    </div>
                                                    <div class="col-md-4 " style="padding-top: 15px; margin-bottom: 10px;">
                                                        <?php if (!empty($otherSkills['OthersSkill'])): ?>
                                                            <input style="margin-left: 20px;" class="form-check-input" type="checkbox" id="otherSkills" <?php echo ($otherSkills['OthersSkill'] === 'OthersSkill') ? 'checked' : ''; ?>>
                                                            <label style="margin-left: 50px;" class="form-check-label" for="otherSkills">OTHERS:</label>
                                                            <input style="margin-left: 20px; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" id="othersInputSkills" type="text" name="otherSkills" placeholder="<?php echo ($otherSkills['OthersSkill']); ?>">
                                                        <?php else: ?>
                                                            <input style="margin-left: 20px;" class="form-check-input" type="checkbox" id="otherSkills">
                                                            <label style="margin-left: 50px;" class="form-check-label" for="otherSkills">OTHERS:</label>
                                                            <input style="margin-left: 20px; border-left: none; border-right: none; border-top: none; border-bottom: 1px solid rgba(0, 0, 0, 0.5);" id="othersInputSkills" type="text" name="otherSkills" placeholder="SPECIFY SKILLS">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: 2px solid #999;  margin: 5px;"></div>
                                                <div style="padding-top: 5px;"></div>
                                                <button type="submit" class="btn btn-success" style="float: right;">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->include('jobseeker/inc/footer')?>
            </div>
        </div>
    </div>
    <script src="assets/default/jsss/theme.js"></script>
    <script src="assets/default/jsss/bundle/jquerysteps.bundle.js"></script>

    <script>
        function saveStep1() {
            document.getElementById("step2Tab").classList.remove("disabled");
        }
    </script>
    <script>
        $('.v-wizard-demo1').steps({});
        $('.v-wizard-demo2').steps({});
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-control').on('input', function() {
                if ($(this).val().length > 0) {
                    $(this).closest('.form-floating').addClass('has-value');
                } else {
                    $(this).closest('.form-floating').removeClass('has-value');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var employedRadio = document.getElementById('employed');
            var unemployedRadio = document.getElementById('unemployed');
            var employedOptionsDiv = document.getElementById('employedOptions');
            var unemployedOptionsDiv = document.getElementById('unemployedOptions');

            employedRadio.addEventListener('change', function() {
                employedOptionsDiv.style.display = this.checked ? 'block' : 'none';
                unemployedOptionsDiv.style.display = 'none';
            });

            unemployedRadio.addEventListener('change', function() {
                unemployedOptionsDiv.style.display = this.checked ? 'block' : 'none';
                employedOptionsDiv.style.display = 'none';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var othersUnemployedTypeAbroadRadio = document.getElementById('othersUnemployedTypeAbroad');
            var othersInputUnemployedType = document.getElementById('othersInputUnemployedType');

            othersUnemployedTypeAbroadRadio.addEventListener('change', function() {
                othersInputUnemployedType.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var localLocationRadio = document.getElementById('localLocation');
            var overseasLocationRadio = document.getElementById('overseasLocation');
            var localSpecifyOptionsDiv = document.getElementById('localSpecifyOptions');
            var overseasSpecifyOptionsDiv = document.getElementById('overseasSpecifyOptions');

            localLocationRadio.addEventListener('change', function() {
                localSpecifyOptionsDiv.style.display = this.checked ? 'block' : 'none';
                overseasSpecifyOptionsDiv.style.display = 'none';
            });

            overseasLocationRadio.addEventListener('change', function() {
                overseasSpecifyOptionsDiv.style.display = this.checked ? 'block' : 'none';
                localSpecifyOptionsDiv.style.display = 'none';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var othersUnemployedTypeRadio = document.getElementById('othersUnemployedType');
            var othersInputUnemployedTypeTwo = document.getElementById('othersInputUnemployedTypeTwo');

            othersUnemployedTypeRadio.addEventListener('change', function() {
                othersInputUnemployedTypeTwo.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var noWhenRadio = document.getElementById('noWhen');
            var noInputWhen = document.getElementById('noInputWhen');

            noWhenRadio.addEventListener('change', function() {
                noInputWhen.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>
<?= $this->include('jobseeker/inc/end')?>
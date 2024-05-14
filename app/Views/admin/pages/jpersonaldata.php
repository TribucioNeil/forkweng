<?= $this->include('admin/inc/top')?>
<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">
        <!-- Sidebar -->
        <div class="sidebar-wrapper">
            <?= $this->include('admin/inc/sidebar')?>
        </div>
        <div class="main-panel">
            <div class="content-wrapper">
                <form action="<?= site_url('generatePdfAd') ?>" method="post">
                    <input type="hidden" name="id" value="<?= ($personalInfo['jobseekerId']); ?>">
                    <button type="submit">PDF</button>
                    <div class="personal-info-section">
                    

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>I. PERSONAL INFORMATION</b></h6>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['SurName']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">SURNAME</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['FirstName']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">FIRST NAME</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['MiddleName']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">MIDDLE NAME</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['Suffix']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">SUFFIX</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['DateOfBirth']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">DATE OF BIRTH</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['PlaceOfBirth']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">PLACE OF BIRTH</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['Religion']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">RELIGION</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                        <div class="col-md-2">
                            <label class="form-label text-dark"
                                style="padding-top: 15px;">PRESENT ADDRESS</labe1>

                        </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['HouseNoOrStreet']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">House no./Street</span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['Barangay']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">Barangay</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['MunicipalityOrCity']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">Municipality/City</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['Province']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">Province</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">SEX</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['Sex']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">CIVIL STATUS</label>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['CivilStatus']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['TinNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">TIN</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['Height']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">HEIGHT</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['GsisOrSssNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">GSIS/SSS ID NO.</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['EmailAddress']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">EMAIL ADDRESS</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['PagibigNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">PAG-IBIG NO.</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['LandlineNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">LANDLINE NUMBER</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['PhilhealthNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">PHILHEALTH NO.</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($personalInfo['CellphoneNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">CELLPHONE NUMBER</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">DISABILITY</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['Disability']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">EMPLOYMENT STATUS</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['EmploymentStatus']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">TYPE</labe1>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['Type']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">Are you actively looking for work?</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['ActivelyLooking']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">How long have you been looking for work?</labe1>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['LookingWork']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">Willing to work immediately?</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['WillingWork']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">If no, when?</labe1>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['IfNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">Are you a 4Ps beneficiary?</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['Beneficiary']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">If yes, Household ID No.</labe1>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($personalInfo['IfYesHousehold']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>II. JOB PREFERENCE</b></h6>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="col-md-3">
                            <label class="form-label text-dark" style="padding-top: 15px;">PREFERRED OCCUPATION</labe1>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredOccu1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">1</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredOccu2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">2</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredOccu3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">3</span></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height:3rem;"><?php echo strtoupper($jobPreference['PreferredOccu4']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">4</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="col-md-3">
                            <label class="form-label text-dark" style="padding-top: 15px;">PREFERRED WORK LOCATION</labe1>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <label class="form-label text-dark" style="padding-top: 15px;">LOCAL,CITIES/MUNICIPALITIES</labe1>
                        </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredLocCity1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">1</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredLocCity2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">2</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredLocCity3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">3</span></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                            <label class="form-label text-dark" style="padding-top: 15px;">OVERSEAS, SPECIFY COUNTRIES</labe1>
                        </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredLocOverseas1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">1</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredLocOverseas2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">2</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PreferredLocOverseas3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">3</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 40px;"></div>
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['ExpectedSalaryRange']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">EXPECTED SALARY</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['PassportNo']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">PASSPORT NO.</span></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase" style="height: 3rem;"><?php echo strtoupper($jobPreference['ExpiryDate']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">EXPIRY DATE</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>III. LANGUAGE / DIALECT PROFICIENCY</b></h6>
                    </div>

                    <div style="margin: 24px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">ENGLISH</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['EnglishRead']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">READ</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['EnglishWrite']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">WRITE</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['EnglishSpeak']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">SPEAK</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['EnglishUnderstand']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">UNDERSTAND</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">FILIPINO</labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['FilipinoRead']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">READ</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['FilipinoWrite']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">WRITE</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['FilipinoSpeak']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">SPEAK</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['FilipinoUnderstand']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">UNDERSTAND</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;"><?php echo strtoupper($language['OthersLanguage']); ?></labe1>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['OthersRead']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">READ</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['OthersWrite']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">WRITE</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['OthersSpeak']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">SPEAK</span></label>
                                </div>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($language['OthersUnderstand']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">UNDERSTAND</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>IV. EDUCATIONAL BACKGROUND</b></h6>
                    </div>
                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">SCHOOL</labe1>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">COURSE</label>
                            </div>

                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">YEAR GRADUATED</labe1>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">WHAT LEVEL?</label>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">YEAR LAST ATTENDED</labe1>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">AWARDS RECEIVED</label>
                            </div>

                            

                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">ELEMENTARY</labe1>
                            </div>

                            <div class="col-md-12">
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['ElementarySchool']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['ElementaryYearGrad']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['ElementaryLevel']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['ElementaryLastAttend']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['ElementaryAwards']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">SECONDARY</labe1>
                            </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['SecondarySchool']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['SecondaryCourse']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['SecondaryYearGrad']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['SecondaryLevel']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['SecondaryLastAttend']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['SecondaryAwards']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">TERTIARY</labe1>
                            </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['TertiarySchool']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['TertiaryCourse']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['TertiaryYearGrad']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['TertiaryLevel']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['TertiaryLastAttend']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['TertiaryAwards']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">GRADUATE STUDIES</labe1>
                            </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['GradStudiesSchool']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['GradStudiesCourse']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['GradStudiesYearGrad']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($educBackground['GradStudiesAward']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>V. TECHNICAL/VOCATIONAL AND OTHER TRAINING</b></h6>
                    </div>
                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label text-dark" style="padding-top: 15px;">TRAINING/VOCATIONAL COURSE</labe1>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">DURATION</label>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">TRAINING INSTITUTION</labe1>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">CERTIFICATES RECEIVED</labe1>
                            </div>

                            <div class="col-md-12">
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingTitle1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">1</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingDuration1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingInstitution1']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingCertificate1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingTitle2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">2</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingDuration2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingInstitution2']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingCertificate2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingTitle3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">3</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingDuration3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingInstitution3']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($training['TrainingCertificate3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>VI. ELIGIBILITY/PROFESSIONAL LICENSE</b></h6>
                    </div>
                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">ELIGIBILITY(CIVIL SERVICE)</labe1>
                            </div>
                            
                            <div class="col-md-1">
                                <label class="form-label text-dark" style="padding-top: 15px;">RATING</label>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">DATE OF EXAMINATION</labe1>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">PROFESSIONAL LICENSE(PRC)</labe1>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">VALID UNTIL</labe1>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['EligibilityTitle1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">1</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['EligibilityRating1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['EligibilityDate1']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['LicenseTitle1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">1</span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['LicenseUntil1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div style="margin: 5px;"></div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['EligibilityTitle2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">2</span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-1">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['EligibilityRating2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['EligibilityDate2']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['LicenseTitle2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark">2</span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($eligibility['LicenseUntil2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                                        
                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>VII. WORK EXPERIENCE</b></h6>
                    </div>

                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">COMPANY NAME</labe1>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">ADDRESS</label>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label text-dark" style="padding-top: 15px;">POSITION</labe1>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">INCLUSIVE DATES</labe1>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-dark" style="padding-top: 15px;">STATUS</labe1>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyName1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyAddress1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyPosition1']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyDates1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyStatus1']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div style="margin: 5px;"></div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyName2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyAddress2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyPosition2']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyDates2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyStatus2']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div style="margin: 5px;"></div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyName3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyAddress3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyPosition3']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyDates3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyStatus3']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div style="margin: 5px;"></div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyName4']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyAddress4']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyPosition4']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyDates4']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyStatus4']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>

                            <div style="margin: 5px;"></div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyName5']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyAddress5']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyPosition5']); ?></span>
                                    <label for="surName" class="text-right custom-labelss"><span class="text-dark"></span></label>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyDates5']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                             
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex justify-content-center align-items-center" style="height: 3rem;"><?php echo strtoupper($workExperience['CompanyStatus5']); ?></span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                                             
                    <br>
                    <br>

                    <div class="col-12 mb-3">
                        <h6 class="mb-1"><b>VIII. OTHER SKILLS ACQUIRED WITHOUT FORMAL TRAINING</b></h6>
                    </div>
                    <div style="margin: 10px;"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <span class="form-control fw-bold text-uppercase d-flex " style="height: 24rem;">
                                    <?php  
                                        if(!empty($otherSkills['AutoMechanic'])){
                                            echo strtoupper($otherSkills['AutoMechanic']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Beautician'])){
                                            echo strtoupper($otherSkills['Beautician']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['CarpentryWork'])){
                                            echo strtoupper($otherSkills['CarpentryWork']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['ComputerLiterate'])){
                                            echo strtoupper($otherSkills['ComputerLiterate']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['DomesticChores'])){
                                            echo strtoupper($otherSkills['DomesticChores']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Driver'])){
                                            echo strtoupper($otherSkills['Driver']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Electrician'])){
                                            echo strtoupper($otherSkills['Electrician']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Embroidery'])){
                                            echo strtoupper($otherSkills['Embroidery']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Gardening'])){
                                            echo strtoupper($otherSkills['Gardening']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Masonry'])){
                                            echo strtoupper($otherSkills['Masonry']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['PainterArtist'])){
                                            echo strtoupper($otherSkills['PainterArtist']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['PaintingJobs'])){
                                            echo strtoupper($otherSkills['PaintingJobs']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Photography'])){
                                            echo strtoupper($otherSkills['Photography']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Plumbing'])){
                                            echo strtoupper($otherSkills['Plumbing']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['SewingDresses'])){
                                            echo strtoupper($otherSkills['SewingDresses']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Stenography'])){
                                            echo strtoupper($otherSkills['Stenography']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Tailoring'])){
                                            echo strtoupper($otherSkills['Tailoring']);
                                            echo "<br>";
                                        }
                                        if(!empty($otherSkills['Others'])){
                                            echo strtoupper($otherSkills['Others']);
                                            echo "<br>";
                                        }
                                    ?>
                                    </span>
                                    <label for="surName" class="text-right"><span class="text-dark"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <br>
            <!-- Footer -->
            <?= $this->include('admin/inc/footer')?>
            <!-- End Footer -->
        </div>
        <!-- End Main Content -->
    </div>
</div>
<?= $this->include('admin/inc/end')?>
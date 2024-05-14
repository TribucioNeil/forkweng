<!-- FIX THIS AND MAKE A POP UP MESSAGE THAT IT NEEDS TO APPROVED AGAIN ONCE THE CREDENTIALS WAS UPDATE

onchange="displayFileNameRen(this)"
onchange="displayFileNameOrd(this)"
onchange="displayFileNameBir(this)"
onchange="displayFileNameSec(this)"
onchange="displayFileNameInt(this)"
onchange="displayFileNameAcc(this)"
onchange="displayFileNamePoe(this)" -->

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
                                    <h4>Company Profile Registration</h4>
                                    <hr>
                                    <div class="myrow ml-4">
                                        <form action="<?= site_url('companyProfileProcess') ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="employerName">Employer Name</label>
                                                        <input class="form-control" id="employerName" name="employerName" value="<?= $empdata['employerName'] ?>">
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="industry">Industry</label>
                                                        <select class="form-control" name="industry" id="industry">
                                                            <option value="">Select Industry</option>
                                                            <option value="FINANCIAL INTERMIDIATION" <?php if ($empdata['industry'] == 'FINANCIAL INTERMIDIATION') echo 'selected'; ?>>FINANCIAL INTERMIDIATION</option>
                                                            <option value="EXTRA-TERRITORIAL ORGANIZATIONS AND BODIES" <?php if ($empdata['industry'] == 'EXTRA-TERRITORIAL ORGANIZATIONS AND BODIES') echo 'selected'; ?>>EXTRA-TERRITORIAL ORGANIZATIONS AND BODIES</option>
                                                            <option value="ELECTRICITY, GAS AND WATER SUPPLY" <?php if ($empdata['industry'] == 'ELECTRICITY, GAS AND WATER SUPPLY') echo 'selected'; ?>>ELECTRICITY, GAS AND WATER SUPPLY</option>
                                                            <option value="EDUCATION" <?php if ($empdata['industry'] == 'EDUCATION') echo 'selected'; ?>>EDUCATION</option>
                                                            <option value="CONSTRUCTION" <?php if ($empdata['industry'] == 'CONSTRUCTION') echo 'selected'; ?>>CONSTRUCTION</option>
                                                            <option value="AGRICULTURE" <?php if ($empdata['industry'] == 'AGRICULTURE') echo 'selected'; ?>>AGRICULTURE</option>
                                                            <option value="ACTIVITIES OF PRIVATE HOUSEHOLDS AS EMPLOYERS AND UNDIFFENTIATED PRODUCTION ACTIVITIES OF PRIVATE" <?php if ($empdata['industry'] == 'ACTIVITIES OF PRIVATE HOUSEHOLDS AS EMPLOYERS AND UNDIFFENTIATED PRODUCTION ACTIVITIES OF PRIVATE') echo 'selected'; ?>>ACTIVITIES OF PRIVATE HOUSEHOLDS AS EMPLOYERS AND UNDIFFENTIATED PRODUCTION ACTIVITIES OF PRIVATE</option>
                                                            <option value="WHOLESALE AND RETAIL TRADE" <?php if ($empdata['industry'] == 'WHOLESALE AND RETAIL TRADE') echo 'selected'; ?>>WHOLESALE AND RETAIL TRADE</option>
                                                            <option value="TRANSPORT, STORAGE AND COMMUNICATION" <?php if ($empdata['industry'] == 'TRANSPORT, STORAGE AND COMMUNICATION') echo 'selected'; ?>>TRANSPORT, STORAGE AND COMMUNICATION</option>
                                                            <option value="REAL ESTATE, RENTING AND BUSINESS ACTIVITIES" <?php if ($empdata['industry'] == 'REAL ESTATE, RENTING AND BUSINESS ACTIVITIES') echo 'selected'; ?>>REAL ESTATE, RENTING AND BUSINESS ACTIVITIES</option>
                                                            <option value="PUBLIC ADMINISTRATION AND DEFENSE" <?php if ($empdata['industry'] == 'PUBLIC ADMINISTRATION AND DEFENSE') echo 'selected'; ?>>PUBLIC ADMINISTRATION AND DEFENSE</option>
                                                            <option value="OTHER COMMUNITY, SOCIAL AND PERSONAL SERVICE ACTIVITIES" <?php if ($empdata['industry'] == 'OTHER COMMUNITY, SOCIAL AND PERSONAL SERVICE ACTIVITIES') echo 'selected'; ?>>OTHER COMMUNITY, SOCIAL AND PERSONAL SERVICE ACTIVITIES</option>
                                                            <option value="MINING AND QUARRYING" <?php if ($empdata['industry'] == 'MINING AND QUARRYING') echo 'selected'; ?>>MINING AND QUARRYING</option>
                                                            <option value="MANUFACTURING" <?php if ($empdata['industry'] == 'MANUFACTURING') echo 'selected'; ?>>MANUFACTURING</option>
                                                            <option value="HOTELS AND RESTAURANTS" <?php if ($empdata['industry'] == 'HOTELS AND RESTAURANTS') echo 'selected'; ?>>HOTELS AND RESTAURANTS</option>
                                                            <option value="HEALTH AND SOCIAL WORK" <?php if ($empdata['industry'] == 'HEALTH AND SOCIAL WORK') echo 'selected'; ?>>HEALTH AND SOCIAL WORK</option>
                                                            <option value="FISHING" <?php if ($empdata['industry'] == 'FISHING') echo 'selected'; ?>>FISHING</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyName">Company Name</label>
                                                        <input class="form-control" id="companyName" name="companyName" value="<?= $empdata['companyName'] ?>" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="workForce">Total Workforce</label>
                                                        <select class="form-control" name="workForce" id="workForce">
                                                            <option value="">Select Total Workforce</option>
                                                            <option value="1-9(MICRO)" <?php if ($empdata['workForce'] == '1-9(MICRO)') echo 'selected'; ?>>1-9(MICRO)</option>
                                                            <option value="10-99(SMALL)" <?php if ($empdata['workForce'] == '10-99(SMALL)') echo 'selected'; ?>>10-99(SMALL)</option>
                                                            <option value="100-199(MEDIUM)" <?php if ($empdata['workForce'] == '100-199(MEDIUM)') echo 'selected'; ?>>100-199(MEDIUM)</option>
                                                            <option value="200 AND OVER(LARGE)" <?php if ($empdata['workForce'] == '200 AND OVER(LARGE)') echo 'selected'; ?>>200 AND OVER(LARGE)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="address">Address</label>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="address">Street</label>
                                                        <input class="form-control" id="address" name="address" value="<?= $empdata['address'] ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="barangay">Barangay</label>
                                                        <select class="form-control" id="barangay" name="barangay">
                                                            <?php
                                                            $barangays = [
                                                                "Balingayan", "Balite", "Baruyan", "Batino", "Bayanan 1", "Bayanan 2", "Bulusan", "Comunal", "Guinobatan", "Gutad",
                                                                "Ibaba East", "Ibaba West", "Ilaya", "Lalud", "Lazareto", "Libis", "Lumangbayan", "Maidlang", "Malamig", "Managpi",
                                                                "Nag-Iba 1", "Nag-Iba 2", "Navotas", "Pachoca", "Palhi", "Panggalaan", "Parang", "Patas", "Puting Tubig", "San Antonio",
                                                                "San Vicente Central", "San Vicente East", "San Vicente North", "San Vicente South", "San Vicente West", "Sta. Cruz",
                                                                "Sta. Isabel", "Sto. Niño (formerly Nacoco)", "Sapul", "Silonay", "Sta. Maria Village", "Suqui", "Tawagan", "Tawiran",
                                                                "Tibag", "Wawa"
                                                            ];

                                                            foreach ($barangays as $barangay) {
                                                                echo "<option value=\"$barangay\"";
                                                                if ($empdata['barangay'] === $barangay) {
                                                                    echo " selected";
                                                                }
                                                                echo ">$barangay</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="address">City/ Municipality</label>
                                                        <input class="form-control" id="city" name="city" value="<?= $empdata['city'] ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="address">Province</label>
                                                        <input class="form-control" id="province" name="province" value="<?= $empdata['province'] ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                            <style>
                                            .file-upload-container {
                                                position: relative; /* Removed unnecessary nesting */
                                            }

                                            .check-mark {
                                                margin-top: 20px;
                                                right: 10px;
                                                transform: translateY(-50%);
                                                color: green;
                                                display: none; /* Initially hide the checkmark */
                                            }

                                            /* Added styling for the actual file input element */
                                            .form-control-file {
                                                opacity: 0; /* Hide the default file input */
                                                position: absolute;
                                                top: 0;
                                                right: 0;
                                                width: 100%;
                                                height: 100%;
                                            }
                                            </style>
                                            <label for="renewalLicense">Upload Documents:</label>

                                                <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    <label for="renewalLicense">1. Certificate of Renewal of License (Latest Business Permit)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                    <label id="renewalLicense" class="btn btn-primary file-upload-container">
                                                        Choose Image or PDF File
                                                        <input 
                                                        value="<?= $empdata['renewalLicense'] ?>" 
                                                        type="file" 
                                                        class="form-control-file" 
                                                        id="renewalLicense" 
                                                        name="renewalLicense" 
                                                        accept="image/*, application/pdf" 
                                                        required
                                                        onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span>
                                                    </label>
                                                    </div>
                                                </div>
                                                </div>

                                                <script>
                                                function checkFileUpload(fileInput) {
                                                // Check if a file is selected
                                                if (fileInput.files.length > 0) {
                                                    // Show the checkmark icon
                                                    fileInput.nextElementSibling.style.display = 'block';
                                                } else {
                                                    // Hide the checkmark icon
                                                    fileInput.nextElementSibling.style.display = 'none';
                                                } 
                                                }
                                                </script>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="jobOrder">2.Latest Job Order/ Job Vacancies</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label id="jobOrder" class="btn btn-primary">
                                                            Choose Image or PDF File
                                                            <input value="<?= $empdata['jobOrder'] ?>" type="file" class="form-control-file d-none" id="jobOrder" name="jobOrder" accept="image/*, application/pdf" required
                                                            onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="certificationRegistration">3. Certification of Registration(BIR)</label>
                                                    </div>
                                                </div> 
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label id="certificationRegistration" class="btn btn-primary">
                                                            Choose Image or PDF File
                                                            <input value="<?= $empdata['certificationRegistration'] ?>" type="file" class="form-control-file d-none" id="certificationRegistration" name="certificationRegistration" accept="image/*, application/pdf" required  onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exchangeCommission">4. Security Exchange Commission (SEC) Registration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label id="exchangeCommission" class="btn btn-primary">
                                                            Choose Image or PDF File
                                                            <input value="<?= $empdata['exchangeCommission'] ?>" type="file" class="form-control-file d-none" id="exchangeCommission" name="exchangeCommission" accept="image/*, application/pdf" required  onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="letterIntent">5. Letter of Intent (Include the requested date of recruitment/ interview)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label id="letterIntent" class="btn btn-primary">
                                                            Choose Image or PDF File
                                                            <input value="<?= $empdata['letterIntent'] ?>" type="file" class="form-control-file d-none" id="letterIntent" name="letterIntent" accept="image/*, application/pdf" required 
                                                            onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="accreditation">6. Certification of Accreditation of PHILJOBNET</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label id="accreditation" class="btn btn-primary">
                                                            Choose Image or PDF File
                                                            <input value="<?= $empdata['accreditation'] ?>" type="file" class="form-control-file d-none" id="accreditation" name="accreditation" accept="image/*, application/pdf" required  onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="poea">7. POEA Registration (IF OVERSEAS)-For SRA</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label id="poea" class="btn btn-primary">
                                                            Choose Image or PDF File
                                                            <input value="<?= $empdata['poea'] ?>" type="file" class="form-control-file d-none" id="poea" name="poea" accept="image/*, application/pdf"  onchange="checkFileUpload(this)" /* Added onchange event handler */
                                                        >
                                                        <span class="check-mark">&#10004;</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="float-left">
                                                <?php if ($empdata['profileStatus'] == 'Blocked'): ?>
                                                        <button type="submit" style="border-radius: 5px;" class="btn-success" disabled>Save Changes</button>
                                                    <?php else: ?>
                                                        <button type="submit" style="border-radius: 5px;" class="btn-success">Save Changes</button>
                                                <?php endif; ?>

                                            </div>
                                        </form>
                                        <button style="border-radius: 5px;" class="btn-primary ml-2" onclick="goBack()">Back</button>
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
<script>
  function goBack() {
    window.history.back();
  }
</script>
<script>
    function displayFileNameRen(input){
        const fileNameRen = input.files[0].name;
        const fileLabelRen = document.getElementById('renewalLicense');
        fileLabelRen.textContent = fileNameRen;
    }
</script>
<script>
    function displayFileNameOrd(input){
        const fileNameOrd = input.files[0].name;
        const fileLabelOrd = document.getElementById('jobOrder');
        fileLabelOrd.textContent = fileNameOrd;
    }
</script>
<script>
    function displayFileNameBir(input){
        const fileNameBir = input.files[0].name;
        const fileLabelBir = document.getElementById('certificationRegistration');
        fileLabelBir.textContent = fileNameBir;
    }
</script>
<script>
    function displayFileNameSec(input){
        const fileNameSec = input.files[0].name;
        const fileLabelSec = document.getElementById('exchangeCommission');
        fileLabelSec.textContent = fileNameSec;
    }
</script>
<script>
    function displayFileNameInt(input){
        const fileNameInt = input.files[0].name;
        const fileLabelInt = document.getElementById('letterIntent');
        fileLabelInt.textContent = fileNameInt;
    }
</script>
<script>
    function displayFileNameAcc(input){
        const fileNameAcc = input.files[0].name;
        const fileLabelAcc = document.getElementById('accreditation');
        fileLabelAcc.textContent = fileNameAcc;
    }
</script>
<script>
    function displayFileNamePoe(input){
        const fileNamePoe = input.files[0].name;
        const fileLabelPoe = document.getElementById('poea');
        fileLabelPoe.textContent = fileNamePoe;
    }
</script>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        alert('Your credentials have been updated. You may need to be approved again.');
    });
</script>
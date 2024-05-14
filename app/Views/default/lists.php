<?= $this->include('default/inc/top')?>

<body>
    <?= $this->include('default/inc/header')?>


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
    <section class="section">


        <div class="container mb-3" style="padding-top: 20px;">
            <div class="row g-4">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row g-4">
                        <div class="col-12 text-center">
                        <form id="search-form">
                            <input class="col-8 text-center" type="text" id="search-input" name="searchInput" style="height: 50px; border-radius: 5px; padding-left: 10px;" placeholder="Job Title, Location, Industry">
                            <button type="submit" class="btn btn-social-icon-text btn-twitter bg-primary" style="border-radius: 2px;" id="search-button"><b><i class="fas fa-search"></i>Find Jobs</b></button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row g-4 jobResults">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row g-4">
                        <?php foreach ($jobss as $job): ?>
                            
                        <div class="col-12 myjobs">
                            <div style="border: 1px solid; border-color: gray;"
                                class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-left justify-content-between position-relative">
                                <div class="ms-3">
                                    <p class="description" style="text-align: justify; font-size: 25px; padding: 0px;"><?php echo $job['jobTitle']; ?></p>
                                    <form action="<?= site_url('barangaymap') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $job['id'] ?>">
                                        <button type="submit" style="border: none; background: none; padding: 0; font: inherit; cursor: pointer;">
                                            <i class="fas fa-map-marker-alt"></i> <?= $job['barangay'] . ', '. $job['city'] . ' ' .$job['province'] ?>
                                        </button>
                                    </form>
                                    <br>
                                    <p style="font-size: 15px;" class="badge bg-soft-primary rounded-pill salary">
                                        <?php 
                                        $formatted_salary = number_format($job['salary'], 2); // Set the second parameter to 0
                                        echo "₱ $formatted_salary";
                                    ?>
                                    </p>
                                    <span style="font-size: 15px;"
                                        class="badge bg-soft-primary rounded-pill option"><?php echo $job['jobOption']; ?></span>
                                    <br>
                                    <p class="mb-0">Job Description</p>
                                    <p class="description" style="text-align: justify;"><?php echo $job['jobDescription']; ?></p>
                                    <?php
                                        if (!empty($personalInfo['SurName'])) {
                                            echo'
                                                <button type="button" class="btn btn-social-icon-text btn-twitter bg-success" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#exampleModal_'. $job['id'] .'">
                                                    <i class="ti-plus"></i><b>Apply now</b>
                                                </button>
                                            ';
                                        } else {
                                            echo '<form action="' . site_url('showErrors') . '" method="post">
                                                <button type="submit" class="btn btn-social-icon-text btn-twitter bg-success" style="border-radius: 2px;">
                                                    <i class="ti-plus"></i><b>Apply now</b>
                                                </button>
                                            </form>';
                                        }
                                    ?>
                                </div>
                                <div class="mt-3 mt-md-0">
                                    <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark" title="Save Job"><i
                                            data-feather="bookmark" class="icons"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal_<?php echo $job['id']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel_<?php echo $job['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel_<?php echo $job['id']; ?>">Apply
                                            Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('applyNowProcess') ?>" method="post"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="jobpostId" value="<?php echo $job['id']; ?>">
                                            <?php if ($job['vaccination'] == "yes"): ?>
                                            <label for="vaccination">Vaccination</label>
                                            <input type="file" class="form-control-file" id="vaccination"
                                                name="vaccination" accept="image/*">
                                            <?php endif; ?>
                                            <?php if ($job['sss'] == "yes"): ?>
                                            <label for="sss">SSS</label>
                                            <input type="file" class="form-control-file" id="sss" name="sss"
                                                accept="image/*">
                                            <?php endif; ?>
                                            <?php if ($job['pagibig'] == "yes"): ?>
                                            <label for="pagibig">Pagibig</label>
                                            <input type="file" class="form-control-file" id="pagibig" name="pagibig"
                                                accept="image/*">
                                            <?php endif; ?>
                                            <?php if ($job['philhealth'] == "yes"): ?>
                                            <label for="philhealth">Philhealth</label>
                                            <input type="file" class="form-control-file" id="philhealth"
                                                name="philhealth" accept="image/*">
                                            <?php endif; ?>
                                            <?php if ($job['tin'] == "yes"): ?>
                                            <label for="tin">Tin</label>
                                            <input type="file" class="form-control-file" id="tin" name="tin"
                                                accept="image/*">
                                            <?php endif; ?>

                                            <?php if (!empty($job['otherrequirements'])): ?>
                                            <?php
                                                        $otherRequirementsArray = explode(',', $job['otherrequirements']);
                                                    
                                                        foreach($otherRequirementsArray as $requirement): ?>
                                            <label for=""><?php echo $requirement; ?></label>
                                            <input type="file" class="form-control-file"
                                                id="<?php echo $requirement; ?>" name="otherRequirements[]"
                                                accept="image/*" multiple>
                                            <?php endforeach; ?>
                                            <?php endif; ?>

                                            <button type="submit" class="btn btn-primary float-right">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
            <br>
                        <?php endforeach; ?>
                        <div class="text-center" id="no-results-message" style="display: none;">No Results Found</div>
            </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <?= $this->include('default/inc/footer')?>
    <?= $this->include('default/inc/end')?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(event) {
            // Find the nearest ancestor element with the class '.job-post-container'
            var jobPostContainer = event.target.closest('.job-post-container');

            // Check if the clicked element or any of its ancestors have the class '.job-post-container'
            if (jobPostContainer) {
                // Retrieve the value of the 'data-job-id' attribute
                var jobId = jobPostContainer.dataset.jobId;

                // Create a form element
                var form = document.createElement('form');
                form.setAttribute('action', '<?= site_url('jobinfo') ?>');
                form.setAttribute('method', 'post');

                // Create an input element for the job ID
                var input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', 'id');
                input.setAttribute('value', jobId);

                // Append the input element to the form
                form.appendChild(input);

                // Append the form to the document body
                document.body.appendChild(form);

                // Submit the form
                form.submit();
            }
        });
    });
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchButton = document.getElementById("search-button");
        const searchInput = document.getElementById("search-input");
        const searchForm = document.getElementById("search-form");
        const sections = document.querySelectorAll(".jobResults");
        const noResultsMessage = document.getElementById("no-results-message");

        searchForm.addEventListener("submit", function(event) {
            event.preventDefault();
            performSearch();
        });

        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            let hasResults = false; // To track if any results were found

            if (searchTerm === "") {
                sections.forEach((section) => {
                    section.style.display = "block";
                });
                hasResults = true; // Empty search is considered as having results
            } else {
                sections.forEach((section) => {
                    let hasMatchInSection = false;
                    const accordionItems = section.querySelectorAll(".myjobs");
                    accordionItems.forEach((item) => {
                        const question = item.querySelector(".title").textContent
                            .toLowerCase();
                        const location = item.querySelector(".location")
                            .textContent.toLowerCase();
                        const salary = item.querySelector(".salary")
                            .textContent.toLowerCase();
                        const description = item.querySelector(".description")
                            .textContent.toLowerCase();
                        const option = item.querySelector(".option")
                            .textContent.toLowerCase();
                        const isMatch = question === searchTerm || location === searchTerm || salary === searchTerm || description === searchTerm || option === searchTerm;
                        item.style.display = isMatch ? "block" : "none";
                        if (isMatch) {
                            hasMatchInSection = true;
                            hasResults = true;
                        }
                    });

                    section.style.display = hasMatchInSection ? "block" : "none";
                });
            }
// Show "No Results Found" message if no matches were found
const noResultsMessage = document.getElementById("no-results-message");
if (noResultsMessage) {
    noResultsMessage.style.display = hasResults ? "none" : "block";
}

        }
    });
</script>

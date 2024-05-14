<?= $this->include('employer/inc/top')?>
<div class="container-scroller">
    <?= $this->include('employer/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= $this->include('employer/inc/sidebar')?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-success" style="border-radius: 0px;">
                            <p class="text-success">h</p>
                        </div>

                        <div class="card-body">
                            <?php
                            if (isset($empdata['profileStatus']) && $empdata['profileStatus'] == 'Approved') {
                                echo '<h4 class="card-title">JOB LISTS <p style="float: right;">
                                <button type="button"
                                    class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                    style="border-radius: 2px;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="ti-plus"></i><b>Add</b> </button>
                                    </p>
                                </h4>';
                            }elseif (isset($empdata['profileStatus']) && $empdata['profileStatus'] == 'Declined') {
                                echo '<form action="' . site_url('showErrorBlock') . '" method="post">
                                    <h4 class="card-title">JOB LISTS 
                                        <p style="float: right;">
                                            <button type="submit" class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                                style="border-radius: 2px;">
                                                <i class="ti-plus"></i><b>Add</b>
                                            </button>
                                        </p>
                                    </h4>
                                </form>';
                            }elseif (isset($empdata['profileStatus']) && $empdata['profileStatus'] == 'Blocked') {
                                echo '<form action="' . site_url('showErrorBlocks') . '" method="post">
                                    <h4 class="card-title">JOB LISTS 
                                        <p style="float: right;">
                                            <button type="submit" class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                                style="border-radius: 2px;">
                                                <i class="ti-plus"></i><b>Add</b>
                                            </button>
                                        </p>
                                    </h4>
                                </form>';
                            }else {
                                echo '<form action="' . site_url('showError') . '" method="post">
                                    <h4 class="card-title">JOB LISTS 
                                        <p style="float: right;">
                                            <button type="submit" class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                                style="border-radius: 2px;">
                                                <i class="ti-plus"></i><b>Add</b>
                                            </button>
                                        </p>
                                    </h4>
                                </form>';
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Job Title
                                            </th>
                                            <th>
                                                Location
                                            </th>
                                            <th>
                                                Salary
                                            </th>
                                            <th class="text-center">
                                                Date Posted
                                            </th>
                                            <th class="text-center">
                                                Applicants
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (empty($jobPosts)): ?>
                                        <tr class="text-center">
                                            <td colspan="6">No Data Found.</td>
                                        </tr>
                                        <?php else: ?>
                                        <?php foreach ($jobPosts as $post): ?>
                                        <tr>
                                            <td><?php echo $post['jobTitle']; ?></td>
                                            <td><?php echo $post['barangay'] . ', '. $post['city'] . ' ' . $post['province']?></td>

                                            <td>
                                                <?php 
                                                    $formatted_salary = number_format($post['salary'], 2); // Set the second parameter to 0
                                                    echo "₱ $formatted_salary";
                                                ?>
                                            </td>
                                            <td class="text-center"><?php
                                                $postedDate = $post['postedDate'];
                                                $date = new DateTime($postedDate);
                                                $formattedDate = $date->format('F j, Y | h:i A');
                                                echo $formattedDate;
                                                ?>
                                            </td>
                                            <td class="text-center">
                                            <form action="<?= site_url('viewemployerapplicants')?>" method="post">
                                                        <input type="hidden" name="jobApplyId" value="<?= $post['id']?>">
                                                        <button type="submit" style="border-radius: 5px; padding: 5px;" class="btn-success">View</button>
                                                    </form>    
                                                

                                            <td class="text-center">
                                                <button style="border-radius: 5px; padding: 3px;"
                                                    class="updateBtn btn-success"
                                                    data-id="<?php echo $post['id']; ?>" title="Update"><i class="fas fa-edit"></i></button>
                                                        <a href="<?= site_url('deleteJobPost/') . $post['id'] ?>">
                                                        <button style="border-radius: 5px; padding: 3px;"
                                                        class="btn-danger"
                                                        title="Delete"><i class="fas fa-trash"></i></button>
                                                    </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Post a Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= site_url('jobPostProcess') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <!-- Job Title -->
                                    <p><textarea style="width: 100%" type="text" placeholder="Job Title" name="jobTitle" required></textarea></p>

                                    <!-- <p><textarea style="width: 100%" type="text" placeholder="Work Location" name="workLocation" required></textarea></p> -->

                                    <select class="form-control" id="barangaySelect" name="barangay">
                                        <?php
                                        $barangays = [
                                            "Balingayan", "Balite", "Baruyan", "Batino", "Bayanan 1", "Bayanan 2", "Bulusan", "Comunal", "Guinobatan", "Gutad",
                                            "Ibaba East", "Ibaba West", "Ilaya", "Lalud", "Lazareto", "Libis", "Lumangbayan", "Maidlang", "Malamig", "Managpi",
                                            "Nag-Iba 1", "Nag-Iba 2", "Navotas", "Pachoca", "Palhi", "Panggalaan", "Parang", "Patas", "Puting Tubig", "San Antonio",
                                            "San Vicente Central", "San Vicente East", "San Vicente North", "San Vicente South", "San Vicente West", "Sta. Cruz",
                                            "Sta. Isabel", "Sto. Niño (formerly Nacoco)", "Sapul", "Silonay", "Sta. Maria Village", "Suqui", "Tawagan", "Tawiran",
                                            "Tibag", "Wawa"
                                        ];

                                        // Loop through the barangays array and create an option for each barangay
                                        foreach ($barangays as $barangay) {
                                            echo "<option value=\"$barangay\">$barangay</option>";
                                        }
                                        ?>
                                    </select>

                                    <p><textarea style="width: 100%" type="text" placeholder="City/Municipality" name="city" required></textarea></p>
                                    <p><textarea style="width: 100%" type="text" placeholder="Province" name="province" required></textarea></p>
                                    
                                    <!-- Education Background -->
                                    <p><textarea style="width: 100%" type="text" placeholder="Education Background" name="educBackground" required></textarea></p>

                                    <!-- Job Option -->
                                    <p><textarea style="width: 100%" type="text" placeholder="Job Option" name="jobOption" required></textarea></p>

                                    <!-- Salary -->
                                    <p><input class="input-wrapper" style="width: 100%" type="number" step="any" placeholder="Salary" name="salary"></p>

                                    <!-- Job Description -->
                                    <p><textarea style="width: 100%" type="text" placeholder="Job Description" name="jobDescription" required></textarea></p>

                                    <!-- Job Qualification -->
                                    <p><textarea style="width: 100%" type="text" placeholder="Job Qualification" name="jobQualification" required></textarea></p>

                                    <!-- Remarks -->
                                    <p><textarea style="width: 100%" type="text" placeholder="Remarks" name="remarks" required></textarea></p>

                                    <!-- Vaccination Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="vaccinationCheckbox" name="vaccination" value="yes">
                                        <label class="form-check-label" for="vaccinationCheckbox"> Vaccination
                                        </label>
                                    </div>

                                    <!-- SSS Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sssCheckbox" name="sss" value="yes">
                                        <label class="form-check-label" for="sssCheckbox"> SSS
                                        </label>
                                    </div>

                                    <!-- Pag-IBIG Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pagibigCheckbox" name="pagibig" value="yes">
                                        <label class="form-check-label" for="pagibigCheckbox"> Pag-IBIG
                                        </label>
                                    </div>

                                    <!-- PhilHealth Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="philhealthCheckbox" name="philhealth" value="yes">
                                        <label class="form-check-label" for="philhealthCheckbox"> PhilHealth
                                        </label>
                                    </div>

                                    <!-- TIN Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="tinCheckbox" name="tin" value="yes">
                                        <label class="form-check-label" for="tinCheckbox"> TIN
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="otherCheckbox" name="otherrequirement" value="yes" onchange="toggleInput()">
                                        <label class="form-check-label" for="otherCheckbox"> Others </label>
                                    </div>
                                    <div id="otherInput" style="display: none;">
                                        <input type="text" class="form-control" id="otherNumber" name="otherrequirements" placeholder="Enter other Requirements">
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary float-right">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="width: 90%;">
                        <div class="modal-content" style="width: 90%;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Job Post</h5>
                                <button type="button" class="btn-close bg-danger text-white" style="border-radius: 5px;" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body col-12">
                                <form action="<?= site_url('updateJobPost') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="postId" id="postId">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label class="form-label fw-semibold" for="jobTitle">Job Title</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Job Title" name="jobTitle" id="jobTitle"></p>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="form-label fw-semibold" for="workLocation">Work
                                                Location</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Work Location" name="workLocation" id="workLocation"></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label class="form-label fw-semibold" for="educBackground">Education Background</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Education Background" name="educBackground" id="educBackground"></p>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="form-label fw-semibold" for="jobOption">Job Option</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Job Option" name="jobOption" id="jobOption"></p>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="form-label fw-semibold" for="salary">Salary</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Salary" name="salary" id="salary"></p>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="form-label fw-semibold" for="jobDescription">Job
                                                Description</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Job Description" name="jobDescription" id="jobDescription"></p>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="form-label fw-semibold" for="jobQualification">Job
                                                Qualification</label>
                                            <p><input class="input-wrapper" style="width: 100%" type="text" placeholder="Job Qualification" name="jobQualification" id="jobQualification"></p>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="form-label fw-semibold" for="remarks">Remarks</label>
                                            <p><input class="input-wrapper" style="width: 100%;" type="text" placeholder="Remarks" name="remarks" id="remarks"></p>
                                        </div>
                                    </div>
                                    <button type="submit" style="border-radius: 5px; padding: 5px;" class="btn btn-primary float-left">Save Changes</button>
                            </div>
                        </div>
                        </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.updateBtn').click(function() {
        var postId = $(this).data('id');
        // Perform an AJAX request to fetch job post data by ID
        $.ajax({
            url: '/getJobPost/' + postId, // Define a route to fetch job post data by ID
            type: 'GET',
            success: function(response) {
                $('#jobTitle').val(response.jobTitle);
                $('#workLocation').val(response.workLocation);
                $('#educBackground').val(response.educBackground);
                $('#jobOption').val(response.jobOption);
                $('#salary').val(response.salary);
                $('#jobDescription').val(response.jobDescription);
                $('#jobQualification').val(response.jobQualification);
                $('#remarks').val(response.remarks);
                // Populate other fields here
                $('#postId').val(postId); // Set the job post ID in the hidden input field
                $('#updateModal').modal('show'); // Show the modal
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

<script>
  // Using plain JavaScript
  document.getElementById('my-link').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
    //   icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = event.target.href;
      } else {
        // User clicked the cancel button
        // Do nothing
      }
    })
  });
</script>

<script>
    function toggleInput() {
        var otherInput = document.getElementById("otherInput");
        var otherCheckbox = document.getElementById("otherCheckbox");

        if (otherCheckbox.checked) {
            otherInput.style.display = "block";
        } else {
            otherInput.style.display = "none";
        }
    }
</script>

<script>
    document.getElementById('barangaySelect').addEventListener('change', function() {
        var selectedOption = this.value;
        document.querySelector('textarea[name="barangay"]').value = selectedOption;
    });
</script>

<?= $this->include('admin/inc/end')?>
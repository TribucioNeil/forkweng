<?= $this->include('admin/inc/top')?>
<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">
        <!-- Sidebar -->
        <div class="sidebar-wrapper">
            <?= $this->include('admin/inc/sidebar')?>
        </div>

        <!-- Main Content -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card"  style="border-radius: 4px;">
                    <div class="card bg-success" style="border-radius: 0px;">
                            <p class="text-success">h</p>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Job Seekers</h4>  
                            <div class="card">
                                <div class="card-body">
                                <label for="searchInput">
                                <form action="<?= site_url('searchJobseekers') ?>" method="post">
                                    <input type="text" name="civilStatus" placeholder="civil status">

                                    <label for="tertiaryCourse">Tertiary Course:</label>
                                        <select name="tertiaryCourse" id="tertiaryCourse">
                                            <option value="">Select Tertiary Course</option>
                                            <option value="BSIT">BSIT</option>
                                            <option value="BSBA">BSBA</option>
                                            <option value="BSED">BSED</option>
                                        </select>
                                    <button type="submit">Search</button>
                                </form>
                               
                            </label>

                                </div>   
                            </div>
                            <br>                             

                            
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Age
                                            </th>
                                            <th>
                                                Sex
                                            </th>
                                            <th>
                                                Civil status
                                            </th>
                                            <th>
                                                Address
                                            </th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($jobseekerData as $jobseekerDatas): ?>
                                        <?php if (!empty($jobseekerDatas['FirstName']) && !empty($jobseekerDatas['PreferredOccu1']) && !empty($jobseekerDatas['ElementarySchool']) && !empty($jobseekerDatas['EligibilityTitle1']) && !empty($jobseekerDatas['EnglishRead']) && !empty($jobseekerDatas['OthersSkill']) && !empty($jobseekerDatas['TrainingTitle1']) && !empty($jobseekerDatas['CompanyName1'])): ?>
                                            <tr>
                                                <td><?= strtoupper($jobseekerDatas['FirstName']) . ' ' . strtoupper($jobseekerDatas['SurName']) ?></td>
                                                <td>
                                                    <?php
                                                    $birthdayDate = new DateTime($jobseekerDatas['DateOfBirth']);
                                                    $currentDate = new DateTime();
                                                    $interval = $currentDate->diff($birthdayDate);
                                                    $age = $interval->y;
                                                    echo ($jobseekerDatas['DateOfBirth'] == "0000-00-00") ? '' : $age;
                                                    ?>
                                                </td>
                                                <td><?= strtoupper($jobseekerDatas['Sex']) ?></td>
                                                <td><?= strtoupper($jobseekerDatas['CivilStatus']) ?></td>
                                                <td><?= strtoupper($jobseekerDatas['PreferredOccu1']) . ', ' . strtoupper($jobseekerDatas['Province']) ?></td>
                                                <td class="text-center">
                                                    <form action="<?= site_url('viewdetailsjobseekers')?>" method="post">
                                                        <input type="hidden" name="jobseekerId" value="<?= $jobseekerDatas['jobseekerId']?>">
                                                        <button type="submit" style="border-radius: 5px; padding: 5px;"
                                                class="btn-success">View</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?= $this->include('admin/inc/footer')?>
            <!-- End Footer -->
        </div>
        <!-- End Main Content -->
    </div>
</div>
<?= $this->include('admin/inc/end')?>

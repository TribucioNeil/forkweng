<?= $this->include('jobseeker/inc/top')?>
<div class="container-scroller">
    <?= $this->include('jobseeker/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">
        <?= $this->include('jobseeker/inc/sidebar')?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card-body">
                            <h4 class="card-title">APPLIED JOBS
                            </h4>
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Job Position
                                            </th>
                                            <th>
                                                Type of Employment
                                            </th>
                                            <th>
                                                Location
                                            </th>
                                            <th>
                                                Salary
                                            </th>
                                            <th class="text-center">
                                                Date Applied
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                            <th class="text-center">
                                               
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($appliedJob as $appli): ?>
                                        <tr>
                                            <td><?php echo $appli['jobTitle']; ?></td>
                                            <td><?php echo $appli['typeEmployment']; ?></td>
                                            <td><?php echo $appli['location']; ?></td>
                                            <td><?php echo $appli['salary']; ?></td>
                                            <td class="text-center"><?php
                                                $dateApplied = $appli['dateApplied'];
                                                $date = new DateTime($dateApplied);
                                                $formattedDate = $date->format('F j, Y | h:i A');
                                                echo $formattedDate;
                                                ?></td>
                                            <td class="text-center"><?php echo $appli['status']; ?></td>
                                            <td class="text-center">
                                            <?php if ($appli['status'] === 'Pending'): ?>
                                                <a href="<?= site_url('cancelApply/') . $appli['id'] ?>"><button type="button" style="border-radius: 5px; padding: 5px;" class="btn-danger">Cancel Apply</button></a>
                                            
                                            <?php elseif ($appli['status'] === 'Rejected' || $appli['status'] === 'Hired'): ?>
                                                <button type="button" style="border-radius: 5px; padding: 5px;" class="btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#hireModal_<?= $appli['id']; ?>">View Message</button>

                                            <?php elseif ($appli['status'] === 'Cancelled'): ?>
                                                <button type="button"
                                                    class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                                    style="border-radius: 2px;" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><i class="ti-plus"></i><b>View Things</b> 
                                                </button>
                                            <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                           
                                            <button type="button"
                                                    style="border-radius: 5px; padding: 5px;" class="btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#hireModal_<?= $appli['id']; ?>">Send Feedback</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
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
                                  
                                    <button type="submit" class="btn btn-primary float-right">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($appliedJob as $appli): ?>
                    <div class="modal fade" id="hireModal_<?= $appli['id']; ?>" tabindex="-1" aria-labelledby="hireModalLabel_<?= $appli['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="hireModalLabel_<?= $appli['jobseekerId']; ?>">Submit response</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="<?= site_url('hireApplicant') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="applicantId" value="<?= $appli['jobseekerId']?>">
                                <input type="hidden" name="employerId" value="<?= $appli['employerId']?>">
                                <input type="hidden" name="plainId" value="<?= $appli['id']?>">
                                <p><textarea style="width: 100%" type="text" placeholder="Message" name="message"></textarea></p>
                                <!-- <button type="submit" class="btn btn-primary float-right"></button> -->
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<style>
input[type="text"] {
    border: 1px solid #ccc;
    padding: 8px;
    box-sizing: border-box;
    width: 100%;
}
</style>


<script>
var today = new Date().toISOString().split('T')[0];
document.getElementById("datee").setAttribute('max', today);
</script>
<?= $this->include('employer/inc/footer')?>
</div>
</div>
</div>


<?= $this->include('admin/inc/end')?>
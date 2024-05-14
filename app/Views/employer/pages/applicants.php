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
                            <p class="text-success"></p>
                        </div>
                        <div class="card-body">
                            <h4>Applicants</h4>
                            <hr>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Applicant Name
                                            </th>
                                            <th>
                                                Job Title
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Resume
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($applicants)): ?>
                                        <tr class="text-center">
                                            <td colspan="4">No Applicant</td>
                                        </tr>
                                        <?php else: ?>
                                        <?php foreach ($applicants as $appli): ?>
                                        <tr>
                                            <td><?php echo $appli['fullname']; ?></td>
                                            <td><?php echo $appli['jobTitle']; ?></td>
                                            <td><?php echo $appli['status']; ?></td>
                                            <td><a href="/uploads/resume/<?=$appli['resume']?>"
                                                    target="_blank">Resume</a> </td>

                                            <td class="text-center">
                                                <div style="display: inline-block;">
                                                    <form action="<?= site_url('viewdetailsjobseekersemp')?>"
                                                        method="post">
                                                        <input type="hidden" name="jobApplyId"
                                                            value="<?= $appli['id']?>">
                                                        <button type="submit" style="border-radius: 5px; padding: 5px;"
                                                            class="btn-success">View Details</button>
                                                    </form>
                                                </div>

                                                <?php if ($appli['status'] === 'Pending'): ?>
                                                <div style="display: inline-block;">
                                                    <button type="button" style="border-radius: 5px; padding: 5px;"
                                                        class="btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#hireModal_<?php echo $appli['id']; ?>">Hire</button>
                                                </div>
                                                <?php endif; ?>
                                                <div class="modal fade" id="hireModal_<?php echo $appli['id']; ?>"
                                                    tabindex="-1"
                                                    aria-labelledby="hireModalLabel_<?php echo $appli['id']; ?>"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="hireModalLabel_<?php echo $appli['jobseekerId']; ?>">
                                                                    Submit response</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('hireApplicant') ?>"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="applicantId"
                                                                        value="<?= $appli['jobseekerId']?>">
                                                                    <input type="hidden" name="employerId"
                                                                        value="<?= $appli['employerId']?>">
                                                                    <input type="hidden" name="plainId"
                                                                        value="<?= $appli['id']?>">
                                                                    <p><textarea style="width: 100%" type="text"
                                                                            placeholder="Message"
                                                                            name="message"></textarea></p>
                                                                    <button type="submit"
                                                                        class="btn btn-primary float-right">Hire</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
            </div>
            <?= $this->include('employer/inc/footer')?>
        </div>
    </div>
</div>
<?= $this->include('employer/inc/end')?>
<?= $this->include('admin/inc/end')?>
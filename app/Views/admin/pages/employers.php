<?= $this->include('admin/inc/top')?>
<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">
        <?= $this->include('admin/inc/sidebar')?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div id="div1" class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-success" style="border-radius: 0px;">
                            <p class="text-success" style="font-size: 2px;">h</p>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Employers 
                                <span class="float-right">
                                    <p class="mr-2">
                                        All: <a href="#" class="filter-link" data-status="all"><?php echo $sumAll; ?></a> &nbsp; 
                                        Registered: <a href="#" class="filter-link" data-status="approved"><?php echo $sumApproved; ?></a> &nbsp; 
                                        Declined: <a href="#" class="filter-link" data-status="declined"><?php echo $sumDeclined; ?></a> &nbsp; 
                                        Pending: <a href="#" class="filter-link" data-status="pending"><?php echo $sumPending; ?></a> &nbsp; 
                                        Blocked: <a href="#" class="filter-link" data-status="blocked"><?php echo $sumBlocked; ?></a>
                                     </p>
                                </span>
                            </h4>
                            <hr>
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-hover">
                                    <thead style="height: 40px; font-weight: 10px;">
                                        <tr>
                                            <th> Employer Name </th>
                                            <th> Company Name </th>
                                            <th> Company Address </th>
                                            <th> Status </th>
                                            <th class="text-center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($employers as $emps): ?>
                                        <tr>
                                            <td><?php echo $emps['employerName']; ?></td>
                                            <td><?php echo $emps['companyName']; ?></td>
                                            <td><?php echo $emps['address']; ?></td>
                                            <td><?php echo $emps['profileStatus']; ?></td>
                                            <td class="text-center">
                                                <form action="<?= site_url('getEmployer')?>" method="post">
                                                    <input type="hidden" name="employerId" value="<?php echo $emps['id']; ?>">
                                                    <button style="border-radius: 5px; padding: 5px;" class="btn-success">View Profile</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->include('admin/inc/footer')?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.filter-link').click(function(e){
        e.preventDefault(); // prevent default link behavior
        
        var status = $(this).data('status'); // Get the status from data-status attribute
        
        // Hide all table rows
        $('tbody tr').hide();
        
        // Show rows based on the clicked status
        if(status === 'all') {
            $('tbody tr').show();
        } else {
            $('tbody tr').each(function() {
                var profileStatus = $(this).find('td:eq(3)').text().trim(); // Get the profileStatus from the fourth column (index 3)
                if(profileStatus === status.charAt(0).toUpperCase() + status.slice(1)) { // Capitalize the status
                    $(this).show();
                }
            });
        }
    });
});
</script>

<?= $this->include('admin/inc/end')?>
<?= $this->include('admin/inc/top')?>

<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= $this->include('admin/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card-body">
                            <h4 class="card-title">JOB FAIRS <p style="float: right;">
                                    <button type="button"
                                        class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                        style="border-radius: 2px;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="ti-plus"></i><b>Add</b> </button>
                                </p>
                            </h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Schedule
                                            </th>
                                            <th>
                                                Site
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jobfair as $jb): ?>

                                        <tr>
                                            <?php $formattedDate = date("F d, Y", strtotime($jb['schedule'])); ?>
                                            <th><?= $formattedDate ?></th>
                                            <td>
                                                <?= $jb['site'] ?>
                                            </td>
                                            <td>
                                                <?= $jb['description'] ?>
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    style="display: inline-block; padding: 7px; border-radius: 5px;"
                                                class="btn-success"><i
                                                        class="fas fa-edit"></i></button>

                                                <label class="switch"
                                                    style="display: inline-block; vertical-align: middle;">
                                                    <input type="checkbox">
                                                    <span class="slider"></span>
                                                </label>

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

<style>
input[type="text"] {
    border: 1px solid #ccc;
    padding: 8px;
    box-sizing: border-box;
    width: 100%;
}

input[type="date"] {
    border: 1px solid #ccc;
    padding: 8px;
    box-sizing: border-box;
    width: 100%;
}
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Job Fair</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('jobfairpost') ?>" method="post">
                    <p><span>Set Schedule</span> <input type="date" placeholder="Schedule" name="schedule" id="sched">
                    </p>
                    <p><input type="text" placeholder="Site" name="site"></p>
                    <p><textarea style="width: 100%" type="text" placeholder="Description"
                            name="description"></textarea></p>
                    <button type="submit" class="btn btn-primary float-right">Add</button>
                </form>


            </div>
        </div>
    </div>
</div>
<script>
var today = new Date().toISOString().split('T')[0];
document.getElementById("sched").setAttribute('min', today);
</script>
<?= $this->include('admin/inc/end')?>
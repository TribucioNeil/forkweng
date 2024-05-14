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
                            <h4 class="card-title">ACTIVITIES <p style="float: right;">
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
                                                Date
                                             </th>
                                            <th>
                                                Activity
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th class="text-center">
                                                Image
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($activities as $ac): ?>

                                        <tr>
                                            <?php $formattedDate = date("F d, Y", strtotime($ac['date'])); ?>
                                            <th><?= $formattedDate ?></th>
                                            <td><?= $ac['activity'] ?></td>

                                            <td>
                                                <?= $ac['description'] ?>
                                            </td>
                                            <td class="text-center">
                                                <img src="<?= base_url('uploads/activities/' . $ac['activityImage']) ?>" alt="Activity Image" style="width: 100px; height: 100px; border-radius: 0;">
                                            </td>
                                            <td class="text-center">
                                                <button
                                                style="display: inline-block; padding: 7px; border-radius: 5px;"
                                                class="btn-success"><i class="fas fa-edit"></i></button>

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
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('activitiespost') ?>" method="post" enctype="multipart/form-data">
                    <p><span>Date of Activity</span> <input type="date" name="date" id="datee">
                    </p>
                    <p><input type="text" placeholder="Activity" name="activity"></p>
                    <p><textarea style="width: 100%" type="text" placeholder="Description"
                            name="description"></textarea></p>
                    <label for="">Activity Image</label>
                    <p><input type="file" placeholder="" name="activityimage"></p>
                    <button type="submit" class="btn btn-primary float-right">Add</button>
                </form>


            </div>
        </div>
    </div>
</div>
<script>
var today = new Date().toISOString().split('T')[0];
document.getElementById("datee").setAttribute('max', today);
</script>
<?= $this->include('admin/inc/end')?>
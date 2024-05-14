<?= $this->include('jobseeker/inc/top')?>

<div class="container-scroller">
    <?= $this->include('jobseeker/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= $this->include('jobseeker/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 grid-margin stretch-card">


                    <div class="card" style="border-radius: 4px;">
                        <div class="card-body">
                            <h4 class="card-title">JOB ALERTS
                            </h4>
                            <div class="table-responsive">
                                <table  class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Job Title
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Employer
                                            </th>
                                            <th>
                                                Location
                                            </th>
                                            <th>
                                               Message
                                            </th>
                                            <th class="text-center">
                                               Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <?= $this->include('jobseeker/inc/footer')?>

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
<?= $this->include('jobseeker/inc/end')?>
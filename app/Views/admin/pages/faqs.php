<?= $this->include('admin/inc/top')?>

<div class="container-scroller">
    <?= $this->include('admin/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= $this->include('admin/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg-12 stretch-card" style="display: flex;
      justify-content: flex-end;">
                    <button id="toggles" class="btn-warning"
                        style="border: none; border-radius: 0; font-size: 15px;">For Jobseekers</button>
                    <button id="togglee" class="btn-primary"
                        style="border: none; border-radius: 0; font-size: 15px;">For Employers</button>

                </div>
                <div id="divs" class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-warning" style="border-radius: 0px;">
                            <p class="text-warning">h</p>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">For Jobseekers <p style="float: right;">
                                    <button type="button"
                                        class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                        style="border-radius: 2px;" data-bs-toggle="modal"
                                        data-bs-target="#modalseeker"><i class="ti-plus"></i><b>Add</b> </button>
                                </p>
                            </h4>


                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Question
                                            </th>
                                            <th>
                                                Answer
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($faqsseek as $fs): ?>

                                        <tr>
                                            <td>
                                            <?= $fs['question'] ?>
                                            </td>
                                            <td>
                                            <?= $fs['answer'] ?>
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
                <div id="dive" class="col-lg-12 grid-margin stretch-card" style="display: none;">
                    <div class="card" style="border-radius: 4px;">
                        <div class="card bg-primary" style="border-radius: 0px;">
                            <p class="text-primary">h</p>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">For Employers <p style="float: right;">
                                    <button type="button"
                                        class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                        style="border-radius: 2px;" data-bs-toggle="modal"
                                        data-bs-target="#modalemployer"><i class="ti-plus"></i><b>Add</b> </button>
                                </p>
                            </h4>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Question
                                            </th>
                                            <th>
                                                Answer
                                            </th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($faqsemp as $fe): ?>
                                        <tr>
                                            <td>
                                            <?= $fe['question'] ?>
                                            </td>
                                            <td>
                                            <?= $fe['answer'] ?>
                                            </td>
                                            <td class="text-center">
                                                <button
                                                style="display: inline-block; padding: 7px; border-radius: 5px;"
                                                class="btn-success" ><i
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
</style>

<div class="modal fade" id="modalseeker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create FAQs for Job Seekers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('faqsseeker') ?>" method="post">
              <p><input type="text" placeholder="Question" name="question"></p>
                <p><input type="text" placeholder="Answer" name="answer"></p>
                <button type="submit" class="btn btn-primary float-right">Add</button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalemployer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create FAQs for Employers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('faqsemployer') ?>" method="post">
              <p><input type="text" placeholder="Question" name="question"></p>
                <p><input type="text" placeholder="Answer" name="answer"></p>
                <button type="submit" class="btn btn-primary float-right">Add</button>
              </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/inc/end')?>
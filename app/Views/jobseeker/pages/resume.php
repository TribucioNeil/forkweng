<?= $this->include('jobseeker/inc/top')?>
<div class="container-scroller">
    <?= $this->include('jobseeker/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">
        <?= $this->include('jobseeker/inc/sidebar')?>
        <div class="main-panel">
            <div class="content-wrapper">
               

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>


                <?php if(empty($resumes['resume'])):?>
                    <button type="button" 
                    style="border-radius: 5px; padding: 5px;" class="btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-upload"></i><b>  Upload Resume</b>
                    </button>

                <?php else: ?>
                    <button type="button" class="text-white btn btn-social-icon-text btn-twitter bg-success"
                        style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-edit"></i><b>Update Resume</b>
                    </button>
                <?php endif; ?>


                
                <div style="margin-bottom: 10px;"></div>

                <?php if (empty($resumes)): ?>
                    <div style="text-align: center; margin-top: 200px;">
                        <p style="font-size: 18px; color:#666; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            No resume. Please upload here!
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach ($resumes as $resume): ?>
                        <div>
                            <div class="card" style="border-radius: 5px;">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="padding: 2%;">
                                        <object data="<?= base_url('uploads/resume/' . $resume['resume']) ?>"
                                                type="application/pdf" width="100%" height="1000">
                                        </object>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Resume</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= site_url('uploadresume') ?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <label for="">Upload Resume</label>
                                        <input type="file" name="uploadResume" accept="application/pdf">
                                    </div>
                                    <div>
                                        <label for="">Add Portfolio</label>
                                        <input type="file" name="uploadPortfolio" accept="application/pdf">
                                    </div>
                                    <button type="submit" class="text-white btn btn-social-icon-text btn-twitter bg-success"
                                            style="border-radius: 2px;"><i class="ti-upload"></i><b>Upload</b> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('admin/inc/end')?>
</div>

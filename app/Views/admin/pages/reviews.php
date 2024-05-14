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
                    <button id="togglers" class="btn-warning"
                        style="border: none; border-radius: 0; font-size: 15px;">Jobseekers</button>
                    <button id="togglere" class="btn-primary"
                        style="border: none; border-radius: 0; font-size: 15px;">Employers</button>
                    
                </div>
            <div id="divrs" class="col-lg-12 grid-margin stretch-card">
              <div class="card"  style="border-radius: 4px;">
              <div class="card bg-warning" style="border-radius: 0px;">
                            <p class="text-warning">h</p>
                        </div>
                <div class="card-body">
                  <h4 class="card-title">Reviews of Jobseekers</h4>  
                
                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                        <th>
                            Date
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Review
                          </th>
                          <th class="text-center">
                            Action
                          </th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="assets/admin/images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>

                          <td class="text-center">
                          <label class="switch"
                                                    style="display: inline-block; vertical-align: middle;">
                                                    <input type="checkbox">
                                                    <span class="slider"></span>
                                                </label>

                          </td>
                          
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div id="divre" class="col-lg-12 grid-margin stretch-card" style="display: none;">
              <div class="card"  style="border-radius: 4px;">
              <div class="card bg-primary" style="border-radius: 0px;">
                            <p class="text-primary">h</p>
                        </div>
                <div class="card-body">
                  <h4 class="card-title">Reviews of Employers</h4>  
                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                        <th>
                            Date
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Review
                          </th>
                          <th class="text-center">
                            Action
                          </th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="assets/admin/images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>

                          <td class="text-center">
                          <label class="switch"
                                                    style="display: inline-block; vertical-align: middle;">
                                                    <input type="checkbox">
                                                    <span class="slider"></span>
                                                </label>
                          </td>
                          
                        </tr>
                        
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
<?= $this->include('admin/inc/end')?>
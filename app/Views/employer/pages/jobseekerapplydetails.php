<?= $this->include('employer/inc/top')?>
<div class="container-scroller">
    <?= $this->include('employer/inc/topbar')?>
    <div class="container-fluid page-body-wrapper">

        
        <?= $this->include('employer/inc/sidebar')?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div>
                                <div>
                                    <label for="surname">APPLICANT NAME <span style="text-transform: uppercase; font-weight: bold;"><?php echo $jobbb['fullname']; ?></span></label>
                                </div>

                                <div>
                                    <a href="/uploads/resume/<?=$jobbb['resume']?>" target="_blank"<?php if (empty($jobbb['resume'])) { echo 'class="disabled-link"'; } ?>>RESUME</a>
                                </div>

                                <?php
                                    if(!empty($jobbb['vaccination'])){
                                        echo '<div>';
                                        echo '<a href="/uploads/jobseekerRequirements/vaccination/'.$jobbb['vaccination'].'" target="_blank"';
                                        if(empty($jobbb['vaccination'])){
                                            echo 'class="disabled-link"';
                                        }
                                        echo '>Vaccination</a>';
                                        echo '</div>';
                                    }
                                    if(!empty($jobbb['sss'])){
                                        echo '<div>';
                                        echo '<a href="/uploads/jobseekerRequirements/sss/'.$jobbb['sss'].'" target="_blank"';
                                        if(empty($jobbb['sss'])){
                                            echo 'class="disabled-link"';
                                        }
                                        echo '>SSS</a>';
                                        echo '</div>';
                                    }
                                    if(!empty($jobbb['pagibig'])){
                                        echo '<div>';
                                        echo '<a href="/uploads/jobseekerRequirements/pagibig/'.$jobbb['pagibig'].'" target="_blank"';
                                        if(empty($jobbb['pagibig'])){
                                            echo 'class="disabled-link"';
                                        }
                                        echo '>Pag-ibig</a>';
                                        echo '</div>';
                                    }
                                    if(!empty($jobbb['philhealth'])){
                                        echo '<div>';
                                        echo '<a href="/uploads/jobseekerRequirements/philhealth/'.$jobbb['philhealth'].'" target="_blank"';
                                        if(empty($jobbb['philhealth'])){
                                            echo 'class="disabled-link"';
                                        }
                                        echo '>Philhealth</a>';
                                        echo '</div>';
                                    }
                                    if(!empty($jobbb['tin'])){
                                        echo '<div>';
                                        echo '<a href="/uploads/jobseekerRequirements/tin/'.$jobbb['tin'].'" target="_blank"';
                                        if(empty($jobbb['tin'])){
                                            echo 'class="disabled-link"';
                                        }
                                        echo '>Tin</a>';
                                        echo '</div>';
                                    }
                                ?>
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
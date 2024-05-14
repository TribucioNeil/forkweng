<?php
   if(!session()->get('isLoggedIn'))
   redirect()->to('jlogin');
?>

<?= $this->include('default/inc/top')?>
<style>
    .design {
        background-color: white;
        width: 1000px;
        padding: 10px;
        margin: 20px auto 100px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        backdrop-filter: blur(10px);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
    }

    .design1 {
    background-color: white;
    width: 500px;
    padding: 10px;
    margin: 200px 100px 10px 350px; /* Adjust the margin as needed */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
    backdrop-filter: blur(10px);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
}

.design label {
        margin-top: 20px;
    }
    .button i {
    margin-top: 3px; /* Adjust the icon alignment */
}

.button:hover {
    background-color: #0056b3; /* Button background color on hover */
}   

</style>
<body>

<?= $this->include('default/inc/header')?>

<section class="section">
    <!-- Add the blurred background overlay -->
    <div class="blur-overlay"></div>

    <div class="container mt-0">
        <div class="row g-4 mt-0 justify-content-center align-items-center"> <!-- Center the content -->
            <div class="col-lg-8 col-md-6 col-12 position-relative"> <!-- Add position-relative -->
                <!-- Your content here -->
                <div class="box text-center"> <!-- Center the box -->
                    Here
                </div>
                <!-- End of the content -->
            </div>
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
        <!-- End -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
         <br>
        <br>
        <br>

        <?= $this->include('default/inc/footer')?>
        <?= $this->include('default/inc/end')?>

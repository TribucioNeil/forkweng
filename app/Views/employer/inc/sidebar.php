<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <style>
        .profile-image-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            margin-bottom: 20px; /* Adjust margin as needed */
            
        }

        .myname {
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .hidden {
        display: none;
    }
    </style>

    <div class="profile-image-container">
        <img src="assets/admin/images/faces/face28.jpg" alt="profile" style="width: 70px;
            height: 70px;"/>
    </div>
    <div class="myname">
        <p><?= $empdata['employerName'] ?></p> 
    </div>
    <div class="myname mt-1">
    <p><?= $empdata['companyName'] ?></p>
    </div>

    <hr>
    <ul class="nav mt-0">
        <li class="nav-item">
            <a class="nav-link" href="/employerhome">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="/newemployerprofile">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Company Profile</span>
            </a>
        </li>    
        <li class="nav-item">
            <a class="nav-link" href="/employerjobs">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Job Lists</span>
            </a>
        </li>                
        
        <li class="nav-item">
            <a class="nav-link" href="/employerapplicants">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Applicants</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('logoutEmployer') ?>">
                <i class="ti-power-off menu-icon"></i>
                <span class="menu-title">Log Out</span>
            </a>
        </li>
    </ul>
</nav>
<script>
    const toggleButton = document.querySelector('.navbar-toggler');
    const profileImageContainer = document.querySelector('.profile-image-container');
    const myNameDivs = document.querySelectorAll('.myname');

    toggleButton.addEventListener('click', function() {
        profileImageContainer.classList.toggle('hidden');
        
        // Toggle visibility of myname divs
        myNameDivs.forEach(div => {
            div.classList.toggle('hidden');
        });
    });
</script>

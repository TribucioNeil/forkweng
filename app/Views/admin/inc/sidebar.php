<nav class="sidebar sidebar-offcanvas" id="sidebar">
    
    <div class="sidebar-wrapper">
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

    <!-- <div class="profile-image-container">
        <img src="assets/admin/images/faces/face28.jpg" alt="profile" style="width: 70px;
            height: 70px;"/>
    </div>
    <div class="myname">
    <p>Employer Name</p> 
    
    </div>
    <div class="myname mt-1">
    <p>Company Name</p>
    </div>

    <hr> -->
        <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/adminhome">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/adminemployer">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Employer</span>
                    </a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="/adminjobseeker">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Jobseeker</span>
                    </a>
                </li>                
     
                <hr>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Website</span>
                    <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/adminjobfairs">Job Fairs</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/adminactivities">Activities</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/adminfaqs">FAQS</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/adminreviews">Reviews</a></li>
                        </ul>
                    </div>
                </li>
 
            <li class="nav-item">
                <a class="nav-link" href="/adminmanageteam">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Manage Team</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('logoutAdmin') ?>">
                    <i class="ti-power-off menu-icon"></i>
                    <span class="menu-title">Log Out</span>
                </a>
            </li>
        </ul>
    </div>     
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
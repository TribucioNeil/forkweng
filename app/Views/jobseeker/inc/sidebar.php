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
    <p>Applicant Name</p> 
    
    </div>
            <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home menu-icon"></i> <!-- Replace 'icon-home' with 'fas fa-home' -->
                            <span class="menu-title">Home</span>
                        </a>
                    </li>

                <li class="nav-item">
                    <a class="nav-link" href="/mydashboard">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/myprofile">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Information Profile</span>
                    </a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="/myresume">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">My Resume</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/myappliedjobs">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Applied Jobs</span>
                    </a>
                </li>                
                
                <li class="nav-item">
                    <a class="nav-link" href="/myjobalerts">
                        <i class="icon-bell menu-icon"></i>
                        <span class="menu-title">Job Alerts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('jlogout') ?>">
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

       <header id="topnav" style="background-color: #fff; border-bottom: 1px solid; border-color: gray;" class="defaultscroll sticky">
            <div class="container">
                <a class="logo" href="index-2.html">
                    <span class="logo-light-mode">
                        <img src="images/logo-dark.png" class="l-dark" alt="">
                        <img src="images/logo-light.png" class="l-light" alt="">
                    </span>
                    <img src="images/logo-light.png" class="logo-dark-mode" alt="">
                </a>

                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary" data-feather="user" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                            </button>

                            <?php
                            if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
                                <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded shadow border-0 mt-3">
                                    <a href="<?= site_url('mydashboard') ?>" class="dropdown-item fw-medium fs-6"><i data-feather="user" class="fea icon-sm me-2 align-middle"></i>Profile</a>
                                    <a href="candidate-profile-setting.html" class="dropdown-item fw-medium fs-6"><i data-feather="settings" class="fea icon-sm me-2 align-middle"></i>Settings</a>
                                    <div class="dropdown-divider border-top"></div>
                                    <a href="<?= site_url('jlogout') ?>" class="dropdown-item fw-medium fs-6"><i data-feather="log-out" class="fea icon-sm me-2 align-middle"></i>Logout</a>
                                </div>
                            <?php } else{ ?>
                                <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded shadow border-0 mt-3">
                                    <a href="<?= site_url('jlogin') ?>" class="dropdown-item fw-medium fs-6"><i data-feather="log-in" class="fea icon-sm me-2 align-middle"></i>Login</a>
                                    <a href="<?= site_url('register') ?>" class="dropdown-item fw-medium fs-6"><i data-feather="user-plus" class="fea icon-sm me-2 align-middle"></i>Signup</a>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="list-inline-item ps-1 mb-0">
                        <button id="openChatBtn" type="button" type="button" class="btn btn-sm btn-icon btn-pills btn-primary" onclick="openChatbot()">
                            <i data-feather="message-circle" class="icon-xs"></i>
                        </button>
                    </li>
                </ul>
                <div id="navigation">
                    <ul class="navigation-menu nav-right nav-light">
                        <li class="has-submenu parent-menu-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="has-submenu parent-parent-menu-item"><a href="javascript:void(0)"> Jobs </a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="/jobcategories" class="sub-menu-item">Categories</a></li>
                                <li><a href="/joblists" class="sub-menu-item">Lists</a></li>
                            </ul>  
                        </li>
                        <li class="has-submenu parent-menu-item">
                            <a href="/jobfairs">Job Fairs</a>
                        </li>
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="/activities">Activities</a></li>
                                <li><a href="/faqs">FAQS</a></li>
                                <li><a href="/aboutus">About Us</a></li>
                                <li><a href="/ourteam">Our Team</a></li>
                            </ul>
                        </li>
                        <li><a href="/contactus">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </header>
       

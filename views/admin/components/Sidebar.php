<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="/admin/profile" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="<?= BASE_URL ?>/views/admin/assets/images/profile.jpg" alt="profile">
                        <span class="login-status online"></span> <!--change to offline or busy as needed-->              
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">
                            <?= $_SESSION["admin_username"] ?>
                        </span>
                        <span class="text-secondary text-small">
                            <?= $_SESSION["admin_email"] ?>
                        </span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                    <span class="menu-title">Users</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
                <div class="collapse" id="users">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> 
                            <a class="nav-link" href="/admin/users-admin">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/users-customer">Customers</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/products">
                    <span class="menu-title">Products</span>
                    <i class="mdi mdi-briefcase menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/categories">
                    <span class="menu-title">Categories</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/orders">
                    <span class="menu-title">Orders</span>
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/tables">
                    <span class="menu-title">Tables</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <span class="menu-title">Clients Side</span>
                    <i class="mdi mdi-login menu-icon"></i>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                    <span class="menu-title">Sample Pages</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-medical-bag menu-icon"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> 
                            <a class="nav-link" href="#"> Blank Page </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Login </a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#"> Register </a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#"> 404 </a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="#"> 500 </a>
                        </li>
                    </ul>
                </div>
            </li> -->
        </ul>
    </nav>
    <div class="main-panel">
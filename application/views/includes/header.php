<?php 

$user_id = $this->session->userdata('user_id');
$user_em = $this->session->userdata('user_email');

$user_role = $this->session->userdata('user_role');
$user_outlet = $this->session->userdata('user_outlet');

if (empty($user_id)) {
	redirect(base_url(), 'refresh');
}

$tk_c = $this->router->class;
$tk_m = $this->router->method;

$alert_msg = $this->session->flashdata('alert_msg');

$settingResult = $this->db->get_where('site_setting');
$settingData = $settingResult->row();

$setting_site_name = $settingData->site_name;
$setting_pagination = $settingData->pagination;
$setting_tax = $settingData->tax;
$setting_currency = $settingData->currency;
$setting_date = $settingData->datetime_format;
$setting_product = $settingData->display_product;
$setting_keyboard = $settingData->display_keyboard;
$setting_customer_id = $settingData->default_customer_id;

$loginResult = $this->db->get_where('users', array('id' => $user_id));
$loginData = $loginResult->row();
$login_name = $loginData->fullname;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $setting_site_name; ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/yuba-dashboard.css" rel="stylesheet">
    <!-- Tailwind CSS CDN for prototyping -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-header d-flex align-items-center">
                <span class="fs-5 fw-semibold text-white">Laundry Management</span>
            </div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a href="<?=base_url()?>dashboard" class="nav-link <?php echo ($tk_c == 'dashboard') ? 'active' : ''; ?>">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>customers" class="nav-link <?php echo ($tk_c == 'customers') ? 'active' : ''; ?>">
                        <i class="bi bi-person-plus"></i>
                        <span>Customer Registration</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>service_orders" class="nav-link <?php echo ($tk_c == 'service_orders') ? 'active' : ''; ?>">
                        <i class="bi bi-ui-checks"></i>
                        <span>Register Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>service_items" class="nav-link <?php echo ($tk_c == 'service_items') ? 'active' : ''; ?>">
                        <i class="bi bi-tags"></i>
                        <span>Service Items</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>payments" class="nav-link <?php echo ($tk_c == 'payments') ? 'active' : ''; ?>">
                        <i class="bi bi-credit-card"></i>
                        <span>Payment Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>collections" class="nav-link <?php echo ($tk_c == 'collections') ? 'active' : ''; ?>">
                        <i class="bi bi-bag-check"></i>
                        <span>Service Collection</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>customer_history" class="nav-link <?php echo ($tk_c == 'customer_history') ? 'active' : ''; ?>">
                        <i class="bi bi-clock-history"></i>
                        <span>Customer History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>reports" class="nav-link <?php echo ($tk_c == 'reports') ? 'active' : ''; ?>">
                        <i class="bi bi-bar-chart"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>expenses" class="nav-link <?php echo ($tk_c == 'expenses') ? 'active' : ''; ?>">
                        <i class="bi bi-cash-coin"></i>
                        <span>Expense Management</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settingSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle <?php echo ($tk_c == 'setting') ? 'active' : ''; ?>">
                        <i class="bi bi-gear-fill"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="collapse nav-submenu" id="settingSubmenu">
                        <li><a href="<?=base_url()?>setting/system_setting" class="nav-link">System Settings</a></li>
                        <li><a href="<?=base_url()?>setting/users" class="nav-link">Users</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="main-content">
            <!-- Top navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-link text-light">
                        <i class="bi bi-list fs-4"></i>
                    </button>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <span class="ms-1"><?php echo $login_name; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="<?=base_url()?>profile"><i class="bi bi-person me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="<?=base_url()?>settings"><i class="bi bi-gear me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?=base_url()?>auth/logout"><i class="bi bi-power me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page content -->
            <div class="content-wrapper">

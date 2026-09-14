<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel | Insight Counseling Services' ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon.png') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/favicon.png') ?>">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Outfit) -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --bg-app: #f4f0fc;
            --bg-sidebar: #ffffff;
            --bg-sidebar-active: #ece5fd;
            --text-sidebar: #4b3d73;
            --text-sidebar-active: #5a39a8;
            --primary: #5a39a8;
            --primary-light: #ece3fd;
            --primary-hover: #482c87;
            --success: #52c41a;
            --success-light: #eefbe6;
            --warning: #faad14;
            --warning-light: #fffbe6;
            --info: #1890ff;
            --info-light: #e6f7ff;
            --danger: #ff4d4f;
            --danger-light: #fff1f0;
            --card-shadow: 0 10px 30px rgba(90, 57, 168, 0.04);
            --card-shadow-hover: 0 12px 40px transparent;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-app);
            color: #3a354c;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        .text-primary-color {
            color: var(--primary) !important;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: var(--bg-sidebar);
            color: var(--text-sidebar);
            min-height: 100vh;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid transparent;
            box-shadow: 2px 0 20px rgba(90, 57, 168, 0.02);
            z-index: 10;
        }

        .sidebar-brand {
            padding: 24px;
            border-bottom: 1px solid transparent;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand img {
            max-height: 44px;
            transition: transform 0.3s ease;
        }

        .sidebar-brand a:hover img {
            transform: scale(1.03);
        }

        .sidebar-menu {
            padding: 20px 14px;
            list-style: none;
            margin: 0;
        }

        .sidebar-item {
            margin-bottom: 6px;
        }

        .sidebar-item a {
            display: flex;
            align-items: center;
            padding: 12px 18px;
            color: var(--text-sidebar);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            border-radius: 12px;
            position: relative;
        }

        .sidebar-item a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            transition: transform 0.25s ease;
        }

        .sidebar-item a:hover {
            color: var(--text-sidebar-active);
            background-color: rgba(90, 57, 168, 0.04);
        }

        .sidebar-item a:hover i {
            transform: scale(1.15);
        }

        .sidebar-item.active a {
            color: var(--text-sidebar-active);
            background-color: var(--bg-sidebar-active);
            font-weight: 600;
        }

        .sidebar-item.active a::after {
            content: '';
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 18px;
            background-color: var(--primary);
            border-radius: 4px;
        }

        .sidebar-item a.text-danger:hover {
            background-color: var(--danger-light);
            color: var(--danger) !important;
        }

        /* Main Content Styling */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            position: relative;
        }

        .top-navbar {
            background-color: #fff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 4px 20px rgba(90, 57, 168, 0.03);
            border-bottom: 1px solid rgba(90, 57, 168, 0.05);
            z-index: 9;
        }

        .content-body {
            padding: 30px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .card {
            border: none;
            border-radius: 16px;
            border: 1px solid #ddd;
            box-shadow: var(--card-shadow);
            background: #fff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .page-header {
            margin-bottom: 20px;
        }

        /* Form Overrides matching Slide 3 & Slide 4 */
        .form-label {
            font-weight: 600;
            color: var(--text-sidebar-active);
            font-size: 1rem;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .form-control, .form-select {
            border-radius: 10px !important;
            padding: 11px 16px;
            border: 1.5px solid rgba(153, 153, 153, 0.64) !important;
            background-color: #faf9fd;
            color: #3a354c;
            font-size: 0.95rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary) !important;
            background-color: #fff !important;
            box-shadow: 0 0 0 4px rgba(90, 57, 168, 0.1) !important;
            color: #1a184c;
        }

        /* Unified Input Group styling as a single border box */
        .input-group {
            border: 1.5px solid rgba(153, 153, 153, 0.64) !important;
            border-radius: 10px !important;
            background-color: #faf9fd;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            display: flex;
            align-items: stretch;
        }

        .input-group:focus-within {
            border-color: var(--primary) !important;
            background-color: #fff !important;
            box-shadow: 0 0 0 4px rgba(90, 57, 168, 0.1) !important;
        }

        .input-group .form-control {
            border: none !important;
            background: transparent !important;
            border-radius: 0 !important;
            padding: 11px 16px;
            box-shadow: none !important;
        }

        .input-group .input-group-text {
            border: none !important;
            background: rgba(90, 57, 168, 0.04) !important;
            border-radius: 0 !important;
            padding-left: 18px;
            padding-right: 0px;
            color: var(--text-sidebar) !important;
            display: flex;
            align-items: center;
        }

        /* Form Buttons style matching Screenshot 3 */
        /* Submit: green (#52c41a), Cancel: red (#ff4d4f) */
        .btn-primary:not(table .btn), button[type="submit"]:not(table .btn) {
            background-color: var(--success) !important;
            border-color: var(--success) !important;
            color: #fff !important;
            border-radius: 10px !important;
            padding: 12px 28px !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 15px rgba(82, 196, 26, 0.15) !important;
            transition: all 0.25s ease !important;
        }

        .btn-primary:not(table .btn):hover, button[type="submit"]:not(table .btn):hover {
            background-color: #3f9e10 !important;
            border-color: #3f9e10 !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(82, 196, 26, 0.25) !important;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            font-size: 1rem !important;
            font-weight: 700 !important;
            border-bottom: 1px solid transparent !important;
            border-top: 1px solid transparent !important;
            border-left: 1px solid transparent !important;
            border-right: 1px solid transparent !important;
            padding: 16px 14px !important;
            vertical-align: middle;
        }

        .table tbody td {
            font-size: 1rem !important;
            color: #4b4563;
            padding: 16px 14px !important;
            border: 1px solid transparent !important;
            vertical-align: middle;
        }

        /* Zebra Striping: Odd rows have a light purple background, even rows have white */
        .table tbody tr:nth-child(odd) td {
            background-color: #eee4ffff !important;
        }

        .table tbody tr:nth-child(even) td {
            background-color: #ffffff !important;
        }

        /* Bold columns matching the layout */
        .table tbody tr td:first-child, 
        .table tbody tr td:nth-child(2),
        .table tbody tr td.fw-bold {
            font-weight: 700 !important;
            color: #2D2A70 !important;
        }

        /* Table Action Buttons */
        .table .btn-action,
        .table a.btn-action {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 32px !important;
            height: 32px !important;
            padding: 0 !important;
            font-size: 1rem !important; 
            font-weight: 500 !important;
            border-radius: 6px !important;
            transition: all 0.2s ease !important;
            text-decoration: none !important;
        }
        
        .table .btn-action i {
            font-size: 1rem !important;
            display: inline-block !important;
        }

        /* Table Status links rendered as simple clean text */
        .table a.btn-success,
        .table .btn-success {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #52c41a !important; /* Green */
            font-weight: 600 !important;
            padding: 0 !important;
            font-size: 1rem !important;
            text-decoration: none !important;
            pointer-events: auto !important;
            cursor: pointer !important;
            border-radius: 0 !important;
        }
        .table a.btn-success i,
        .table .btn-success i {
            display: none !important; /* Hide check icon */
        }
        .table a.btn-success:hover,
        .table .btn-success:hover {
            color: #3f9e10 !important;
            text-decoration: underline !important;
            background: transparent !important;
        }

        .table a.btn-secondary,
        .table .btn-secondary,
        .table a.btn-danger,
        .table .btn-danger {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #ff4d4f !important; /* Red */
            font-weight: 600 !important;
            padding: 0 !important;
            font-size: 1rem !important;
            text-decoration: none !important;
            pointer-events: auto !important;
            cursor: pointer !important;
            border-radius: 0 !important;
        }
        .table a.btn-secondary i,
        .table .btn-secondary i,
        .table a.btn-danger i,
        .table .btn-danger i {
            display: none !important; /* Hide times icon */
        }
        .table a.btn-secondary:hover,
        .table .btn-secondary:hover,
        .table a.btn-danger:hover,
        .table .btn-danger:hover {
            color: #e03e3f !important;
            text-decoration: underline !important;
            background: transparent !important;
        }

        /* Badges */
        .badge {
            padding: 8px 14px;
            font-weight: 600;
            border-radius: 30px;
            font-size: 0.75rem;
        }

        .badge.bg-success {
            background-color: var(--success-light) !important;
            color: var(--success) !important;
            border: 1px solid rgba(82, 196, 26, 0.2);
        }

        .badge.bg-danger {
            background-color: var(--danger-light) !important;
            color: var(--danger) !important;
            border: 1px solid rgba(255, 77, 79, 0.2);
        }

        .badge.bg-info {
            background-color: var(--info-light) !important;
            color: var(--info) !important;
            border: 1px solid rgba(24, 144, 255, 0.2);
        }

        .badge.bg-warning {
            background-color: var(--warning-light) !important;
            color: var(--warning) !important;
            border: 1px solid rgba(250, 173, 20, 0.2);
        }

        /* Avatar styling */
        .avatar-container {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 14px;
            background: #faf9fd;
            border-radius: 30px;
            border: 1px solid transparent;
        }

        .avatar-img-wrapper {
            position: relative;
            width: 32px;
            height: 32px;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid var(--primary);
        }

        .avatar-status {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 9px;
            height: 9px;
            background-color: var(--success);
            border: 1.5px solid #fff;
            border-radius: 50%;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(90, 57, 168, 0.1) !important;
        }

        /* Status Filter Buttons matching screenshots */
        .status-filters {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .btn-status-filter {
            background-color: #ffffff;
            color: #3b2c66;
            border: 1px solid rgba(90, 57, 168, 0.25) !important;
            padding: 8px 24px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            transition: all 0.25s ease !important;
            box-shadow: none !important;
        }

        .btn-status-filter.active[data-filter="all"] {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            border-color: var(--primary) !important;
        }

        .btn-status-filter.active[data-filter="active"] {
            background-color: var(--success) !important;
            color: #ffffff !important;
            border-color: var(--success) !important;
        }

        .btn-status-filter.active[data-filter="inactive"] {
            background-color: var(--danger) !important;
            color: #ffffff !important;
            border-color: var(--danger) !important;
        }

        /* Responsive Sidebar & Grid Overrides */
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed !important;
                top: 0;
                left: -260px !important; /* Hidden offscreen by default */
                height: 100vh;
                z-index: 1050 !important;
                box-shadow: 0 0 30px rgba(90, 57, 168, 0.15);
            }
            
            .sidebar.show {
                left: 0 !important; /* Slide in on mobile */
            }

            /* Close Button inside Sidebar visible on Mobile */
            .sidebar-close-btn {
                display: flex !important;
                align-items: center;
                justify-content: center;
                position: absolute;
                top: 20px;
                right: 20px;
                width: 32px;
                height: 32px;
                font-size: 1.1rem;
                color: var(--text-sidebar);
                background: var(--bg-sidebar-active);
                border: none;
                border-radius: 50%;
                cursor: pointer;
                z-index: 10;
                transition: all 0.2s ease;
            }
            
            .sidebar-close-btn:hover {
                background-color: var(--primary-light);
                color: var(--primary);
                transform: rotate(90deg);
            }

            /* Backdrop overlay style */
            .sidebar-backdrop {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background-color: rgba(75, 61, 115, 0.4);
                backdrop-filter: blur(4px);
                z-index: 1040;
                display: none;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .sidebar-backdrop.show {
                display: block;
                opacity: 1;
            }

            .top-navbar {
                padding: 0 20px !important;
            }

            .content-body {
                padding: 20px !important;
            }
        }

        /* Close Button hidden on Desktop */
        .sidebar-close-btn {
            display: none;
        }
    </style>
    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote Bootstrap 5 CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script>
</head>

<body>
    <!-- Sidebar Backdrop for Mobile -->
    <div class="sidebar-backdrop" id="sidebar-backdrop"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Close button for Mobile -->
        <button class="sidebar-close-btn" id="sidebar-close"><i class="fas fa-times"></i></button>
        <div class="sidebar-brand">
            <a href="<?= base_url('admin') ?>">
                <img src="<?= base_url('assets/logo-dark.png') ?>" alt="Insight Counseling">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item <?= uri_string() === 'admin' ? 'active' : '' ?>">
                <a href="<?= base_url('admin') ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/team') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/team') ?>"><i class="fas fa-users"></i> Team Management</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/services') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/services') ?>"><i class="fas fa-hand-holding-heart"></i> Services</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/testimonials') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/testimonials') ?>"><i class="fas fa-star"></i> Testimonials</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/faq') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/faq') ?>"><i class="fas fa-question-circle"></i> FAQ</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/branches') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/branches') ?>"><i class="fas fa-map-marker-alt"></i> Branch Locations</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/settings') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/settings') ?>"><i class="fas fa-cog"></i> Settings</a>
            </li>
            <li class="sidebar-item mt-5">
                <a href="<?= base_url('admin/logout') ?>" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <!-- Hamburger Menu Button for Mobile -->
                <button id="sidebar-toggle" class="btn border-0 p-0 text-primary-color d-lg-none" style="font-size: 1.4rem; line-height: 1;">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="fw-bold mb-0 text-primary-color">Insight Admin Control Panel</h5>
            </div>
            <div class="d-flex align-items-center">
                <a href="<?= base_url() ?>" target="_blank" class="btn btn-outline-secondary btn-sm me-3 border-0 bg-body-secondary-hover rounded-3" style="font-weight: 500; font-size: 1rem; padding: 8px 14px;"><i class="fas fa-external-link-alt me-1"></i> View Site</a>
                <div class="avatar-container">
                    <div class="avatar-img-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=5a39a8&color=fff&bold=true" class="avatar-img" alt="Admin Avatar">
                        <span class="avatar-status"></span>
                    </div>
                    <span class="fw-semibold text-dark" style="font-size: 1rem;">Admin</span>
                </div>
            </div>
        </div>

        <!-- Content Body -->
        <div class="content-body">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 Premium Notifications & Confirmations -->
    <script>
        // Configure premium toast notification
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        // Trigger toasts from PHP session flashdata
        <?php if (session()->getFlashdata('success')): ?>
            Toast.fire({
                icon: 'success',
                title: <?= json_encode(session()->getFlashdata('success')) ?>
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            Toast.fire({
                icon: 'error',
                title: <?= json_encode(session()->getFlashdata('error')) ?>
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('warning')): ?>
            Toast.fire({
                icon: 'warning',
                title: <?= json_encode(session()->getFlashdata('warning')) ?>
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('info')): ?>
            Toast.fire({
                icon: 'info',
                title: <?= json_encode(session()->getFlashdata('info')) ?>
            });
        <?php endif; ?>

        // Intercept native confirm dialog calls on page load and convert to SweetAlert
        document.addEventListener('DOMContentLoaded', () => {
            // Client-side form validation (prevents page refresh when required fields are empty)
            const validationForms = document.querySelectorAll('.needs-validation, form[novalidate]');
            Array.from(validationForms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        if (typeof Toast !== 'undefined') {
                            Toast.fire({
                                icon: 'warning',
                                title: 'Please fill in all required fields.'
                            });
                        }
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            const confirmElements = document.querySelectorAll('[onclick*="confirm("]');
            
            confirmElements.forEach(el => {
                const onclickAttr = el.getAttribute('onclick');
                const match = onclickAttr.match(/confirm\(['"]([^'"]+)['"]\)/);
                if (match && match[1]) {
                    const message = match[1];
                    el.removeAttribute('onclick');
                    el.setAttribute('data-swal-message', message);
                    el.classList.add('swal-confirm-trigger');
                }
            });

            document.addEventListener('click', (e) => {
                const trigger = e.target.closest('.swal-confirm-trigger');
                if (trigger) {
                    e.preventDefault();
                    const message = trigger.getAttribute('data-swal-message');
                    const href = trigger.getAttribute('href');
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: message,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#5a39a8', // Brand primary color
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                        customClass: {
                            popup: 'rounded-4 shadow-sm border-0'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                        }
                    });
                }
            });

            // Client-side status filtering logic
            const filterButtons = document.querySelectorAll('.btn-status-filter');
            const tableRows = document.querySelectorAll('table tbody tr');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filterValue = button.getAttribute('data-filter');
                    
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    tableRows.forEach(row => {
                        const status = row.getAttribute('data-status');
                        if (filterValue === 'all' || status === filterValue) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });

            // Initialize Summernote rich text editor on elements with class .summernote
            if (typeof $ !== 'undefined' && $.fn.summernote) {
                $('.summernote').summernote({
                    placeholder: 'Type content here...',
                    tabsize: 2,
                    height: 250,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            }

            // Mobile Sidebar Toggle logic
            const sidebar = document.querySelector('.sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const toggleBtn = document.getElementById('sidebar-toggle');
            const closeBtn = document.getElementById('sidebar-close');

            if (toggleBtn && sidebar && backdrop) {
                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.add('show');
                    backdrop.classList.add('show');
                });
            }

            if (closeBtn && sidebar && backdrop) {
                closeBtn.addEventListener('click', () => {
                    sidebar.classList.remove('show');
                    backdrop.classList.remove('show');
                });
            }

            if (backdrop && sidebar) {
                backdrop.addEventListener('click', () => {
                    sidebar.classList.remove('show');
                    backdrop.classList.remove('show');
                });
            }
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>

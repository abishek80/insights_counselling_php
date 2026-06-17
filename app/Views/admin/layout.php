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
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f4f6fa;
            color: #333;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: #2D2A70;
            color: #fff;
            min-height: 100vh;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
        }

        .sidebar-brand img {
            max-height: 40px;
        }

        .sidebar-menu {
            padding: 20px 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-item a {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-item a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        .sidebar-item a:hover,
        .sidebar-item.active a {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: #ffc107;
        }

        /* Main Content Styling */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .top-navbar {
            background-color: #fff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .content-body {
            padding: 30px;
            flex-grow: 1;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02), 0 1px 3px rgba(0,0,0,0.05);
            background: #fff;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .table-responsive {
            background: #fff;
            border-radius: 12px;
            padding: 10px;
        }

        .table th {
            color: #2D2A70;
            font-weight: 600;
        }

        .btn-action {
            padding: 6px 12px;
            font-size: 0.85rem;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="<?= base_url('admin') ?>">
                <img src="<?= base_url('assets/logo-light.png') ?>" alt="Insight Counseling">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item <?= uri_string() === 'admin' ? 'active' : '' ?>">
                <a href="<?= base_url('admin') ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/settings') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/settings') ?>"><i class="fas fa-cog"></i> Settings</a>
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
            <li class="sidebar-item <?= strpos(uri_string(), 'admin/enquiries') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/enquiries') ?>"><i class="fas fa-envelope-open-text"></i> Enquiries</a>
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
            <h5 class="fw-bold mb-0 text-primary-color">Insight Admin Control Panel</h5>
            <div class="d-flex align-items-center">
                <a href="<?= base_url() ?>" target="_blank" class="btn btn-outline-secondary btn-sm me-3"><i class="fas fa-external-link-alt"></i> View Site</a>
                <span class="fw-bold"><i class="fas fa-user-circle me-1 text-primary-color"></i> Admin</span>
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
                        confirmButtonColor: '#2D2A70', // Brand primary color
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
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>

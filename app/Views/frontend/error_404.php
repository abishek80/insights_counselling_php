<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title / Breadcrumbs -->
<section class="page-header text-center">
    <div class="container">
        <h1>Page Not Found</h1>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">404 Error</li>
            </ol>
        </nav>
    </div>
</section>

<!-- 404 Error Content -->
<section class="section-padding bg-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="p-5 border-0 rounded-4 shadow-sm bg-body-secondary">
                    <div class="mb-4 text-primary-color" style="font-size: 6rem; font-weight: 800; line-height: 1; letter-spacing: -2px; opacity: 0.9;">
                        404
                    </div>
                    <h3 class="fw-bold mb-3 text-dark">Oops! Page Not Found</h3>
                    <p class="text-muted mb-4 small" style="line-height: 1.7;">
                        The address you entered might be incorrect, or the page may have moved. 
                        Use the buttons below to return home, explore our counseling services, or get in touch with our team.
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="<?= base_url() ?>" class="btn btn-primary px-4 py-3 fw-bold shadow-sm" style="border-radius: 8px;">
                            <i class="fas fa-home me-2"></i> Go Back Home
                        </a>
                        <a href="<?= base_url('services') ?>" class="btn btn-outline-secondary px-4 py-3 fw-bold border-2" style="border-radius: 8px; color: var(--primary-color); border-color: var(--primary-color);">
                            <i class="fas fa-hand-holding-heart me-2"></i> View Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

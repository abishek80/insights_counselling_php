<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title / Header (Hidden on Thank You page as requested) -->
<section class="page-header text-center d-none">
    <div class="container">
        <h1>Thank You</h1>
        <p>Enquiry submitted successfully.</p>
    </div>
</section>

<!-- Success Content Section -->
<section class="section-padding bg-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <!-- Checkmark Icon Circle with Animation -->
                <div class="mb-5 d-inline-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success" style="width: 100px; height: 100px; animation: pulse 2s infinite;">
                    <i class="fas fa-check-circle fa-4x"></i>
                </div>

                <h2 class="fw-bold mb-3 text-primary-color" style="font-size: 2.25rem;">Message Sent Successfully!</h2>
                <p class="text-muted mb-5 px-3" style="font-size: 1.1rem; line-height: 1.6;">
                    Thank you for reaching out to <b> Insight Counseling Services.</b> We have received your enquiry, and our counseling support team will respond to you.
                </p>

                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 px-3">
                    <a href="<?= base_url() ?>" class="btn btn-primary px-4 py-3 fw-bold rounded-3 shadow-sm">
                        <i class="fas fa-house me-2"></i> Go Back Home
                    </a>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp'] ?? '9445662922') ?>/" target="_blank" rel="noopener" class="btn btn-success px-4 py-3 fw-bold rounded-3 shadow-sm" style="background-color: #25D366 !important; border-color: #25D366 !important;">
                        <i class="fab fa-whatsapp me-2"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Animation Styles -->
<style>
    @keyframes pulse {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.4);
        }
        70% {
            transform: scale(1);
            box-shadow: 0 0 0 20px rgba(40, 167, 69, 0);
        }
        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
        }
    }
</style>

<?= $this->endSection() ?>

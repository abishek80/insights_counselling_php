<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<section class="section-padding min-vh-75 bg-white d-flex align-items-center">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10 col-sm-12">
                <!-- Checkmark Icon Circle with Animation -->
                <div class="mb-3 d-inline-flex mx-auto align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success" style="width: 100px; height: 100px; animation: pulse 2s infinite;">
                    <i class="fas fa-check-circle fa-4x"></i>
                </div>

                <h1 class="fw-bold mb-2 text-primary-color">Appointment Booked Successfully!</h1>
                <p class="text-muted mb-3 px-3" style="font-size: 1.1rem; line-height: 1.6;">
                    Thank you for scheduling your psychological counseling session with <strong>Insight Counseling Services</strong>. We are committed to supporting your emotional well-being and personal growth.
                </p>

                <!-- Bottom Return Actions -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 pt-2">
                    <a href="<?= base_url() ?>" class="btn btn-primary px-4 py-3 rounded-pill">
                        <i class="fas fa-house me-2"></i> Return to Homepage
                    </a>
                    <a href="<?= base_url('services') ?>" class="btn btn-secondary px-4 py-3 rounded-pill fw-bold shadow-sm">
                        Explore Therapy Services <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <!-- Assistance CTA Box inside card -->
                <div class="p-4 p-lg-5 rounded-4 text-white shadow-sm mt-5" style="background: linear-gradient(135deg, #2D2A70 0%, #1c194c 100%);">
                    <h4 class="fw-bold mb-2 text-white">Questions about your appointment?</h4>
                    <p class="small mb-4 text-white-50 mx-auto" style="max-width: 540px;">
                        Connect directly with our intake team on WhatsApp for instant confirmation, location details, or appointment guidance.
                    </p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp']) ?>/" onclick="return gtag_report_whatsapp_conversion(this.href);" target="_blank" rel="noopener" class="btn-whatsapp-light rounded-pill text-white" style="background-color: #25D366 !important; border-color: #25D366 !important;">
                            <i class="fab fa-whatsapp me-2 fs-5"></i> Chat on WhatsApp
                        </a>
                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $settings['phone']) ?>" onclick="return gtag_report_phone_conversion(this.href);" class="btn-whatsapp-light rounded-pill">
                            <i class="fas fa-phone me-2 fs-6"></i> Call Us: <?= esc($settings['phone']) ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Animation -->
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

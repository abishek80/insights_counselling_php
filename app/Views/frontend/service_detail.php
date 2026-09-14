<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1><?= esc($service['title']) ?></h1>
        <p><?= esc($service['short_description']) ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('services') ?>">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($service['title']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Service Detail Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" class="img-fluid w-100 rounded-4 shadow-sm mb-4" alt="<?= esc($service['title']) ?>" style="max-height: 400px; object-fit: cover;">
                <h3 class="fw-bold text-primary-color mb-3">Service Description</h3>
                <div class="text-muted mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                    <?= nl2br(esc($service['long_description'])) ?>
                </div>
            </div>

            <div class="col-lg-5">
                <!-- Benefits Box -->
                <div class="card p-4 border-0 bg-body-secondary rounded-4 shadow-sm mb-4">
                    <h5 class="fw-bold text-primary-color mb-3">Key Benefits & Outcomes</h5>
                    <ul class="list-unstyled mb-0">
                        <?php
                        $benefits = json_decode($service['benefits'], true);
                        if (!is_array($benefits)) {
                            $benefits = array_filter(explode("\n", $service['benefits']));
                        }
                        if (!empty($benefits)):
                            foreach ($benefits as $benefit):
                        ?>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-circle text-success fs-5 me-3 mt-1"></i>
                                    <span class="text-muted"><?= esc($benefit) ?></span>
                                </li>
                        <?php 
                            endforeach;
                        else:
                        ?>
                            <li class="text-muted">No specific benefits listed.</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Pricing Box (Session Fee) -->
                <?php if (!empty($service['price'])): ?>
                <div class="card p-4 border-0 bg-body-secondary rounded-4 shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-primary-color mb-1">Session Fee</h5>
                            <p class="text-muted mb-0">Per consulting session</p>
                        </div>
                        <div class="text-primary-color fw-bold fs-4">
                            ₹<?= number_format($service['price']) ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Call to Action Box -->
                <div class="card p-4 bg-primary-color text-white border-0 rounded-4 shadow-sm text-center">
                    <h4 class="fw-bold mb-3">Schedule a Session</h4>
                    <p class="opacity-75 mb-4"><?= !empty($service['cta']) ? esc($service['cta']) : 'Talk to a mental health professional today and take the first step towards resolving emotional stress.' ?></p>
                    <a href="<?= esc($settings['booking_url']) ?>" target="_blank" class="btn btn-light w-100 py-3 fw-bold text-primary-color rounded-3">
                        <i class="fas fa-calendar-check me-2"></i> Book Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

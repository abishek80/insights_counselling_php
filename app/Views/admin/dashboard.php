<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Dashboard</h2>
        <p class="text-muted mb-0">Overview of your clinic website content.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Team Members Indicator -->
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 border-start border border-primary h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">Team Members</h6>
                    <h2 class="fw-bold mb-0 text-primary-color"><?= esc($teamCount) ?></h2>
                </div>
                <div class="fs-1 text-primary-color opacity-50"><i class="fas fa-users"></i></div>
            </div>
            <a href="<?= base_url('admin/team') ?>" class="text-decoration-none small fw-semibold mt-3 d-inline-block">Manage Team <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>

    <!-- Services Indicator -->
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 border-start border border-success h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">Services Offered</h6>
                    <h2 class="fw-bold mb-0 text-success"><?= esc($servicesCount) ?></h2>
                </div>
                <div class="fs-1 text-success opacity-50"><i class="fas fa-hand-holding-heart"></i></div>
            </div>
            <a href="<?= base_url('admin/services') ?>" class="text-decoration-none text-success small fw-semibold mt-3 d-inline-block">Manage Services <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>

    <!-- Testimonials Indicator -->
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 border-start border border-warning h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">Testimonials</h6>
                    <h2 class="fw-bold mb-0 text-warning"><?= esc($testimonialsCount) ?></h2>
                </div>
                <div class="fs-1 text-warning opacity-50"><i class="fas fa-star"></i></div>
            </div>
            <a href="<?= base_url('admin/testimonials') ?>" class="text-decoration-none text-warning small fw-semibold mt-3 d-inline-block">Manage Reviews <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>

    <!-- FAQ Indicator -->
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 border-start border border-info h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.75rem;">FAQ Items</h6>
                    <h2 class="fw-bold mb-0 text-info"><?= esc($faqCount) ?></h2>
                </div>
                <div class="fs-1 text-info opacity-50"><i class="fas fa-question-circle"></i></div>
            </div>
            <a href="<?= base_url('admin/faq') ?>" class="text-decoration-none text-info small fw-semibold mt-3 d-inline-block">Manage FAQs <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

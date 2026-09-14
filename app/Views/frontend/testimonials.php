<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Client Testimonials</h1>
        <p>Read about the experiences of individuals and couples who achieved healing with us.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="section-padding bg-body-secondary" id="testimonial">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($testimonials)): ?>
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-card shadow-sm h-100 d-flex flex-column justify-content-between">
                            <p class="text-muted mb-0">"<?= esc($testimonial['content']) ?>"</p>
                            <div>
                                <div class="mb-2 mt-4 text-warning" style="font-size: 1rem;">
                                    <?php 
                                    $ratingCount = (int)($testimonial['rating'] ?? 5);
                                    if ($ratingCount < 1) $ratingCount = 5;
                                    for ($i = 1; $i <= 5; $i++): 
                                    ?>
                                        <i class="<?= $i <= $ratingCount ? 'fas' : 'far' ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <div class="testimonial-separator my-3 bg-dark-subtle"></div>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-initial"><?= strtoupper(substr($testimonial['client_name'], 0, 1)) ?></div>
                                    <div>
                                        <h6 class="mb-0 fw-bold d-block mb-1"><?= esc($testimonial['client_name']) ?></h6>
                                        <p class="mb-0 text-muted small"><?= esc($testimonial['meta_info']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No testimonials found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

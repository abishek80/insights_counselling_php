<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Our Services</h1>
        <p>Professional psychological services tailored to guide you to mental well-being.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Services Grid -->
<section class="section-padding bg-body-secondary" id="services">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-card h-100 d-flex justify-content-between flex-column">
                            <div>
                                <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" class="card-img-top" alt="<?= esc($service['title']) ?>">
                                <h5><?= esc($service['title']) ?></h5>
                                <p><?= esc($service['short_description']) ?></p>
                            </div>
                            <div class="d-flex gap-3 flex-column justify-content-between mt-3">
                                <a href="<?= base_url('services/' . esc($service['slug'])) ?>" class="btn-read-more">Read More</a>
                                <a href="https://insightcounselings.com/bookings/" target="_blank" class="btn-book-now">Book Your Appointment</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No services found in database.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

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
<section class="section-padding bg-primary-subtle" id="services">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
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

<!-- Popular Specializations & Searches -->
<section class="section-padding bg-white border-top">
    <div class="container text-center">
        <h6 class="text-primary-color fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">POPULAR SEARCHES & SPECIALIZATIONS</h6>
        <h2 class="fw-bold h3 text-dark mb-3">Therapy & Counseling Services Near You in Chennai</h2>
        <p class="text-muted mx-auto mb-0" style="max-width: 750px;">
            Whether you are looking for a <strong>good psychologist near me</strong>, <strong>child psychologist chennai</strong>, <strong>family counselling near me</strong>, or <strong>best marriage counseling in chennai</strong>, our expert therapy centers in Vadapalani, Porur, Kovur, and Vadapalani are here to support your mental wellness.
        </p>
        <div class="mt-4 d-flex justify-content-center align-items-center gap-3">
            <a href="https://insightcounselings.com/bookings/" target="_blank" class="btn-read-more px-5">
                Book Your Appointment Now
            </a>
            <a href="<?= base_url('contact') ?>" class="btn-book-now px-5">
                Contact Us
            </a>
        </div>
        <div class="position-relative">
            <div class="swiper tagSwiper p-0">
                <div class="swiper-wrapper">
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Best Relationship Counselling in Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Best Marriage Counseling in Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Marriage Counselor Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Psychologist Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Good Psychologist Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Counseling Center Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Psychologist in Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Psychologist Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Therapist Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Best Psychologist in Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Psychology Doctor Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Therapist in Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Marriage Counseling Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Family Counselling Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Child Psychologist Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Counselling Psychologist Near Me</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Best Psychologist Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Therapist Chennai</span></div>
                    <div class="swiper-slide w-auto"><span style="font-size: 1px; color: transparent;">Counselling Near Me</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.tagSwiper')) {
            new Swiper('.tagSwiper', {
                slidesPerView: 'auto',
                spaceBetween: 12,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>

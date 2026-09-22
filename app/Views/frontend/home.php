<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section class="hero-section" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="hero-title fw-bold">Best Psychologist in <span>Chennai</span></h1>
                <p class="hero-subtext">Providing confidential, non-judgmental psychological support for individuals, teenagers, and couples seeking emotional wellbeing.</p>
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" class="btn btn-secondary px-4 py-3 fw-bold d-inline-flex align-items-center">
                    Book Your Consultation <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-5 mt-5 mt-lg-0">
                <div class="hero-img-container shadow-lg">
                    <img src="<?= base_url('assets/hero.png') ?>" alt="Mrs. Lekha Edwin - Best Psychologist in Chennai, Insight Counseling Services" class="hero-img d-none d-lg-block">
                    <img src="<?= base_url('assets/about-img.png') ?>" alt="Mrs. Lekha Edwin - Best Female Psychologist in Chennai" class="img-fluid w-100 rounded-5 shadow-lg border d-block d-lg-none">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Founder -->
<section class="section-padding" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="position-relative">
                    <img src="<?= base_url('assets/about-img.png') ?>" alt="Mrs. Lekha Edwin - Best Female Psychologist in Chennai at Insight Counseling Services" class="img-fluid w-100 rounded-5 shadow-lg border d-none d-lg-block">
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary-color fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">ABOUT FOUNDER</h6>
                <h2 class="about-founder-title">MRS. LEKHA EDWIN</h2>
                <div class="title-underline"></div>
                <div class="about-content">
                    <p class="text-muted mb-3" style="font-size: 1rem;">Mrs. Lekha Edwin is a Counseling Psychologist in Chennai, providing professional mental health support for clients in India and abroad. She offers online therapy for international clients and in-person counseling sessions in Chennai for individuals, teenagers, and couples.</p>
                    <p class="text-muted mb-4" style="font-size: 1rem;">She helps clients understand their emotions, thoughts, and behaviors, supporting them in building healthier coping strategies and emotional balance.</p>

                    <h6 class="fw-bold mb-3 text-dark">She works with:</h6>
                    <div class="row g-2 mb-4">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li>Stress, Anxiety & Emotional Overwhelm</li>
                                <li>Relationship & Couple Counseling</li>
                                <li>Teen Emotional & Academic Support</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li>Self-Confidence</li>
                                <li>Self-Esteem & Personal Growth</li>
                            </ul>
                        </div>
                    </div>

                    <p class="text-muted italic" style="font-size: 1rem; border-left: 4px solid var(--primary-color); padding-left: 20px;">
                        "Her therapeutic approach is warm, confidential, and non-judgmental, creating a safe and supportive space where clients feel heard and understood."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner-section">
    <div class="container">
        <h2 class="fw-bold">Guiding you through life's challenges.</h2>
        <h5 class="mb-0 fw-medium">"Our mission is to provide you with the professional support and tools needed to <br> achieve emotional balance and mental well-being."</h5>
    </div>
</section>

<!-- 3 Boxes -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-card">
                    <div class="icon-box">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h4 class="fw-bold">Our Vision</h4>
                    <p>To impart essential skills to take care of mental health of individuals belonging to all the age group.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <div class="icon-box">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h4 class="fw-bold">Our Mission</h4>
                    <p>Aspiring to serve the Indians all over the world to come forward in taking care of their mental health.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <div class="icon-box">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 class="fw-bold">Our Motto</h4>
                    <p>Empowering lives through personalized support, healing, and transformational guidance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="section-padding pt-3" id="teams">
    <div class="container text-center">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5">Our Team</h2>
            <div class="mx-auto" style="width: 60px; height: 4px; background: var(--primary-color);"></div>
        </div>

        <?php if (!empty($team)): ?>
            <!-- Swiper Slider Container -->
            <div class="position-relative px-md-4 mt-4">
                <div class="swiper teamSwiper pb-5">
                    <div class="swiper-wrapper">
                        <?php foreach ($team as $member): ?>
                            <div class="swiper-slide h-auto">
                                <div class="team-card bg-primary-subtle h-100 d-flex flex-column justify-content-between p-4 rounded-4 shadow-sm border text-start mt-2">
                                    <div>
                                        <div class="team-img-wrapper mb-3 text-center">
                                            <img src="<?= base_url('assets/team/' . esc($member['image'])) ?>" class="team-img" alt="<?= esc($member['name']) ?> - Expert Counseling Psychologist & Therapist in Chennai">
                                        </div>
                                        <h5 class="fw-bold text-dark mb-1 text-center"><?= esc($member['name']) ?></h5>
                                        <div class="team-role text-center mb-2"><?= esc($member['role']) ?></div>
                                        <p class="team-desc text-muted small mb-2 text-center"><?= esc($member['qualifications']) ?></p>
                                        <?php if (!empty($member['languages'])): ?>
                                            <div class="team-langs text-muted small mb-3 text-center"><?= esc($member['languages']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center flex-column mt-3">
                                        <button class="btn-team-dark" data-bs-toggle="modal" data-bs-target="#teamModal" data-id="<?= $member['id'] ?>">View Profile</button>
                                        <?php 
                                            $customBtns = !empty($member['custom_buttons']) ? json_decode($member['custom_buttons'], true) : [];
                                        ?>
                                        <?php if (!empty($customBtns) && is_array($customBtns)): ?>
                                            <?php foreach ($customBtns as $b): ?>
                                                <a href="<?= esc($b['url']) ?>" target="<?= esc($b['target'] ?? '_blank') ?>" class="btn <?= esc($b['style'] ?? 'btn-primary') ?> btn-sm fw-bold shadow-sm py-2 rounded-pill text-center text-decoration-none" style="font-size: 0.88rem;">
                                                    <?= esc($b['label']) ?>
                                                </a>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <a href="<?= esc($settings['booking_url'] ?? 'https://insightcounselings.com/bookings/') ?>" target="_blank" class="btn-book-now text-center">Book Your Appointment</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Swiper Pagination -->
                    <div class="swiper-pagination team-pagination"></div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?= base_url('team') ?>" class="btn btn-primary px-4 py-2.5 rounded-pill fw-bold shadow-sm">
                    View All Our Team <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        <?php else: ?>
            <p class="text-center text-muted">No team members registered yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Our Services -->
<section class="section-padding bg-primary-subtle" id="services">
    <div class="container text-center">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5">Our Services</h2>
            <div class="mx-auto" style="width: 60px; height: 4px; background: var(--primary-color);"></div>
        </div>
        <?php if (!empty($services)): ?>
            <!-- Swiper Slider Container -->
            <div class="position-relative px-md-4 mt-4">
                <div class="swiper serviceSwiper pb-5">
                    <div class="swiper-wrapper">
                        <?php foreach ($services as $service): ?>
                            <div class="swiper-slide h-auto">
                                <div class="service-card h-100 d-flex justify-content-between flex-column text-start mt-2">
                                    <div>
                                        <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" class="card-img-top" alt="<?= esc($service['title']) ?>">
                                        <h5><?= esc($service['title']) ?></h5>
                                        <p><?= esc($service['short_description']) ?></p>
                                    </div>
                                    <div class="d-flex gap-3 flex-column text-center justify-content-between mt-3">
                                        <a href="<?= base_url('services/' . esc($service['slug'])) ?>" class="btn-read-more">Read More</a>
                                        <a href="https://insightcounselings.com/bookings/" target="_blank" class="btn-book-now">Book Your Appointment</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Swiper Pagination -->
                    <div class="swiper-pagination service-pagination"></div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="<?= base_url('services') ?>" class="btn btn-primary px-4 py-2.5 rounded-pill fw-bold shadow-sm">
                    View All Our Services <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        <?php else: ?>
            <p class="text-center text-muted">No services categories configured yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Need Counseling & Quick Find Specializations -->
<section class="cta-banner border-bottom" id="popular-searches">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start">
                <h6 class="text-white opacity-75 fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">QUICK FIND & SPECIALIZATIONS</h6>
                <h2 class="fw-bold mb-3 display-5 text-white">Need Counseling?</h2>
                <p class="mb-0 text-white opacity-75" style="max-width: 750px;">
                    Insight Counseling Services is a private mental health clinic in Chennai offering compassionate, confidential, and evidence-based psychological support for all. Looking for a <strong>good psychologist near me</strong> or <strong>marriage counselor near me</strong> in Chennai? We provide certified mental health guidance across Vadapalani, Porur, Kovur, Vadapalani, and online therapy globally.
                </p>
            </div>
            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" class="btn-cta-request">Request an appointment</a>
            </div>
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

<!-- How we help you -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <img src="<?= base_url('assets/service.png') ?>" alt="Psychotherapy session with Best Therapist in Chennai - Insight Counseling Services" class="img-fluid w-100 rounded-5 shadow-lg border">
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary-color fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">HOW WE HELP YOU</h6>
                <h2 class="how-we-help-title">Guiding you through life's challenges.</h2>
                <p class="text-muted mb-5">Our team of experts is dedicated to providing you with the best possible support and guidance to help you navigate life's challenges. We combine clinical expertise with a deeply human approach.</p>

                <div class="d-flex align-items-start mb-4">
                    <div class="help-icon-box bg-primary-subtle">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <div>
                        <h5 class="help-feature-title">Expert Guidance</h5>
                        <p class="help-feature-desc mb-0">Our team of experts is dedicated to providing you with the best possible support through evidence-based interventions.</p>
                    </div>
                </div>

                <div class="d-flex align-items-start">
                    <div class="help-icon-box bg-primary-subtle">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h5 class="help-feature-title">Holistic Healing</h5>
                        <p class="help-feature-desc mb-0">We believe in a holistic approach to healing that addresses the mind, body, and spirit for long-lasting change.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section-padding bg-primary-subtle" id="testimonial">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5">Our Clients Loves Us</h2>
            <div class="mx-auto" style="width: 60px; height: 4px; background: var(--primary-color);"></div>
        </div>
        <div class="swiper testimonialSwiper pb-5">
            <div class="swiper-wrapper">
                <?php if (!empty($testimonials)): ?>
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="swiper-slide">
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
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-initial"><?= strtoupper(substr($testimonial['client_name'], 0, 1)) ?></div>
                                            <div>
                                                <h6 class="mb-0 fw-bold"><?= esc($testimonial['client_name']) ?></h6>
                                                <p class="mb-0 text-muted small"><?= esc($testimonial['meta_info']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="swiper-slide text-center text-muted">No testimonials registered yet.</div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination testimonial-pagination"></div>
        </div>
        <div class="text-center mt-3">
            <a href="<?= base_url('testimonials') ?>" class="btn btn-primary px-4 py-2.5 rounded-pill fw-bold shadow-sm">
                View All Testimonials <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Get in Touch -->
<section class="section-padding bg-white" id="contact">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5">Get in Touch</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">Whether you have a question about our services or are ready to book a session, we are here to support you across multiple locations in Chennai.</p>
        </div>

        <!-- Location Cards -->
        <div class="row g-4 mb-5">
            <?php if (!empty($branches)): ?>
                <?php foreach ($branches as $branch): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-card bg-primary-subtle h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="location-icon-box">
                                    <i class="fas fa-location-dot"></i>
                                </div>
                                <h5 class="fw-bold mb-2"><?= esc($branch['name']) ?></h5>
                                <?php if (!empty($branch['serving_areas'])): ?>
                                    <p class="text-muted small mb-3 opacity-75"><?= esc($branch['serving_areas']) ?></p>
                                <?php endif; ?>
                                <p class="text-primary-color mb-3"><i class="fas fa-map-marker-alt me-2 text-primary-color"></i> <?= esc($branch['address']) ?></p>
                            </div>
                            <div>
                                <div class="mb-2">
                                    <i class="fas fa-phone me-2 text-primary-color"></i>
                                    <a href="tel:<?= preg_replace('/\s+/', '', $branch['phone']) ?>" class="text-decoration-none text-reset"><?= esc($branch['phone']) ?></a>
                                </div>
                                <div class="mb-3">
                                    <i class="fas fa-envelope me-2 text-primary-color"></i>
                                    <a href="mailto:<?= esc($branch['email']) ?>" class="text-decoration-none text-reset"><?= esc($branch['email']) ?></a>
                                </div>
                                <?php if (!empty($branch['map_url'])): ?>
                                    <a href="<?= esc($branch['map_url']) ?>" target="_blank" class="text-primary-color fw-bold text-decoration-none">GET DIRECTIONS <i class="fas fa-external-link-alt ms-1"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">No branch locations available at the moment.</div>
            <?php endif; ?>
        </div>

        <!-- Form and Sidebar -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="whatsapp-box h-auto">
                    <h3 class="fw-bold mb-3">Need a Quick Response?</h3>
                    <p class="mb-4 opacity-75">WhatsApp is the fastest way to get in touch with our intake team and book your session immediately.</p>
                    <a href="https://wa.me/<?= esc($settings['whatsapp']) ?>/" target="_blank" class="btn-whatsapp-light">
                        <i class="fab fa-whatsapp fs-4"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="direct-channels-box">
                    <h5 class="fw-bold mb-4">Direct Channels</h5>
                    <div class="channel-item">
                        <div class="channel-icon-box">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="channel-content">
                            <h6>EMAIL US</h6>
                            <p><a href="mailto:<?= esc($settings['email']) ?>" class="text-decoration-none text-white"><?= esc($settings['email']) ?></a></p>
                        </div>
                    </div>
                    <div class="channel-item">
                        <div class="channel-icon-box">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="channel-content">
                            <h6>CALL US</h6>
                            <p><a href="tel:<?= preg_replace('/\s+/', '', $settings['phone']) ?>" class="text-decoration-none text-white"><?= esc($settings['phone']) ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Team Profile Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content modal-profile position-relative">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body">
                <div class="row g-0">
                    <div class="col-lg-5 profile-img-col d-none d-lg-block" id="modal-img-col"></div>
                    <div class="col-lg-7 profile-info-col">
                        <h2 class="fw-bold mb-1" id="modal-name"></h2>
                        <div class="profile-role" id="modal-role"></div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="profile-detail-content">
                                <h6>Qualifications</h6>
                                <p id="modal-qual"></p>
                            </div>
                        </div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="profile-detail-content">
                                <h6>Languages</h6>
                                <p id="modal-langs"></p>
                            </div>
                        </div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="profile-detail-content">
                                <h6>Specialties</h6>
                                <div id="modal-specialties" class="d-flex flex-wrap gap-1 mt-1"></div>
                            </div>
                        </div>

                        <div class="profile-about-label">ABOUT</div>
                        <div class="profile-about-text" id="modal-about"></div>

                        <div id="modal-buttons" class="d-flex flex-column gap-2 mt-3">
                            <button class="btn-book-profile" onclick="window.open('<?= esc($settings['booking_url']) ?>', '_blank')">
                                <i class="fas fa-comment-dots"></i> Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Initialize Swiper for testimonials
    if (document.querySelector('.testimonialSwiper')) {
        new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimonial-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                }
            }
        });
    }

    // Initialize Swiper for team members
    if (document.querySelector('.teamSwiper')) {
        new Swiper('.teamSwiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.team-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                }
            }
        });
    }

    // Initialize Swiper for services
    if (document.querySelector('.serviceSwiper')) {
        new Swiper('.serviceSwiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.service-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                }
            }
        });
    }

    // Initialize Swiper for tag keywords
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

    // Inject data dynamically inside the modal profile structure
    (function() {
        const teamMembers = <?= json_encode($team) ?>;
        const teamModal = document.getElementById('teamModal');
        
        if (teamModal) {
            teamModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const memberId = button.getAttribute('data-id');
                const member = teamMembers.find(m => m.id == memberId);
                
                if (member) {
                    document.getElementById('modal-name').textContent = member.name;
                    document.getElementById('modal-role').textContent = member.role;
                    document.getElementById('modal-qual').textContent = member.qualifications;
                    document.getElementById('modal-langs').textContent = member.languages;
                    document.getElementById('modal-about').innerHTML = member.about;
                    
                    const imgCol = document.getElementById('modal-img-col');
                    imgCol.style.backgroundImage = `url('<?= base_url("assets/team/") ?>${member.image}')`;
                    
                    const specialtiesContainer = document.getElementById('modal-specialties');
                    specialtiesContainer.innerHTML = '';
                    const specialties = (member.specialties || '').split(',');
                    specialties.forEach(spec => {
                        if (spec.trim()) {
                            const tag = document.createElement('span');
                            tag.className = 'specialty-tag';
                            tag.textContent = spec.trim();
                            specialtiesContainer.appendChild(tag);
                        }
                    });

                    // Render dynamic custom buttons in modal
                    const modalButtonsContainer = document.getElementById('modal-buttons');
                    if (modalButtonsContainer) {
                        modalButtonsContainer.innerHTML = '';
                        let customBtns = [];
                        if (member.custom_buttons) {
                            try {
                                customBtns = typeof member.custom_buttons === 'string' ? JSON.parse(member.custom_buttons) : member.custom_buttons;
                            } catch(e) {}
                        }

                        if (Array.isArray(customBtns) && customBtns.length > 0) {
                            customBtns.forEach(btn => {
                                const a = document.createElement('a');
                                a.href = btn.url || '#';
                                a.target = btn.target || '_blank';
                                a.className = `btn ${btn.style || 'btn-primary'} fw-bold py-2.5 px-4 rounded-3 text-center d-block shadow-sm`;
                                a.textContent = btn.label || 'Action';
                                modalButtonsContainer.appendChild(a);
                            });
                        } else {
                            const defaultBtn = document.createElement('button');
                            defaultBtn.className = 'btn-book-profile';
                            defaultBtn.innerHTML = '<i class="fas fa-comment-dots me-1"></i> Book Appointment';
                            defaultBtn.onclick = function() {
                                window.open('<?= esc($settings["booking_url"]) ?>', '_blank');
                            };
                            modalButtonsContainer.appendChild(defaultBtn);
                        }
                    }
                }
            });
        }
    })();
</script>
<?= $this->endSection() ?>

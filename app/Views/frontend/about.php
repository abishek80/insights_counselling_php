<?php helper('settings'); $settings = get_settings(); if (empty($team)) { $teamModel = new \App\Models\TeamModel(); $team = $teamModel->where('status', 1)->findAll(); } if (empty($services)) { $serviceModel = new \App\Models\ServiceModel(); $services = $serviceModel->where('status', 1)->findAll(); } ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title / Hero Banner -->
<section class="page-header text-center bg-primary-subtle py-5">
    <div class="container py-3">
        <h1 class="fw-bold text-primary mb-2">About Insight Counseling Services Chennai</h1>
        <p class="lead text-muted mb-3">Supporting Emotional Well-Being Since 2016</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Mission & Overview Section -->
<section class="section-padding bg-white">
    <div class="container text-center">
        <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">WELCOME TO ICS CHENNAI</h6>
        <h2 class="fw-bold mb-4 text-dark">Dedicated to Professional, Compassionate & Confidential Psychological Support</h2>
        <p class="text-muted fs-6 mb-4">
            At <strong>Insight Counseling Services Chennai</strong>, we believe that mental health is an essential part of overall well-being. Emotional challenges can affect relationships, work performance, academic success, personal growth, and quality of life. Our mission is to provide professional, compassionate, and confidential psychological support that helps individuals overcome challenges, build resilience, and lead fulfilling lives.
        </p>
        <div class="row g-4 mt-2 text-start">
            <div class="col-md-6">
                <div class="p-4 rounded-4 bg-primary-subtle h-100 border-start border-5 border-primary shadow-sm">
                    <h5 class="fw-bold text-dark mb-2"><i class="fas fa-hand-holding-heart text-primary me-2"></i> Established Since 2016</h5>
                    <p class="text-muted mb-0">
                        Founded in 2016, Insight Counseling Services Chennai has been committed to providing accessible and evidence-based mental health services for individuals, adolescents, couples, and families across Chennai. Over the years, we have supported hundreds of clients in navigating emotional difficulties and achieving meaningful personal growth.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded-4 bg-primary-subtle h-100 border-start border-5 border-primary shadow-sm">
                    <h5 class="fw-bold text-dark mb-2"><i class="fas fa-user-check text-primary me-2"></i> Personalized Care</h5>
                    <p class="text-muted mb-0">
                        As a trusted provider of Counseling Services in Chennai, we offer personalized support tailored to each individual's unique needs and goals.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="section-padding bg-primary-subtle">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">OUR JOURNEY</h6>
                <h2 class="fw-bold mb-3 text-dark">Our Story</h2>
                <div class="title-underline mb-4"></div>
                <p class="text-muted mb-3">
                    <strong>Insight Counseling Services Chennai</strong> was established in 2016 with a vision to make quality mental health care accessible to everyone. Recognizing the growing need for professional psychological support, the organization was founded to provide a safe, ethical, and supportive environment where individuals could openly discuss their concerns and receive evidence-based guidance.
                </p>
                <p class="text-muted mb-3">
                    Over the years, we have expanded our services to support children, adolescents, adults, couples, and families facing a wide range of emotional, behavioral, and relationship challenges. Today, Insight Counseling Services Chennai continues to serve clients through multiple locations and online counseling services across India and worldwide.
                </p>
                <p class="text-muted mb-0">
                    Our commitment remains the same—to help individuals improve emotional well-being, strengthen relationships, and build healthier, more balanced lives.
                </p>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <div class="position-relative">
                    <img src="<?= base_url('assets/about_story.jpg') ?>" alt="Insight Counseling Therapy Room - Consultation with Best Therapist in Chennai" class="img-fluid w-100 rounded-5 shadow-lg border">
                    <div class="position-absolute bottom-0 start-0 m-4 p-3 bg-white rounded-4 shadow d-none d-sm-block">
                        <span class="h4 fw-bold text-primary mb-0 d-block">10+ Years</span>
                        <span class="small text-muted">Empowering Lives in Chennai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Founder Section -->
<section class="section-padding bg-white" id="founder">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="text-center position-relative">
                    <img src="<?= base_url('assets/about-img.png') ?>" alt="Mrs. Lekha Edwin - Best Female Psychologist in Chennai & Founder of Insight Counseling Services" class="img-fluid w-100 rounded-5 shadow-lg border">
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">LEADERSHIP & CLINICAL EXPERTISE</h6>
                <h2 class="fw-bold text-dark mb-1">Meet Our Founder</h2>
                <h4 class="text-primary mb-3">Mrs. Lekha Edwin</h4>
                <div class="title-underline mb-4"></div>

                <p class="text-muted mb-3">
                    Mrs. Lekha Edwin is the Founder and Counseling Psychologist of Insight Counseling Services Chennai. She began her professional counseling practice in 2015 and has dedicated her career to helping individuals improve their emotional well-being and mental health.
                </p>
                <p class="text-muted mb-3">
                    With 10+ years of professional experience in psychology and counseling, she has worked extensively with adolescents, adults, couples, and families facing challenges related to anxiety, depression, stress, emotional regulation, relationship concerns, parenting issues, grief, and personal development.
                </p>
                <p class="text-muted mb-4">
                    Her counseling approach combines empathy, understanding, and evidence-based psychological interventions to help individuals gain clarity, build resilience, and achieve positive change in their lives.
                </p>

                <!-- Vision Quote -->
                <div class="p-4 rounded-4 bg-primary-subtle border-start border-4 border-primary mb-4">
                    <h6 class="fw-bold text-primary mb-2"><i class="fas fa-quote-left me-2"></i> Her Vision</h6>
                    <p class="text-dark fst-italic mb-0" style="font-size: 1.05rem;">
                        "To create a safe and supportive environment where individuals can better understand themselves, overcome emotional challenges, and build healthier, more meaningful lives."
                    </p>
                </div>
            </div>
        </div>

        <!-- Founder's Expertise & Highlights -->
        <div class="row g-4 mt-4">
            <!-- Areas of Expertise -->
            <div class="col-lg-6">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm">
                    <h5 class="fw-bold text-primary mb-3"><i class="fas fa-bullseye me-2"></i> Areas of Expertise</h5>
                    <div class="d-flex flex-wrap gap-2 ms-2 ms-md-4">
                        <?php if (!empty($services)): ?>
                            <?php foreach ($services as $srv): ?>
                                <a href="<?= base_url('services/' . esc($srv['slug'])) ?>" class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill text-decoration-none shadow-sm hover-lift" style="transition: all 0.2s ease;">
                                    <i class="fas fa-check-circle me-1"></i> <?= esc($srv['title']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Anxiety Counselling</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Depression Counselling</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Stress Management</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Anger Management</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Adolescent Counselling</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Couple Counselling</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Relationship Counselling</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Parenting Guidance</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Grief Counselling</span>
                            <span class="badge bg-primary-subtle text-primary p-2 px-3 fs-6 rounded-pill"><i class="fas fa-check-circle me-1"></i> Emotional Well-Being</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Professional Highlights -->
            <div class="col-lg-6">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm">
                    <h5 class="fw-bold text-primary mb-3"><i class="fas fa-award me-2"></i> Professional Highlights</h5>
                    <ul class="list-unstyled mb-0 ms-4">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-muted"><strong>Practicing Psychologist</strong> since 2015</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-muted"><strong>Founder</strong> of Insight Counseling Services Chennai since 2016</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-muted"><strong>10+ Years</strong> of Professional Counseling Experience</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-muted">Extensive experience working with Children, Adolescents, Adults, Couples, and Families</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-muted">Conducted Mental Health Awareness Programs, Workshops, and Counseling Initiatives</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team of Psychologists Section -->
<section class="section-padding bg-primary-subtle text-center">
    <div class="container">
        <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">OUR DEDICATED TEAM</h6>
        <h2 class="fw-bold mb-3 text-dark">Our Team of Psychologists</h2>
        <p class="text-muted mb-4 fs-6 mx-auto" style="max-width: 800px;">
            At Insight Counseling Services Chennai, we are proud to have a team of dedicated psychologists and mental health professionals who are passionate about supporting emotional wellness and personal growth.
        </p>

        <?php if (!empty($team)): ?>
            <!-- Swiper Slider Container -->
            <div class="position-relative px-md-4 mt-4">
                <div class="swiper teamSwiper pb-5">
                    <div class="swiper-wrapper">
                        <?php foreach ($team as $member): ?>
                            <div class="swiper-slide h-auto">
                                <div class="team-card bg-white h-100 d-flex flex-column justify-content-between p-4 rounded-4 shadow-sm border text-start mt-2">
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
        <?php endif; ?>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">WHY CHOOSE US</h6>
            <h2 class="fw-bold text-dark">Why Choose Insight Counseling Services Chennai?</h2>
            <div class="title-underline mx-auto"></div>
        </div>

        <div class="row g-4">
            <!-- Reason 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm hover-top transition">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-user-clock fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">10+ Years Experience</h5>
                    <p class="text-muted mb-0">With more than a decade of experience in counseling and mental health support, we have helped individuals and families navigate emotional concerns.</p>
                </div>
            </div>

            <!-- Reason 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm hover-top transition">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-user-md fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Experienced Team</h5>
                    <p class="text-muted mb-0">Our team consists of qualified professionals dedicated to providing high-quality, compassionate mental health support.</p>
                </div>
            </div>

            <!-- Reason 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm hover-top transition">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-user-shield fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Confidential & Ethical</h5>
                    <p class="text-muted mb-0">We maintain strict confidentiality and professional ethical standards to ensure a safe, trusting counseling environment.</p>
                </div>
            </div>

            <!-- Reason 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm hover-top transition">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-hand-holding-heart fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Personalized Care</h5>
                    <p class="text-muted mb-0">Every counseling plan is tailored to the unique needs, personal goals, and specific circumstances of the individual.</p>
                </div>
            </div>

            <!-- Reason 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm hover-top transition">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-brain fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Evidence-Based Approach</h5>
                    <p class="text-muted mb-0">Our counseling interventions are guided by established psychological principles and proven therapeutic techniques.</p>
                </div>
            </div>

            <!-- Reason 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 rounded-4 border bg-white h-100 shadow-sm hover-top transition">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-circle mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-laptop-house fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Online & In-Person</h5>
                    <p class="text-muted mb-0">We offer flexible consultation options across Chennai clinics and global online sessions for max accessibility.</p>
                </div>
            </div>

            <!-- Reason 7 -->
            <div class="col-md-12 col-lg-12">
                <div class="p-4 rounded-4 border bg-primary-subtle text-center shadow-sm">
                    <h5 class="fw-bold text-primary mb-2"><i class="fas fa-heart me-2"></i> Compassionate & Supportive Environment</h5>
                    <p class="text-dark mb-0 max-w-700 mx-auto">We provide a non-judgmental, warm space where individuals can openly discuss their concerns and work towards meaningful change.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call To Action (Begin Your Journey) -->
<section class="section-padding bg-primary-color text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3 text-white">Begin Your Journey Towards Emotional Well-Being</h2>
        <p class="fs-6 text-white mb-4">
            Seeking support is a positive step toward emotional wellness. At Insight Counseling Services Chennai, our team is committed to helping individuals overcome challenges, build resilience, strengthen relationships, and lead healthier, more fulfilling lives.
        </p>
        <p class="small text-white mb-4">
            Whether you are searching for the Best Psychologist in Chennai, a trusted Therapist in Chennai, or professional Counseling Services Chennai, we are here to support you.
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3 align-items-center">
            <a href="tel:<?= preg_replace('/\s+/', '', $settings['phone'] ?? '9445662922') ?>" class="btn btn-secondary px-4 py-3 rounded-pill">
                <i class="fas fa-phone me-2"></i> <?= esc($settings['phone'] ?? '9445662922') ?>
            </a>
            <a href="mailto:<?= esc($settings['email'] ?? 'lekhapsy@gmail.com') ?>" class="btn btn-outline-light px-4 py-3 rounded-pill">
                <i class="fas fa-envelope me-2"></i> <?= esc($settings['email'] ?? 'lekhapsy@gmail.com') ?>
            </a>
            <?php if (!empty($settings['booking_url'])): ?>
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn btn-secondary px-4 py-3 rounded-pill">
                    <i class="fas fa-calendar-check me-2"></i> Book Your Consultation
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Locations We Serve Section -->
<section class="section-padding bg-primary-subtle">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">ACCESSIBLE CARE NEAR YOU & WORLDWIDE</h6>
                <h2 class="fw-bold text-dark mb-3">Locations We Serve</h2>
                <p class="text-muted mb-4">
                    Insight Counseling Services provides convenient, accessible care across major hubs in Chennai as well as worldwide online consultation.
                </p>
                <img src="<?= base_url('assets/about_locations.png') ?>" alt="Insight Counseling Services Clinic Locations - Best Psychologist in Chennai Centers in Porur, Kovur & Vadapalani" class="img-fluid rounded-5 shadow border">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="d-flex flex-column gap-3">
                    <!-- Vadapalani -->
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <h5 class="fw-bold text-primary mb-1"><i class="fas fa-map-marker-alt me-2 text-danger"></i> Vadapalani</h5>
                        <p class="text-muted small mb-0">Serving clients from Saligramam, Virugambakkam, KK Nagar, Vadapalani, Kodambakkam, Valasaravakkam, and nearby areas.</p>
                    </div>

                    <!-- Kovur -->
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <h5 class="fw-bold text-primary mb-1"><i class="fas fa-map-marker-alt me-2 text-danger"></i> Kovur</h5>
                        <p class="text-muted small mb-0">Serving clients from Porur, Mangadu, Kundrathur, Gerugambakkam, Moulivakkam, Iyyappanthangal, and surrounding locations.</p>
                    </div>

                    <!-- Porur -->
                    <div class="p-4 rounded-4 bg-white border shadow-sm">
                        <h5 class="fw-bold text-primary mb-1"><i class="fas fa-map-marker-alt me-2 text-danger"></i> Porur</h5>
                        <p class="text-muted small mb-0">Serving clients from Ramapuram, Mugalivakkam, Manapakkam, Valasaravakkam, Gerugambakkam, and nearby areas.</p>
                    </div>

                    <!-- Online Counseling Services -->
                    <div class="p-4 rounded-4 bg-primary-color text-white shadow">
                        <h5 class="fw-bold text-white mb-3"><i class="fas fa-globe me-2 text-white"></i> Online Counseling Services</h5>
                        <p class="text-white small mb-0">Professional online counseling sessions are available for clients worldwide, providing accessible and confidential mental health support regardless of location.</p>
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
                        <p class="profile-about-text" id="modal-about"></p>

                        <div id="modal-buttons" class="d-flex flex-column gap-2 mt-3">
                            <button class="btn-book-profile" onclick="window.open('<?= esc($settings['booking_url'] ?? 'https://insightcounselings.com/bookings/') ?>', '_blank')">
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
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Swiper for Team Members Carousel
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
                navigation: {
                    nextEl: '.team-button-next',
                    prevEl: '.team-button-prev',
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

        // Team Profile Modal Setup
        const teamMembers = <?= json_encode(!empty($team) ? $team : []) ?>;
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
                    document.getElementById('modal-about').textContent = member.about;
                    
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
                                window.open('<?= esc($settings["booking_url"] ?? "https://insightcounselings.com/bookings/") ?>', '_blank');
                            };
                            modalButtonsContainer.appendChild(defaultBtn);
                        }
                    }
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>

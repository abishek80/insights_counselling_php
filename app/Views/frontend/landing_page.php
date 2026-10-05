<?php 
helper('settings'); 
$settings = get_settings(); 
$branchListStr = 'Kovur, Porur &amp; Vadapalani';
if (!empty($branches)) {
    $names = array_map(function($b) {
        return esc(trim(str_replace([' Center', ' Branch'], '', $b['name'])));
    }, $branches);
    if (count($names) === 1) {
        $branchListStr = $names[0];
    } else if (count($names) > 1) {
        $last = array_pop($names);
        $branchListStr = implode(', ', $names) . ' &amp; ' . $last;
    }
}
?>
<?= $this->extend('frontend/landing_page_layout') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section class="hero-section" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-center g-4 text-center">
            <div class="col-lg-9 col-xl-8 mx-auto">
                <h1 class="hero-title fw-bold">Best Psychologist Near You in <span>Chennai</span></h1>
                <p class="hero-subtext mx-auto mb-2">Confidential, professional, and non-judgmental counseling to help you overcome anxiety, depression, stress, relationship concerns, parenting challenges, and teen issues - available in-person at <?= $branchListStr ?> in Chennai, or online.</p>
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn btn-secondary px-4 py-2 px-lg-4 py-lg-3 fw-bold d-inline-flex align-items-center mt-3">
                    Book Your Consultation <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="section-padding bg-white" id="about">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
                <p class="h6 text-primary-color fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">ABOUT US</p>
                <h2 class="about-founder-title fw-bold mb-3">Insight Counseling Services</h2>
                <div class="title-underline mx-auto mb-4"></div>
                <div class="about-content">
                    <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.8;">Looking for the best psychologist in Chennai? Insight Counseling Services Chennai provides confidential and professional counseling for anxiety, depression, stress, OCD, intrusive thoughts, relationship problems, marital conflicts, parenting stress, and teen emotional issues. Our experienced psychologists offer personalized, evidence-based therapy in a safe and supportive environment. We help individuals, couples, and families improve emotional well-being, build resilience, and develop healthier coping strategies. Counseling services are available at our Chennai locations and online, making professional mental health support accessible when you need it most.</p>
                    <!-- <p class="h6 text-primary-color fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">VISIT OUR CHENNAI CLINICS</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <?php if (!empty($branches)): ?>
                            <?php foreach ($branches as $branch): ?>
                                <h6 class="h6 text-primary-color fw-semibold bg-primary-subtle px-4 py-2 rounded-pill mb-0"><?= esc($branch['name']) ?></h6>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <h6 class="h6 text-primary-color fw-semibold bg-primary-subtle px-4 py-2 rounded-pill mb-0">Online Sessions</h6>
                    </div> -->
                    <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $settings['phone']) ?>" onclick="return gtag_report_phone_conversion(this.href);" class="btn btn-primary px-4 py-3 fw-bold rounded-pill shadow-sm d-inline-flex align-items-center text-decoration-none">
                            <i class="fas fa-phone me-2"></i> Call Us Now
                        </a>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp']) ?>/" onclick="return gtag_report_whatsapp_conversion(this.href);" target="_blank" rel="noopener" class="btn btn-success px-4 py-3 fw-bold rounded-pill shadow-sm d-inline-flex align-items-center text-decoration-none" style="background-color: #25D366; border-color: #25D366;">
                            <i class="fab fa-whatsapp me-2 fs-5"></i> Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="section-padding bg-primary-subtle" id="team">
    <span id="teams"></span>
    <div class="container text-center">
        <div class="text-center mb-4">
            <h2 class="fw-bold display-5">Our Team</h2>
            <div class="mx-auto" style="width: 60px; height: 4px; background: var(--primary-color);"></div>
        </div>

        <?php if (!empty($team)): ?>
            <div class="row g-4 justify-content-center mt-2 text-start">
                <?php foreach ($team as $member): ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="team-card bg-white w-100 d-flex flex-column justify-content-between rounded-4 shadow-sm border text-start p-4">
                            <div>
                                <div class="team-img-wrapper mb-3 text-center">
                                    <img src="<?= base_url('assets/team/' . esc($member['image'])) ?>" class="team-img" loading="lazy" decoding="async" alt="<?= esc($member['name']) ?> - Expert Counseling Psychologist & Therapist in Chennai">
                                </div>
                                <h3 class="h5 fw-bold text-dark mb-1 text-center"><?= esc($member['name']) ?></h3>
                                <div class="team-role text-center mb-2"><?= esc($member['role']) ?></div>
                                <p class="team-desc text-muted small mb-2 text-center"><?= esc($member['qualifications']) ?></p>
                                <?php if (!empty($member['languages'])): ?>
                                    <div class="team-langs text-muted small text-center"><?= esc($member['languages']) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex gap-2 justify-content-center flex-column mt-4">
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
                                    <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn-book-now text-center">Book Your Appointment<span class="visually-hidden"> with <?= esc($member['name']) ?></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-muted">No team members registered yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Our Services -->
<section class="section-padding bg-white" id="services">
    <div class="container text-center">
        <div class="text-center mb-4">
            <h2 class="fw-bold display-5">Our Services</h2>
            <div class="mx-auto" style="width: 60px; height: 4px; background: var(--primary-color);"></div>
        </div>
        <?php if (!empty($services)): ?>
            <div class="row g-4 justify-content-center mt-2 text-start">
                <?php foreach ($services as $service): ?>
                    <?php 
                    $sTitle = $service['landing_title'] ?? '';
                    $sShortDesc = $service['landing_short_description'] ?? '';
                    $sDesc = $service['landing_description'] ?? '';

                    $bullets = [];
                    if (!empty($service['landing_bullet_points'])) {
                        $dec = json_decode($service['landing_bullet_points'], true);
                        if (is_array($dec)) {
                            $bullets = $dec;
                        } else {
                            $bullets = array_filter(array_map('trim', explode("\n", $service['landing_bullet_points'])));
                        }
                    }
                    $validBullets = array_filter(array_map('trim', $bullets));
                    $hasModalContent = !empty(trim((string)$sDesc)) || !empty($validBullets);
                    ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="service-card h-100 d-flex justify-content-between flex-column text-start w-100 bg-primary-subtle border rounded-4 shadow-sm">
                            <div>
                                <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" class="card-img-top rounded-3" loading="lazy" decoding="async" alt="<?= esc($sTitle) ?> - Counselling in Chennai">
                                <h3 class="h5 fw-bold mt-3 mb-2"><?= esc($sTitle) ?></h3>
                                <p class="mb-0 text-muted small"><?= esc($sShortDesc) ?></p>
                            </div>
                            <div class="d-flex gap-2 flex-column text-center justify-content-between mt-3">
                                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn-book-now text-decoration-none">BOOK YOUR APPOINTMENT<span class="visually-hidden"> for <?= esc($sTitle) ?></span></a>
                                <?php if ($hasModalContent): ?>
                                    <a href="javascript:void(0);" class="text-dark text-center d-block mt-2 text-decoration-none" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#serviceModal"
                                            data-title="<?= esc($sTitle) ?>"
                                            data-desc="<?= esc($sDesc) ?>"
                                            data-bullets="<?= esc(json_encode(array_values($validBullets))) ?>">
                                        Read More
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-muted">No services categories configured yet.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Testimonials -->
<section class="section-padding bg-primary-subtle" id="testimonials">
    <span id="testimonial"></span>
    <div class="container">
        <div class="text-center mb-4 mb-lg-5">
            <h2 class="fw-bold display-5">Our Clients Love Us</h2>
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
                                    <div class="mb-2 mt-2 text-warning" style="font-size: 1rem;">
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
                                                <p class="h6 mb-0 fw-bold"><?= esc($testimonial['client_name']) ?></p>
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
    </div>
</section>

<!-- Get in Touch -->
<section class="section-padding bg-white" id="contact">
    <div class="container">
        <div class="text-center mb-3">
            <h2 class="fw-bold display-5">Get in Touch</h2>
            <p class="text-muted mb-4 mx-auto" style="max-width: 600px;">Whether you have a question about our services or are ready to book a session, we are here to support you across multiple locations in Chennai.</p>
        </div>

        <!-- Location Cards -->
        <div class="row g-4 justify-content-center">
            <?php if (!empty($branches)): ?>
                <?php foreach ($branches as $branch): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-card bg-primary-subtle h-100 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="h5 fw-bold mb-2"><?= esc($branch['name']) ?></h3>
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
                                    <a href="<?= esc($branch['map_url']) ?>" target="_blank" rel="noopener" class="text-primary-color fw-bold text-decoration-none">GET DIRECTIONS<span class="visually-hidden"> to <?= esc($branch['name']) ?></span> <i class="fas fa-external-link-alt ms-1"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">No branch locations available at the moment.</div>
            <?php endif; ?>
        </div>

        <!-- Quick Enquiry & Call-to-Action Section -->
        <div class="card border-0 rounded-4 shadow-sm bg-primary-color p-4 p-lg-5 text-center mt-5">
            <h2 class="fw-bold text-white mb-3">Ready to Start Your Therapeutic Journey?</h2>
            <p class="text-white mb-5 mx-auto" style="max-width: 700px; font-size: 1rem;">
                Connect with our experienced counseling psychologists in Chennai today. Confidential in-person sessions available in Kovur, Porur & Vadapalani, or schedule an online session from anywhere.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn btn-secondary px-4 py-3 fw-bold rounded-pill shadow-sm d-inline-flex align-items-center text-decoration-none">
                    <i class="fas fa-calendar-check me-2"></i> Book Your Consultation
                </a>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $settings['phone']) ?>" onclick="return gtag_report_phone_conversion(this.href);" class="btn btn-outline-light px-4 py-3 fw-bold rounded-pill shadow-sm d-inline-flex align-items-center text-decoration-none">
                    <i class="fas fa-phone me-2"></i> Call Us Now
                </a>
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp']) ?>/" onclick="return gtag_report_whatsapp_conversion(this.href);" target="_blank" rel="noopener" class="btn btn-success px-4 py-3 fw-bold rounded-pill shadow-sm d-inline-flex align-items-center text-decoration-none" style="background-color: #25D366; border-color: #25D366;">
                    <i class="fab fa-whatsapp me-2 fs-5"></i> Chat on WhatsApp
                </a>
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
                        <p class="h2 fw-bold mb-1" id="modal-name"></p>
                        <div class="profile-role" id="modal-role"></div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon d-none d-lg-flex">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="profile-detail-content">
                                <p class="h6">Qualifications</p>
                                <p id="modal-qual"></p>
                            </div>
                        </div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon d-none d-lg-flex">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="profile-detail-content">
                                <p class="h6">Languages</p>
                                <p id="modal-langs"></p>
                            </div>
                        </div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon d-none d-lg-flex">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="profile-detail-content">
                                <p class="h6">Specialties</p>
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

<!-- Service Detail Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content modal-service">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="service-modal-header">
                <p class="h2 service-modal-title mb-0" id="modal-service-title">Service Details</p>
            </div>
            <div class="service-modal-body pt-0">
                <p class="service-modal-text" id="modal-service-desc">
                    Service description loading...
                </p>
                <p class="h6 fw-bold mb-3">Key Highlights &amp; Benefits:</p>
                <ul class="service-benefit-list">
                    <!-- Dynamic bullet points inserted via JavaScript -->
                </ul>
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn btn-primary w-100 py-3 rounded-3 fw-bold text-white text-center text-decoration-none">
                    Book Your Consultation <i class="fas fa-calendar-check ms-2"></i>
                </a>
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
                                a.className = `btn ${btn.style || 'btn-primary'} fw-bold py-3 px-4 rounded-3 text-center d-block shadow-sm`;
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

        // Inject dynamic data into Service Detail Modal
        const serviceModal = document.getElementById('serviceModal');
        if (serviceModal) {
            serviceModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                if (!button) return;
                const title = button.getAttribute('data-title') || '';
                const desc = button.getAttribute('data-desc') || '';
                const bulletsStr = button.getAttribute('data-bullets') || '[]';
                
                document.getElementById('modal-service-title').textContent = title;
                
                const descElem = document.getElementById('modal-service-desc');
                if (descElem) {
                    if (desc && desc.trim()) {
                        descElem.textContent = desc;
                        descElem.style.display = 'block';
                    } else {
                        descElem.style.display = 'none';
                    }
                }
                
                let bullets = [];
                try { bullets = JSON.parse(bulletsStr); } catch(e) {}
                
                const highlightsHeading = serviceModal.querySelector('.service-modal-body .h6, .service-modal-body h6');
                const listContainer = serviceModal.querySelector('.service-benefit-list');
                
                if (listContainer) {
                    listContainer.innerHTML = '';
                    const validBullets = Array.isArray(bullets) ? bullets.filter(b => b && b.trim()) : [];
                    if (validBullets.length > 0) {
                        if (highlightsHeading) highlightsHeading.style.display = 'block';
                        listContainer.style.display = 'block';
                        validBullets.forEach(b => {
                            const li = document.createElement('li');
                            li.innerHTML = `<i class="fas fa-check-circle text-primary me-2"></i> ${b}`;
                            listContainer.appendChild(li);
                        });
                    } else {
                        if (highlightsHeading) highlightsHeading.style.display = 'none';
                        listContainer.style.display = 'none';
                    }
                }
            });
        }
    })();
</script>

<?= $this->endSection() ?>

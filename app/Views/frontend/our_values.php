<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title / Hero Header -->
<section class="page-header text-center">
    <div class="container">
        <h1 class="fw-bold">Our Values</h1>
        <p class="lead text-white-50 max-w-75 mx-auto">
            The core principles that guide our practice, our counselors, and our commitment to your mental health and emotional well-being.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Values</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Values Section Body -->
<section class="section-padding bg-light position-relative">
    <div class="container">
        
        <!-- Intro Hero Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 text-center bg-white">
                    <span class="badge bg-primary-subtle text-primary-color px-3 py-2 rounded-pill fw-semibold mx-auto mb-3" style="width: fit-content;">
                        <i class="fas fa-heart me-1"></i> Our Core Philosophy
                    </span>
                    <h2 class="h3 fw-bold text-primary-color mb-3">At the Heart of Everything We Do</h2>
                    <p class="text-secondary lead fs-6 mb-0" style="line-height: 1.8;">
                        At <strong>Insight Counseling Services</strong>, our values are at the heart of everything we do. They guide the way we interact with clients, make professional decisions, and provide counseling services. We are committed to creating a safe, supportive, and ethical environment where individuals can explore their concerns, develop self-awareness, and work toward meaningful personal growth.
                    </p>
                </div>
            </div>
        </div>

        <!-- 11 Core Values Grid -->
        <div class="row g-4">
            
            <!-- Value 1: Respect and Dignity -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-hands-holding-heart fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Respect and Dignity</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We believe that every individual deserves to be treated with respect, kindness, and dignity. We honor each person's unique experiences, perspectives, cultural background, beliefs, and life journey. Our goal is to create an environment where clients feel valued, accepted, and understood.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 2: Compassion and Empathy -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-heart-pulse fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Compassion and Empathy</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We recognize that seeking support can be a difficult step. We approach every client with empathy, warmth, and genuine care. By listening without judgment and striving to understand each person's experiences, we aim to provide a space where healing and growth can take place.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 3: Confidentiality and Trust -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-user-shield fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Confidentiality and Trust</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                Trust is the foundation of an effective counseling relationship. We are committed to protecting our clients' privacy and maintaining confidentiality in accordance with professional ethical standards and applicable laws. We work to create a safe space where clients can openly share their thoughts, emotions, and experiences.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 4: Integrity and Professional Ethics -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-scale-balanced fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Integrity and Professional Ethics</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We uphold the highest standards of honesty, transparency, and ethical practice. We are committed to acting with professionalism, maintaining appropriate boundaries, and ensuring that our services are delivered responsibly and ethically at all times.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 5: Client-Centered Care -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-user-check fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Client-Centered Care</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We understand that every individual is unique. We respect each client's goals, values, strengths, and personal circumstances. Our counseling approach is tailored to meet individual needs, recognizing that there is no one-size-fits-all path to growth and well-being.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 6: Professional Excellence -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-award fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Professional Excellence</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We are committed to providing high-quality counseling services through continuous learning, professional development, and evidence-based practices. We strive to stay informed about current research and best practices in mental health care to serve our clients effectively.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 7: Inclusivity and Acceptance -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-globe fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Inclusivity and Acceptance</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We welcome individuals from all backgrounds and strive to create an environment that is inclusive, respectful, and free from discrimination. We value diversity and are committed to providing services that honor and respect individual differences.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 8: Empowerment and Personal Growth -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-seedling fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Empowerment and Personal Growth</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We believe that individuals possess strengths and abilities that can support positive change. Our role is to help clients recognize their potential, build resilience, develop coping skills, and make informed decisions that align with their personal values and goals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 9: Collaboration and Partnership -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-handshake fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Collaboration and Partnership</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                Counseling is a collaborative process. We view the therapeutic relationship as a partnership in which counselor and client work together toward meaningful goals. We encourage open communication, mutual respect, and active participation throughout the counseling journey.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 10: Commitment to Well-Being -->
            <div class="col-md-6 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-spa fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Commitment to Well-Being</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                The well-being of our clients is our highest priority. We are dedicated to supporting emotional, psychological, and personal wellness while helping individuals navigate challenges, strengthen relationships, and improve their overall quality of life.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value 11: Creating a Safe and Supportive Space -->
            <div class="col-md-12 col-lg-12">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-all hover-lift bg-white">
                    <div class="d-flex align-items-start">
                        <div class="icon-box rounded-3 bg-primary-color text-white p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                            <i class="fas fa-shield-heart fs-4"></i>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold text-primary-color mb-2">Creating a Safe and Supportive Space</h4>
                            <p class="text-secondary mb-0" style="line-height: 1.7;">
                                We are committed to fostering an environment where clients feel emotionally safe, respected, and heard. We strive to provide a non-judgmental space where individuals can express themselves openly and explore their concerns with confidence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Outro Summary Banner -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="p-4 p-md-5 rounded-4 text-white text-center shadow-lg" style="background-color: var(--primary-color, #2D2A70);">
                    <h3 class="fw-bold mb-3 text-white">Our Promise to You</h3>
                    <p class="lead text-white-50 mb-4 max-w-75 mx-auto" style="line-height: 1.8;">
                        At Insight Counseling Services, these values are more than guiding principles—they are the foundation of our practice and the commitment we make to every individual who seeks our support.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="<?= esc($settings['booking_url'] ?? base_url('contact')) ?>" target="_blank" rel="noopener" class="btn btn-light rounded-4 px-4 py-3 fw-bold text-primary-color shadow-sm">
                            <i class="fas fa-calendar-check me-2 text-primary-color"></i> Book Your Consultation
                        </a>
                        <a href="https://wa.me/<?= esc($settings['whatsapp'] ?? '919445662922') ?>/" target="_blank" class="btn btn-outline-light rounded-4 px-4 py-3 fw-bold">
                            <i class="fab fa-whatsapp me-2"></i> Chat with Us on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>

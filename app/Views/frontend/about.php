<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>About Us</h1>
        <p>Learn about our vision, mission, and the founder of Insight Counseling Services.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Founder Profile Detail -->
<section class="section-padding bg-white" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <img src="<?= base_url('assets/about-img.png') ?>" alt="Lekha Edwin" class="img-fluid w-100 rounded-5 shadow-lg border">
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

<!-- 3 Boxes -->
<section class="section-padding bg-white p-0">
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

<!-- How we help you -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <img src="<?= base_url('assets/service.png') ?>" alt="How we help you" class="img-fluid w-100 rounded-5 shadow-lg border">
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary-color fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">HOW WE HELP YOU</h6>
                <h2 class="how-we-help-title">Guiding you through life's challenges.</h2>
                <p class="text-muted mb-5">Our team of experts is dedicated to providing you with the best possible support and guidance to help you navigate life's challenges. We combine clinical expertise with a deeply human approach.</p>

                <div class="d-flex align-items-start mb-4">
                    <div class="help-icon-box bg-body-secondary">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <div>
                        <h5 class="help-feature-title">Expert Guidance</h5>
                        <p class="help-feature-desc mb-0">Our team of experts is dedicated to providing you with the best possible support through evidence-based interventions.</p>
                    </div>
                </div>

                <div class="d-flex align-items-start">
                    <div class="help-icon-box bg-body-secondary">
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

<?= $this->endSection() ?>

<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title / Hero Header -->
<section class="page-header text-center">
    <div class="container">
        <h1 class="fw-bold">Mental Health Helplines</h1>
        <p class="lead max-w-75 mx-auto">
            Emergency crisis support, 24/7 tele-mental health assistance, and confidential helpline resources for Chennai, Tamil Nadu & across India.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Helpline Details</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="section-padding bg-light">
    <div class="container">

        <!-- Intro Callout -->
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white">
            <div class="d-flex align-items-start">
                <div class="icon-box rounded-circle bg-danger-subtle p-3 me-3 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="fas fa-hand-holding-medical fs-3" style="color: #dc3545 !important;"></i>
                </div>
                <div>
                    <h2 class="h4 fw-bold text-dark mb-2">Mental Health Helplines – Chennai & Tamil Nadu</h2>
                    <p class="text-secondary lead fs-6 mb-0" style="line-height: 1.8;">
                        If you are experiencing emotional distress, anxiety, depression, suicidal thoughts, or a mental health crisis, please reach out for immediate support. The following organizations provide confidential assistance and crisis support.
                    </p>
                </div>
            </div>
        </div>

        <!-- 24/7 Mental Health Support -->
        <div class="mb-5">
            <h3 class="h4 fw-bold text-primary-color mb-4 d-flex align-items-center">
                <span class="badge bg-primary-color text-white me-2 p-2 rounded-3"><i class="fas fa-headset"></i></span>
                24/7 Mental Health Support
            </h3>

            <div class="row g-4">
                <!-- Tele-MANAS -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="h5 fw-bold text-dark mb-1">Tele-MANAS</h4>
                                <span class="badge bg-success-subtle text-success fw-semibold">Government of India</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary-color px-3 py-2 rounded-pill">24/7 Free</span>
                        </div>
                        <p class="text-secondary mb-3">
                            A free, confidential, 24/7 national tele-mental health helpline available across India.
                        </p>
                        <div class="d-flex flex-wrap gap-2 mt-auto">
                            <a href="tel:14416" class="btn btn-primary rounded-3 px-3 py-2 fw-bold me-2">
                                <i class="fas fa-phone me-2"></i>Call 14416
                            </a>
                            <a href="tel:18008914416" class="btn btn-secondary rounded-3 px-3 py-2 fw-semibold">
                                <i class="fas fa-phone me-2"></i>1-800-891-4416
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 104 Health Helpline -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="h5 fw-bold text-dark mb-1">104 Health Helpline</h4>
                                <span class="badge bg-success-subtle text-success fw-semibold">Tamil Nadu Government</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary-color px-3 py-2 rounded-pill">24 Hours</span>
                        </div>
                        <p class="text-secondary mb-3">
                            Provides tele-health guidance, counseling support, stress management assistance, and suicide prevention support. Available 24 hours a day.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:104" class="btn btn-primary rounded-3 px-4 py-2 fw-bold">
                                <i class="fas fa-phone me-2"></i>Call 104
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chennai-Based Crisis Support -->
        <div class="mb-5">
            <h3 class="h4 fw-bold text-primary-color mb-4 d-flex align-items-center">
                <span class="badge bg-primary-color text-white me-2 p-2 rounded-3"><i class="fas fa-map-marker-alt"></i></span>
                Chennai-Based Crisis Support
            </h3>

            <div class="row g-4">
                <!-- Sneha Suicide Prevention Centre -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <h4 class="h5 fw-bold text-dark mb-2">Sneha Suicide Prevention Centre, Chennai</h4>
                        <p class="text-secondary mb-3">
                            One of Chennai's leading suicide prevention and emotional support organizations. Confidential support is available for individuals experiencing emotional distress, loneliness, depression, or suicidal thoughts. Services are free and confidential.
                        </p>
                        <div class="d-flex flex-wrap gap-2 mt-auto">
                            <a href="tel:04424640050" class="btn btn-outline-danger rounded-3 px-3 py-2 fw-bold">
                                <i class="fas fa-phone me-2"></i>044-24640050
                            </a>
                            <a href="tel:04424640060" class="btn btn-outline-danger rounded-3 px-3 py-2 fw-bold">
                                <i class="fas fa-phone me-2"></i>044-24640060
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Jeevan Suicide Prevention Hotline -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <h4 class="h5 fw-bold text-dark mb-2">Jeevan Suicide Prevention Hotline</h4>
                        <p class="text-secondary mb-3">
                            Provides crisis intervention and suicide prevention support in Chennai.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:04426564444" class="btn btn-outline-danger rounded-3 px-4 py-2 fw-bold">
                                <i class="fas fa-phone me-2"></i>044-2656 4444
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- National Crisis Support Services -->
        <div class="mb-5">
            <h3 class="h4 fw-bold text-primary-color mb-4 d-flex align-items-center">
                <span class="badge bg-primary-color text-white me-2 p-2 rounded-3"><i class="fas fa-globe-asia"></i></span>
                National Crisis Support Services
            </h3>

            <div class="row g-4">
                <!-- AASRA -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <h4 class="h5 fw-bold text-dark mb-2">AASRA</h4>
                        <p class="text-secondary mb-3">
                            Provides emotional support and crisis intervention for individuals experiencing distress or suicidal thoughts.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:+919820466726" class="btn btn-secondary rounded-3 px-3 py-2 fw-bold w-100 text-center">
                                <i class="fas fa-phone me-2"></i>+91 9820466726
                            </a>
                        </div>
                    </div>
                </div>

                <!-- NIMHANS -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <h4 class="h5 fw-bold text-dark mb-2">NIMHANS Helpline</h4>
                        <p class="text-secondary mb-3">
                            Mental health support provided by the National Institute of Mental Health and Neurosciences.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:08046110007" class="btn btn-secondary rounded-3 px-3 py-2 fw-bold w-100 text-center">
                                <i class="fas fa-phone me-2"></i>080-46110007
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Vandrevala Foundation -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <h4 class="h5 fw-bold text-dark mb-2">Vandrevala Foundation</h4>
                        <p class="text-secondary mb-3">
                            24/7 emotional support and mental health assistance across India.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:+919999666655" class="btn btn-secondary rounded-3 px-3 py-2 fw-bold w-100 text-center">
                                <i class="fas fa-phone me-2"></i>+91 99996 66655
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Women and Child Support -->
        <div class="mb-5">
            <h3 class="h4 fw-bold text-primary-color mb-4 d-flex align-items-center">
                <span class="badge bg-primary-color text-white me-2 p-2 rounded-3"><i class="fas fa-user-shield"></i></span>
                Women and Child Support
            </h3>

            <div class="row g-4">
                <!-- Women's Helpline -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="h5 fw-bold text-dark mb-0">Women's Helpline</h4>
                            <span class="badge bg-danger-subtle text-danger">24-Hour</span>
                        </div>
                        <p class="text-secondary mb-3">
                            24-hour support for women in distress.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:181" class="btn btn-primary rounded-3 px-4 py-2 fw-bold">
                                <i class="fas fa-phone me-2"></i>Call 181
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Childline -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="h5 fw-bold text-dark mb-0">Childline</h4>
                            <span class="badge bg-danger-subtle text-danger">24-Hour Emergency</span>
                        </div>
                        <p class="text-secondary mb-3">
                            24-hour emergency support for children and adolescents in need of assistance.
                        </p>
                        <div class="mt-auto">
                            <a href="tel:1098" class="btn btn-primary rounded-3 px-4 py-2 fw-bold">
                                <i class="fas fa-phone me-2"></i>Call 1098
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency Assistance Box -->
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-danger text-white mb-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold text-white mb-2"><i class="fas fa-exclamation-triangle me-2"></i>Emergency Assistance</h3>
                    <p class="lead text-white mb-3" style="line-height: 1.6;">
                        If you believe you are at immediate risk of harming yourself or someone else:
                    </p>
                    <div class="d-flex flex-wrap gap-3 mt-3 mb-4">
                        <a href="tel:112" class="btn btn-light text-danger fw-bold rounded-3 px-4 py-2">
                            <i class="fas fa-phone me-2"></i>Emergency Response: 112
                        </a>
                        <a href="tel:108" class="btn btn-outline-light fw-bold rounded-3 px-4 py-2">
                            <i class="fas fa-ambulance me-2"></i>Ambulance: 108
                        </a>
                    </div>
                    <p class="text-white mb-0 small">
                        Or visit the nearest hospital emergency department immediately.
                    </p>
                </div>
            </div>
        </div>

        <!-- Important Notice -->
        <div class="alert alert-warning border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold text-dark mb-2"><i class="fas fa-info-circle me-2"></i>Important Notice</h5>
            <p class="mb-0 text-dark">
                Insight Counseling Services does not provide 24-hour crisis intervention or emergency services. If you require immediate assistance, please contact one of the helplines listed above or seek emergency medical care.
            </p>
        </div>

    </div>
</section>

<?= $this->endSection() ?>

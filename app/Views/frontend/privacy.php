<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Privacy Policy</h1>
        <p>How we handle and protect your personal and medical details.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Document Body -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-muted" style="line-height: 1.8; font-size: 1.05rem;">
            <p class="mb-4">At Insight Counseling Services, we are committed to protecting your privacy and maintaining the confidentiality of your personal information. When you visit our website, submit an enquiry, or book an appointment, we may collect information such as your name, phone number, email address, appointment details, and other details necessary to provide our counseling services. We may also collect basic technical information, including your IP address, browser type, and website usage data through cookies and analytics tools to improve your browsing experience.</p>

            <p class="mb-4">The information we collect is used only for appointment scheduling, communication, providing counseling services, sending appointment reminders, improving our website and services, and complying with applicable legal requirements. We understand the importance of confidentiality in mental health services and take appropriate measures to protect your personal information. We do not sell, rent, or share your personal information with third parties for marketing purposes. Information will only be disclosed with your consent or when required by law.</p>

            <p class="mb-4">We implement appropriate security measures to safeguard your data from unauthorized access, misuse, or disclosure. While we make every effort to protect your information, no method of internet transmission or electronic storage is completely secure. By using our website, you agree to the collection and use of your information as described in this Privacy Policy. If you have any questions or wish to access, update, or delete your personal information, please contact us through the details provided on our website.</p>
        
            <div class="row g-4 my-2">
                <!-- Card 1: Need a Quick Response? -->
                <div class="col-md-6">
                    <div class="p-4 p-md-5 rounded-4 text-white position-relative overflow-hidden h-100 d-flex flex-column justify-content-between" style="background-color: var(--primary-color, #2e2a70);">
                        <div>
                            <h4 class="fw-bold mb-3 text-white" style="font-size: 1.5rem;">Need a Quick Response?</h4>
                            <p class="text-white mb-4" style="line-height: 1.6;">
                                WhatsApp is the fastest way to get in touch with our intake team and book your session immediately.
                            </p>
                        </div>
                        <div>
                            <a href="https://wa.me/9445662922/" target="_blank" class="btn btn-light rounded-4 px-4 py-3 fw-bold d-inline-flex align-items-center shadow-sm" style="color: var(--primary-color, #2e2a70); background-color: #ffffff; border: none;">
                                <i class="fab fa-whatsapp me-2 fs-6" style="color: #2e2a70;"></i> Chat on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Direct Channels -->
                <div class="col-md-6">
                    <div class="p-4 p-md-5 rounded-4 text-white h-100 d-flex flex-column justify-content-center" style="background-color: var(--primary-color, #2e2a70);">
                        <h4 class="fw-bold mb-4 text-white" style="font-size: 1.5rem;">Direct Channels</h4>
                        
                        <!-- Email item -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="width: 48px; height: 48px; background: rgba(255, 255, 255, 0.12);">
                                <i class="fas fa-envelope text-white fs-6"></i>
                            </div>
                            <div>
                                <div class="text-white text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">EMAIL US</div>
                                <a href="mailto:insightcounselings@gmail.com" class="text-white fw-bold text-decoration-none" style="font-size: 1.05rem;">insightcounselings@gmail.com</a>
                            </div>
                        </div>

                        <!-- Phone item -->
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="width: 48px; height: 48px; background: rgba(255, 255, 255, 0.12);">
                                <i class="fas fa-phone text-white fs-6"></i>
                            </div>
                            <div>
                                <div class="text-white text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">CALL US</div>
                                <a href="tel:+9445662922" class="text-white fw-bold text-decoration-none" style="font-size: 1.05rem;">+91 94456 62922</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

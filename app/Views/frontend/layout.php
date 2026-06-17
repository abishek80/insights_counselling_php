<?php helper('settings'); $settings = get_settings(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PRIMARY SEO META TAGS -->
    <title><?= $title ?? 'Best Counseling Psychologist in Chennai | Insight Counseling Services' ?></title>
    <meta name="description" content="<?= $meta_desc ?? 'Insight Counseling Services (ICS) – Chennai\'s trusted counseling psychologist. Expert support for anxiety, depression, stress, relationship issues & more.' ?>">
    <meta name="keywords" content="counseling psychologist Chennai, mental health Chennai, anxiety counseling Chennai, depression therapy Chennai, couple counseling Chennai, teen counseling Chennai, online counseling India, Lekha Edwin, Insight Counseling Services">
    <meta name="author" content="Insight Counseling Services">
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon.png') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/favicon.png') ?>">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Main Style -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <!-- Custom inline styles for premium design tweaks -->
    <style>
        .text-primary-color {
            color: #2D2A70 !important;
        }
        .btn-primary {
            background-color: #2D2A70 !important;
            border-color: #2D2A70 !important;
        }
        .btn-primary:hover {
            background-color: #1a184c !important;
            border-color: #1a184c !important;
        }
        .bg-primary-color {
            background-color: #2D2A70 !important;
        }
        /* Style fixes for footer social circles */
        .footer-social-circles a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        .footer-social-circles a:hover {
            background: #fff;
            color: #2D2A70;
            transform: translateY(-3px);
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11346428021"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'AW-11346428021');
    </script>

    <!-- Google Ads Conversion: Phone Call Click -->
    <script>
    function gtag_report_phone_conversion(url) {
        var callback = function () {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'conversion', {
            'send_to': 'AW-11346428021/z7JyCNXBkP4bEPWAs6Iq',
            'event_callback': callback
        });
        return false;
    }
    </script>

    <!-- Google Ads Conversion: WhatsApp Click -->
    <script>
    function gtag_report_whatsapp_conversion(url) {
        var callback = function () {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        };
        gtag('event', 'conversion', {
            'send_to': 'AW-11346428021/KxQPCMnG__0bEPWAs6Iq',
            'event_callback': callback
        });
        return false;
    }
    </script>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-white py-3 sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/logo-dark.png') ?>" alt="Insight Counseling Services" style="height: 60px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url() ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url('about') ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url('services') ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url('team') ?>">Team</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url('faq') ?>">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url('testimonials') ?>">Testimonial</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-primary-color px-3" href="<?= base_url('contact') ?>">Contact Us</a></li>
                </ul>
                <a href="<?= esc($settings['booking_url']) ?>" target="_blank"
                    class="btn btn-primary px-4 fw-bold mt-3 mt-lg-0"
                    style="border-radius: 8px;">Book Your Consultation</a>
            </div>
        </div>
    </nav>

    <!-- Page Content Injection -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <footer>
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <img src="<?= base_url('assets/logo-light.png') ?>" alt="Insight Counseling Services" class="footer-logo-main mb-3" style="max-height: 70px;">
                    <p class="text-white-50 small">
                        Insight Counseling Services (ICS), Chennai established in the year 2014.
                        Providing compassionate, confidential, and evidence-based psychological support for all.
                    </p>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-white fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled text-white-50 small">
                        <li class="mb-2"><a href="<?= base_url() ?>" class="text-reset text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="<?= base_url('about') ?>" class="text-reset text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="<?= base_url('services') ?>" class="text-reset text-decoration-none">Our Services</a></li>
                        <li class="mb-2"><a href="<?= base_url('team') ?>" class="text-reset text-decoration-none">Our Team</a></li>
                        <li class="mb-2"><a href="<?= base_url('faq') ?>" class="text-reset text-decoration-none">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white fw-bold mb-3">Policy & Legal</h5>
                    <ul class="list-unstyled text-white-50 small">
                        <li class="mb-2"><a href="<?= base_url('privacy-policy') ?>" class="text-reset text-decoration-none">Privacy Policy</a></li>
                        <li class="mb-2"><a href="<?= base_url('refund-policy') ?>" class="text-reset text-decoration-none">Refund Policy</a></li>
                        <li class="mb-2"><a href="<?= base_url('terms-and-conditions') ?>" class="text-reset text-decoration-none">Terms and Conditions</a></li>
                        <li class="mb-2"><a href="<?= base_url('contact') ?>" class="text-reset text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white fw-bold mb-3">Connect With Us</h5>
                    <p class="text-white-50 small mb-2"><i class="fas fa-phone me-2"></i> <?= esc($settings['phone']) ?></p>
                    <p class="text-white-50 small mb-3"><i class="fas fa-envelope me-2"></i> <?= esc($settings['email']) ?></p>
                    <div class="footer-social-circles">
                        <?php if (!empty($settings['facebook'])): ?>
                            <a href="<?= esc($settings['facebook']) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($settings['instagram'])): ?>
                            <a href="<?= esc($settings['instagram']) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($settings['youtube'])): ?>
                            <a href="<?= esc($settings['youtube']) ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-white-50 small">
                &copy; <?= date('Y') ?> Insight Counseling Services. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Fixed Action Buttons -->
    <div class="fixed-actions-container">
        <a href="tel:<?= preg_replace('/\s+/', '', $settings['phone']) ?>" class="btn-call-fixed"
           onclick="return gtag_report_phone_conversion('tel:<?= preg_replace('/\s+/', '', $settings['phone']) ?>');">
            <i class="fas fa-phone fs-4"></i>
        </a>
        <a href="https://wa.me/<?= esc($settings['whatsapp']) ?>/" target="_blank" class="btn-whatsapp-fixed"
           onclick="return gtag_report_whatsapp_conversion('https://wa.me/<?= esc($settings['whatsapp']) ?>/');">
            <i class="fab fa-whatsapp fs-4"></i>
            <span class="d-none d-md-block">Chat with us</span>
        </a>
    </div>

    <!-- Script imports -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    
    <!-- SweetAlert2 Premium Notifications -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        <?php if (session()->getFlashdata('success')): ?>
            Toast.fire({
                icon: 'success',
                title: <?= json_encode(session()->getFlashdata('success')) ?>
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            Toast.fire({
                icon: 'error',
                title: <?= json_encode(session()->getFlashdata('error')) ?>
            });
        <?php endif; ?>
    </script>
    
    <!-- Render specific page scripts if needed -->
    <?= $this->renderSection('scripts') ?>
</body>

</html>

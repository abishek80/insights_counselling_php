<?php helper('settings'); $settings = get_settings(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PRIMARY SEO META TAGS -->
    <title><?= esc($title ?? 'Best Counseling Psychologist in Chennai | Insight Counseling Services') ?></title>
    <meta name="description" content="<?= esc($meta_desc ?? 'Insight Counseling Services (ICS) – Chennai\'s trusted counseling psychologist. Expert support for anxiety, depression, stress, relationship issues, teen counseling & more. Online & in-person sessions. Call +91 94456 62922.') ?>">
    <meta name="keywords" content="<?= esc($keywords ?? 'counseling psychologist Chennai, mental health Chennai, anxiety counseling Chennai, depression therapy Chennai, couple counseling Chennai, teen counseling Chennai, online counseling India, Lekha Edwin psychologist, stress management Chennai, relationship counseling, Insight Counseling Services') ?>">
    <meta name="author" content="Insight Counseling Services">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="English">
    <meta name="rating" content="general">

    <!-- CANONICAL URL -->
    <link rel="canonical" href="<?= current_url() ?>">

    <!-- GEO / LOCAL SEO TAGS -->
    <meta name="geo.region" content="IN-TN">
    <meta name="geo.placename" content="Chennai, Tamil Nadu, India">
    <meta name="geo.position" content="13.0827;80.2707">
    <meta name="ICBM" content="13.0827, 80.2707">

    <!-- OPEN GRAPH (Facebook / LinkedIn / WhatsApp) -->
    <meta property="og:type" content="<?= isset($service) ? 'article' : 'website' ?>">
    <meta property="og:site_name" content="Insight Counseling Services">
    <meta property="og:title" content="<?= esc($title ?? 'Best Counseling Psychologist in Chennai | Insight Counseling Services') ?>">
    <meta property="og:description" content="<?= esc($meta_desc ?? 'Professional mental health support in Chennai. Individual, couple & teen counseling by expert psychologists. Online & in-person. Book your session today.') ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:image" content="<?= esc($og_image ?? base_url('assets/og-image.png')) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Insight Counseling Services – Talk. Resolve. Heal.">
    <meta property="og:locale" content="en_IN">

    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= esc($title ?? 'Best Counseling Psychologist in Chennai | Insight Counseling Services') ?>">
    <meta name="twitter:description" content="<?= esc($meta_desc ?? 'Professional mental health support in Chennai. Individual, couple & teen counseling. Online & in-person sessions available.') ?>">
    <meta name="twitter:image" content="<?= esc($og_image ?? base_url('assets/og-image.png')) ?>">
    <meta name="twitter:image:alt" content="Insight Counseling Services Chennai">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon.png') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/favicon.png') ?>">

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1048039874801049');
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1048039874801049&ev=PageView&noscript=1"
    />
    </noscript>
    <!-- End Meta Pixel Code -->

    <!-- JSON-LD STRUCTURED DATA / SCHEMA.ORG MARKUP -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": ["MedicalBusiness", "LocalBusiness", "CounselingService"],
          "@id": "<?= base_url() ?>#organization",
          "name": "Insight Counseling Services",
          "alternateName": "ICS Chennai",
          "url": "<?= base_url() ?>",
          "logo": "<?= base_url('assets/logo-dark.png') ?>",
          "image": "<?= base_url('assets/logo-dark.png') ?>",
          "description": "Insight Counseling Services (ICS) provides compassionate, confidential, and evidence-based psychological counseling and therapy in Chennai since 2014.",
          "telephone": "<?= esc($settings['phone'] ?? '+91-9000000000') ?>",
          "email": "<?= esc($settings['email'] ?? 'contact@insightcounselings.com') ?>",
          "priceRange": "₹₹",
          "medicalSpecialty": "Psychiatric",
          "founder": {
            "@type": "Person",
            "name": "Mrs. Lekha Edwin",
            "jobTitle": "Counseling Psychologist",
            "description": "Leading Counseling Psychologist in Chennai"
          },
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Chennai",
            "addressRegion": "Tamil Nadu",
            "addressCountry": "IN"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 13.0827,
            "longitude": 80.2707
          },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "opens": "09:00",
            "closes": "20:00"
          },
          "sameAs": [
            "<?= esc($settings['facebook'] ?? '') ?>",
            "<?= esc($settings['instagram'] ?? '') ?>",
            "<?= esc($settings['youtube'] ?? '') ?>"
          ]
        },
        {
          "@type": "WebSite",
          "@id": "<?= base_url() ?>#website",
          "url": "<?= base_url() ?>",
          "name": "Insight Counseling Services",
          "description": "Best Counseling Psychologist in Chennai",
          "publisher": {
            "@id": "<?= base_url() ?>#organization"
          },
          "inLanguage": "en-US"
        },
        {
          "@type": "BreadcrumbList",
          "@id": "<?= current_url() ?>#breadcrumb",
          "itemListElement": [
            {
              "@type": "ListItem",
              "position": 1,
              "name": "Home",
              "item": "<?= base_url() ?>"
            }
            <?php if (uri_string() !== '' && uri_string() !== '/'): ?>
            ,{
              "@type": "ListItem",
              "position": 2,
              "name": <?= json_encode(strip_tags($title ?? 'Page')) ?>,
              "item": "<?= current_url() ?>"
            }
            <?php endif; ?>
          ]
        }
        <?php if (!empty($faqs)): ?>
        ,{
          "@type": "FAQPage",
          "@id": "<?= current_url() ?>#faq",
          "mainEntity": [
            <?php 
            $faqItems = [];
            foreach ($faqs as $f) {
                $faqItems[] = '{
                  "@type": "Question",
                  "name": ' . json_encode($f['question']) . ',
                  "acceptedAnswer": {
                    "@type": "Answer",
                    "text": ' . json_encode($f['answer']) . '
                  }
                }';
            }
            echo implode(',', $faqItems);
            ?>
          ]
        }
        <?php endif; ?>
        <?php if (isset($service)): ?>
        ,{
          "@type": "Service",
          "@id": "<?= current_url() ?>#service",
          "name": <?= json_encode($service['title']) ?>,
          "description": <?= json_encode(strip_tags($service['description'] ?? $service['short_description'] ?? '')) ?>,
          "provider": {
            "@id": "<?= base_url() ?>#organization"
          },
          "areaServed": {
            "@type": "City",
            "name": "Chennai"
          },
          "serviceType": "Psychological Counseling"
        }
        <?php endif; ?>
      ]
    }
    </script>

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
        .text-primary-color, .text-primary {
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
        .btn-secondary {
            background-color: #fce28a !important;
            border-color: #2D2A70 !important;
            color: #2D2A70 !important;
            font-weight: 600 !important;
        }
        .btn-secondary:hover {
            background-color: #e5b04a !important;
            border-color: #2D2A70 !important;
            color: #2D2A70 !important;
        }
        .btn-outline-primary {
            color: #2D2A70 !important;
            border-color: #2D2A70 !important;
        }
        .btn-outline-primary:hover {
            background-color: #2D2A70 !important;
            border-color: #2D2A70 !important;
            color: #ffffff !important;
        }
        .bg-primary-color {
            background-color: #2D2A70 !important;
        }
        .bg-primary-subtle {
            background-color: #e8e7f5 !important;
        }
        /* Style fixes for footer social circles */
        .footer-social-circles a {
            text-decoration: auto;
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

    <!-- Header / Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg bg-white py-3 sticky-top shadow-sm" aria-label="Main Navigation">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/logo-dark.png') ?>" alt="Insight Counseling Services Logo" style="height: 60px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url('about') ?>">About</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url('services') ?>">Services</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url('team') ?>">Team</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url('faq') ?>">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url('testimonials') ?>">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url('contact') ?>">Contact Us</a></li>
                    </ul>
                    <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener"
                        class="btn btn-primary px-4 fw-semibold mt-3 mt-lg-0"
                        style="border-radius: 8px;">Book Your Consultation</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Page Content -->
    <main id="main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <img src="<?= base_url('assets/logo-light.png') ?>" alt="Insight Counseling Services" class="footer-logo-main mb-3" style="max-height: 70px;">
                    <p class="text-white pe-0 pe-md-4">
                        Insight Counseling Services (ICS), Chennai established in the year 2014.
                        Providing compassionate, confidential, and evidence-based psychological support for all.
                    </p>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-white fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled text-white ms-3">
                        <li class="mb-2"><a href="<?= base_url() ?>" class="text-reset text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="<?= base_url('about') ?>" class="text-reset text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="<?= base_url('services') ?>" class="text-reset text-decoration-none">Our Services</a></li>
                        <li class="mb-2"><a href="<?= base_url('team') ?>" class="text-reset text-decoration-none">Our Team</a></li>
                        <li class="mb-2"><a href="<?= base_url('faq') ?>" class="text-reset text-decoration-none">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white fw-bold mb-3">Policy & Legal</h5>
                    <ul class="list-unstyled text-white ms-3">
                        <li class="mb-2"><a href="<?= base_url('privacy-policy') ?>" class="text-reset text-decoration-none">Privacy Policy</a></li>
                        <li class="mb-2"><a href="<?= base_url('refund-policy') ?>" class="text-reset text-decoration-none">Refund Policy</a></li>
                        <li class="mb-2"><a href="<?= base_url('our-values') ?>" class="text-reset text-decoration-none">Our Values</a></li>
                        <li class="mb-2"><a href="<?= base_url('helpline-details') ?>" class="text-reset text-decoration-none">Helpline Details</a></li>
                        <li class="mb-2"><a href="<?= base_url('contact') ?>" class="text-reset text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white fw-bold mb-3">Connect With Us</h5>
                    <p class="ms-3 text-white mb-2"><i class="fas fa-phone me-2"></i> <?= esc($settings['phone']) ?></p>
                    <p class="ms-3 text-white mb-3"><i class="fas fa-envelope me-2"></i> <?= esc($settings['email']) ?></p>
                    <div class="ms-3 footer-social-circles gap-1">
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
            <div class="text-center text-white">
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

        document.addEventListener('DOMContentLoaded', () => {
            // Client-side form validation (prevents page refresh when required fields are empty)
            const validationForms = document.querySelectorAll('.needs-validation, form[novalidate]');
            Array.from(validationForms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        if (typeof Toast !== 'undefined') {
                            Toast.fire({
                                icon: 'warning',
                                title: 'Please fill in all required fields.'
                            });
                        }
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
    
    <!-- Render specific page scripts if needed -->
    <?= $this->renderSection('scripts') ?>
</body>

</html>

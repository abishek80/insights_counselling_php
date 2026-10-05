<?php helper('settings'); $settings = get_settings(); ?>
<!DOCTYPE html>
<html lang="en-IN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NL955K4G');</script>
    <!-- End Google Tag Manager -->


    <!-- PRIMARY SEO META TAGS -->
    <title><?= esc($title ?? 'Best Psychologist in Chennai | Insight Counseling Services') ?></title>
    <meta name="description" content="<?= esc($meta_desc ?? 'Best Psychologist in Chennai for Anxiety, Depression, Stress Management, Couple Counselling, Teen Counselling, Family Counselling, and Relationship Issues. Online & In-Person Sessions. Call 9445662922.') ?>">
    <meta name="keywords" content="<?= esc($keywords ?? 'best relationship counselling in chennai, best marriage counseling in chennai, marriage counselor near me, psychologist chennai, good psychologist near me, counseling center near me, psychologist in chennai, psychologist near me, therapist near me, best psychologist in chennai, psychology doctor near me, therapist in chennai, marriage counseling chennai, family counselling near me, child psychologist chennai, counselling psychologist near me, best psychologist chennai, therapist chennai, counselling near me, Lekha Edwin, Insight Counseling Services, psychologist Kovur, psychologist Porur, psychologist Vadapalani') ?>">
    <meta name="author" content="Insight Counseling Services">
    <meta name="robots" content="<?= (!empty($noindex) && $noindex === true) ? 'noindex, nofollow' : 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' ?>">
    <meta name="revisit-after" content="7 days">
    <meta name="rating" content="general">

    <!-- Google tag (gtag.js): Google Ads + Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0RY8V7G7YD"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-0RY8V7G7YD');
      gtag('config', 'AW-11346428021');
    </script>

    <!-- CANONICAL URL (no query string, so ?gclid= ad clicks don't create duplicates) -->
    <link rel="canonical" href="<?= current_url() ?>">

    <!-- THEME / MOBILE -->
    <meta name="theme-color" content="#2D2A70">
    <meta name="format-detection" content="telephone=yes">
    <link rel="manifest" href="<?= base_url('site.webmanifest') ?>">

    <!-- PERFORMANCE: open third-party connections early (Ads landing page experience) -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="<?= base_url('assets/logo-dark.png') ?>">

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
    <meta property="og:image" content="<?= esc($og_image ?? base_url('assets/og-image.jpg')) ?>">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta property="og:image:alt" content="Insight Counseling Services - Talk. Resolve. Heal.">
    <meta property="og:locale" content="en_IN">

    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= esc($title ?? 'Best Counseling Psychologist in Chennai | Insight Counseling Services') ?>">
    <meta name="twitter:description" content="<?= esc($meta_desc ?? 'Professional mental health support in Chennai. Individual, couple & teen counseling. Online & in-person sessions available.') ?>">
    <meta name="twitter:image" content="<?= esc($og_image ?? base_url('assets/og-image.jpg')) ?>">
    <meta name="twitter:image:alt" content="Insight Counseling Services Chennai">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('favicon.ico?v=2') ?>" sizes="any">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= base_url('assets/favicon-48.png?v=2') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/favicon-96.png?v=2') ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/favicon-192.png?v=2') ?>">
    <link rel="apple-touch-icon" sizes="192x192" href="<?= base_url('assets/favicon-192.png?v=2') ?>">

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
          "@type": ["MedicalBusiness", "LocalBusiness"],
          "@id": "<?= base_url() ?>#organization",
          "name": "Insight Counseling Services",
          "alternateName": "ICS Chennai",
          "url": "<?= base_url() ?>",
          "logo": "<?= base_url('assets/logo-dark.png') ?>",
          "image": "<?= base_url('assets/logo-dark.png') ?>",
          "description": "Insight Counseling Services (ICS) provides compassionate, confidential, and evidence-based psychological counseling and therapy in Chennai since 2014.",
          "telephone": "<?= esc($settings['phone'] ?? '+91-9445662922') ?>",
          "email": "<?= esc($settings['email'] ?? 'lekhaedwin@gmail.com') ?>",
          "priceRange": "₹₹",
          "medicalSpecialty": "Psychiatric",
          "knowsAbout": [
            "Best Relationship Counselling in Chennai",
            "Best Marriage Counseling in Chennai",
            "Marriage Counselor Near Me",
            "Psychologist Chennai",
            "Good Psychologist Near Me",
            "Counseling Center Near Me",
            "Psychologist in Chennai",
            "Therapist Near Me",
            "Best Psychologist in Chennai",
            "Psychology Doctor Near Me",
            "Therapist in Chennai",
            "Marriage Counseling Chennai",
            "Family Counselling Near Me",
            "Child Psychologist Chennai",
            "Counselling Psychologist Near Me",
            "Best Psychologist Chennai",
            "Therapist Chennai"
          ],
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
          "areaServed": [
            {"@type": "City", "name": "Chennai"},
            {"@type": "Place", "name": "Porur"},
            {"@type": "Place", "name": "Kovur"},
            {"@type": "Place", "name": "Vadapalani"}
          ],
          "availableService": [
            {"@type": "MedicalTherapy", "name": "Individual Counselling"},
            {"@type": "MedicalTherapy", "name": "Couple & Marriage Counselling"},
            {"@type": "MedicalTherapy", "name": "Teen & Adolescent Counselling"},
            {"@type": "MedicalTherapy", "name": "Family Counselling"},
            {"@type": "MedicalTherapy", "name": "Anxiety & Depression Counselling"},
            {"@type": "MedicalTherapy", "name": "Online Counselling"}
          ],
          <?php if (!empty($branches)): ?>
          "department": [
            <?php
            $branchItems = [];
            foreach ($branches as $b) {
                $branchItems[] = json_encode(array_filter([
                    '@type'     => 'MedicalClinic',
                    'name'      => 'Insight Counseling Services - ' . $b['name'],
                    'telephone' => $b['phone'] ?? null,
                    'email'     => $b['email'] ?? null,
                    'hasMap'    => $b['map_url'] ?? null,
                    'address'   => [
                        '@type'           => 'PostalAddress',
                        'streetAddress'   => $b['address'] ?? '',
                        'addressLocality' => 'Chennai',
                        'addressRegion'   => 'Tamil Nadu',
                        'addressCountry'  => 'IN',
                    ],
                ]), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            }
            echo implode(',', $branchItems);
            ?>
          ],
          <?php endif; ?>
          "sameAs": <?= json_encode(array_values(array_filter([
              $settings['facebook'] ?? '',
              $settings['instagram'] ?? '',
              $settings['youtube'] ?? '',
          ])), JSON_UNESCAPED_SLASHES) ?>
        },
        {
          "@type": "WebPage",
          "@id": "<?= current_url() ?>#webpage",
          "url": "<?= current_url() ?>",
          "name": <?= json_encode($title ?? 'Insight Counseling Services', JSON_UNESCAPED_UNICODE) ?>,
          "description": <?= json_encode($meta_desc ?? '', JSON_UNESCAPED_UNICODE) ?>,
          "isPartOf": {"@id": "<?= base_url() ?>#website"},
          "about": {"@id": "<?= base_url() ?>#organization"},
          "primaryImageOfPage": {"@type": "ImageObject", "url": "<?= esc($og_image ?? base_url('assets/og-image.jpg')) ?>"},
          "inLanguage": "en-IN"
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
          "inLanguage": "en-IN"
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


    <script>
    // Google Ads Conversion: Phone Call Click
    function gtag_report_phone_conversion(url) {
        var callback = function () {
            if (typeof(url) !== 'undefined' && url && url !== '#') {
                window.location = url;
            }
        };
        if (typeof gtag === 'function') {
            gtag('event', 'conversion', {
                'send_to': 'AW-11346428021/z7JyCNXBkP4bEPWAs6Iq',
                'event_callback': callback
            });
        } else if (typeof(url) !== 'undefined' && url && url !== '#') {
            window.location = url;
        }
        return false;
    }

    // Google Ads Conversion: WhatsApp Click
    function gtag_report_whatsapp_conversion(url) {
        var callback = function () {
            if (typeof(url) !== 'undefined' && url && url !== '#') {
                window.open(url, '_blank');
            }
        };
        if (typeof gtag === 'function') {
            gtag('event', 'conversion', {
                'send_to': 'AW-11346428021/KxQPCMnG__0bEPWAs6Iq',
                'event_callback': callback
            });
        } else if (typeof(url) !== 'undefined' && url && url !== '#') {
            window.open(url, '_blank');
        }
        return false;
    }

    // Auto-attach conversion tracking to call & whatsapp links that don't already
    // report via onclick (otherwise one click would be counted twice)
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('click', function(e) {
            var link = e.target.closest('a[href*="tel:"], a[href*="wa.me"], a[href*="whatsapp.com"]');
            if (!link || link.hasAttribute('onclick')) return;

            var href = link.getAttribute('href') || '';
            if (href.indexOf('tel:') !== -1) {
                if (typeof gtag === 'function') {
                    gtag('event', 'conversion', {
                        'send_to': 'AW-11346428021/z7JyCNXBkP4bEPWAs6Iq'
                    });
                }
            } else if (href.indexOf('wa.me') !== -1 || href.indexOf('whatsapp.com') !== -1) {
                if (typeof gtag === 'function') {
                    gtag('event', 'conversion', {
                        'send_to': 'AW-11346428021/KxQPCMnG__0bEPWAs6Iq'
                    });
                }
            }
        });
    });
    </script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NL955K4G"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header / Navigation -->
    <header class="sticky-top bg-white shadow-sm" style="top: 0; z-index: 1030;">
        <nav class="navbar navbar-expand-lg bg-white py-2" aria-label="Main Navigation">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>psychologist-near-me-chennai">
                    <img src="<?= base_url('assets/logo-dark.png') ?>" alt="Insight Counseling Services - Best Psychologist in Chennai">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>psychologist-near-me-chennai#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>psychologist-near-me-chennai#about">About</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>psychologist-near-me-chennai#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>psychologist-near-me-chennai#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>psychologist-near-me-chennai#testimonials">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link fw-semibold text-primary-color px-3" href="<?= base_url() ?>psychologist-near-me-chennai#contact">Contact Us</a></li>
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
        <div class="container text-center">
            <!-- Center Logo -->
            <img src="<?= base_url('assets/logo-light.png') ?>" alt="Insight Counseling Services Chennai logo" loading="lazy" class="footer-logo-main">

            <!-- Description Text -->
            <p class="footer-description mb-3">
                Insight Counseling Services (ICS), Chennai established in the year 2014.
                Providing compassionate, confidential, and evidence-based psychological support for all,
                helping individuals and couples navigate life's challenges with professional care.
            </p>

            <!-- Contact Bar -->
            <div class="footer-contact-bar">
                <a href="mailto:<?= esc($settings['email']) ?>" class="footer-contact-item">
                    <i class="fas fa-envelope"></i> <?= esc($settings['email']) ?>
                </a>
                <div class="footer-separator"></div>
                <a href="tel:+91<?= preg_replace('/[^0-9]/', '', $settings['phone']) ?>" class="footer-contact-item">
                    <i class="fas fa-phone"></i> <?= esc($settings['phone']) ?>
                </a>
                <div class="footer-separator"></div>
                <div class="d-flex align-items-center">
                    <div class="footer-social-circles">
                        <div class="ms-3 footer-social-circles gap-1">
                            <?php if (!empty($settings['facebook'])): ?>
                                <a href="<?= esc($settings['facebook']) ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i><span class="visually-hidden">Insight Counseling on Facebook</span></a>
                            <?php endif; ?>
                            <?php if (!empty($settings['instagram'])): ?>
                                <a href="<?= esc($settings['instagram']) ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i><span class="visually-hidden">Insight Counseling on Instagram</span></a>
                            <?php endif; ?>
                            <?php if (!empty($settings['youtube'])): ?>
                                <a href="<?= esc($settings['youtube']) ?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i><span class="visually-hidden">Insight Counseling on YouTube</span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick SEO Links Bar -->
            <div class="footer-links-bar my-3 d-flex flex-wrap justify-content-center gap-3 small text-white-50">
                <a href="<?= base_url('privacy-policy') ?>" class="text-white    text-decoration-none hover-white">Privacy Policy</a>
                <span>•</span>
                <a href="<?= base_url('refund-policy') ?>" class="text-white     text-decoration-none hover-white">Refund Policy</a>
                <span>•</span>
                <a href="<?= base_url('our-values') ?>" class="text-white    text-decoration-none hover-white">Our Values</a>
                <span>•</span>
                <a href="<?= base_url('helpline-details') ?>" class="text-white  text-decoration-none hover-white">Helplines</a>
            </div>

            <!-- Bottom Divider and Flex -->
            <div class="footer-divider pb-4">
                <p class="mb-0 small opacity-75">
                    &copy; <?= date('Y') ?> Insight Counseling Services. All Rights Reserved. Developed By <a href="https://abishek80.github.io/portfolio.github.io/" target="_blank" class="text-white fw-bold text-decoration-none"> Antony Abishek</a>.
                </p>
            </div>
        </div>
    </footer>

    <!-- Fixed Action Buttons -->
    <div class="fixed-actions-container">
        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $settings['phone']) ?>" onclick="return gtag_report_phone_conversion(this.href);" class="btn-call-fixed" aria-label="Call Insight Counseling Services">
            <i class="fas fa-phone fs-4"></i><span class="visually-hidden">Call Insight Counseling Services</span>
        </a>
        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp']) ?>/" onclick="return gtag_report_whatsapp_conversion(this.href);" target="_blank" rel="noopener" class="btn-whatsapp-fixed" aria-label="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp fs-4"></i><span class="visually-hidden d-md-none">WhatsApp</span>
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

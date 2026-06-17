<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Terms and Conditions</h1>
        <p>General rules and agreement when utilizing our mental health services.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Document Body -->
<section class="section-padding bg-white">
    <div class="container" style="max-width: 800px;">
        <div class="text-muted" style="line-height: 1.8;">
            <h4 class="text-dark fw-bold mb-3">1. Scope of Service</h4>
            <p>Our counselors offer psychological support, stress coaching, and therapy. These sessions are NOT emergency services. If you are in a severe crisis, please contact local emergency telephone lines immediately.</p>

            <h4 class="text-dark fw-bold mt-4 mb-3">2. Fee Structure & Payment</h4>
            <p>Payment for clinic or online video consultation slots must be settled prior to the session start. All rates are inclusive of local taxes where applicable.</p>

            <h4 class="text-dark fw-bold mt-4 mb-3">3. Professional Discretion</h4>
            <p>We reserve the right to decline therapy sessions or recommend you to alternative medical clinics or psychiatrists if we determine your medical requirements exceed the scope of our outpatient counseling.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

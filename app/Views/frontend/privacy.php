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
        <div class="text-muted" style="line-height: 1.8;">
            <h4 class="text-dark fw-bold mb-3">1. Information Collection</h4>
            <p>We collect basic contact information (name, phone number, email) when you request an appointment. Clinical notes taken during counseling sessions are strictly confidential medical records.</p>

            <h4 class="text-dark fw-bold mt-4 mb-3">2. Confidentiality & Disclosure</h4>
            <p>Our counseling sessions conform to standard psychologist ethical codes. No details shared during sessions are disclosed to third parties unless:</p>
            <ul>
                <li>We have your explicit written consent.</li>
                <li>There is an immediate risk of harm to yourself or others.</li>
                <li>We are legally required by a court subpoena.</li>
            </ul>

            <h4 class="text-dark fw-bold mt-4 mb-3">3. Data Security</h4>
            <p>We enforce technical security and organizational protocols to prevent unauthorized access or disclosure of clinical data.</p>
            
            <h4 class="text-dark fw-bold mt-4 mb-3">4. Contact Information</h4>
            <p>If you have questions about data usage, please reach out directly via our contact details.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

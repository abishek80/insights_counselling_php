<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Refund Policy</h1>
        <p>Our policy on session cancellations, slot bookings, and rescheduling.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Refund Policy</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Document Body -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-muted" style="line-height: 1.8;">
            <h4 class="text-dark fw-bold mb-3">1. Appointment Cancellations</h4>
            <p>We request that cancellations be made at least 24 hours prior to the scheduled session. If you cancel less than 24 hours in advance, the session fee may be charged as a cancellation fee.</p>

            <h4 class="text-dark fw-bold mt-4 mb-3">2. Rescheduling Policy</h4>
            <p>You can reschedule your appointment slot at least 12 hours before the session starts without any penalty, subject to slot availability.</p>

            <h4 class="text-dark fw-bold mt-4 mb-3">3. Refund Processing</h4>
            <p>Refunds for pre-paid sessions are processed if cancellations are done 24+ hours in advance. Once approved, the amount will be credited back via the original payment source within 5 to 7 business days.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

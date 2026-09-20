<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Refund and Rescheduling Policy</h1>
        <p>Important guidelines on session bookings, non-refundable payments, and emergency rescheduling rules.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Refund & Rescheduling Policy</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Document Body -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-secondary" style="line-height: 1.8; font-size: 1.02rem;">
            <p class="lead text-dark mb-4">
                At <strong>Insight Counseling Services</strong>, we reserve dedicated time and professional resources for each client appointment. To ensure fairness and effective scheduling for all clients, we maintain the following refund and rescheduling policy.
            </p>

            <!-- No Refund Policy -->
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-primary-subtle">
                <h4 class="text-primary-color fw-bold mb-3">
                    <i class="fas fa-ban text-danger me-2"></i>No Refund Policy
                </h4>
                <p class="mb-3 text-dark fw-medium">
                    All payments made for counseling, psychotherapy, assessment, consultation, or related services are final and non-refundable.
                </p>
                <p class="mb-2 text-secondary">
                    Once an appointment has been booked and payment has been successfully processed, refunds will not be issued for any reason, including but not limited to:
                </p>
                <ul class="mb-0 text-secondary">
                    <li class="mb-2">Change of mind after booking</li>
                    <li class="mb-2">Personal scheduling conflicts</li>
                    <li class="mb-2">Failure to attend the appointment</li>
                    <li class="mb-2">Late arrival resulting in a shortened session</li>
                    <li class="mb-2">Dissatisfaction arising from personal expectations regarding the counseling process</li>
                    <li class="mb-2">Technical issues on the client’s side, including internet connectivity problems, device malfunctions, or software-related difficulties</li>
                </ul>
            </div>

            <!-- No Cancellation Policy -->
            <h4 class="text-primary-color fw-bold mt-4 mb-3">No Cancellation Policy</h4>
            <p class="mb-3">
                Confirmed appointments cannot be canceled. The appointment slot is reserved exclusively for the client, and the allocated time cannot be offered to another individual at short notice.
            </p>
            <p class="mb-4">
                Clients are encouraged to carefully consider their availability before booking a session.
            </p>

            <!-- Emergency Rescheduling -->
            <div class="alert alert-info border-0 shadow-sm rounded-4 p-4 mb-4">
                <h4 class="text-primary-color fw-bold mb-3">
                    <i class="fas fa-clock text-primary me-2"></i>Emergency Rescheduling
                </h4>
                <p class="mb-3 text-dark">
                    We understand that genuine emergencies may occasionally arise. Therefore, a one-time rescheduling option may be granted under exceptional circumstances.
                </p>
                <p class="mb-2 text-dark fw-semibold">To be eligible for rescheduling:</p>
                <ul class="mb-3 text-dark">
                    <li class="mb-2">The client must inform the counselor prior to the scheduled appointment time.</li>
                    <li class="mb-2">The request must be due to a genuine emergency or unforeseen circumstance.</li>
                    <li class="mb-2">Only one rescheduling request will be permitted per booked appointment.</li>
                    <li class="mb-2">The rescheduled appointment must be scheduled within the timeframe recommended by the counselor and subject to availability.</li>
                </ul>
                <p class="mb-0 text-dark small fw-medium">
                    <em>Note: Requests made after the scheduled session time has passed may be treated as a missed appointment and will not qualify for rescheduling.</em>
                </p>
            </div>

            <!-- Missed Appointments and No-Shows -->
            <h4 class="text-primary-color fw-bold mt-4 mb-3">Missed Appointments and No-Shows</h4>
            <p class="mb-3">
                If a client does not attend the scheduled appointment or fails to join the session at the agreed time without prior notification, the session will be considered a no-show.
            </p>
            <p class="mb-4">
                No refunds, credits, or additional rescheduling opportunities will be provided for missed appointments or no-shows.
            </p>

            <!-- Acceptance of Policy -->
            <div class="p-4 rounded-4 bg-primary-subtle border-0 mb-4">
                <h5 class="fw-bold text-primary-color mb-2"><i class="fas fa-check-circle me-2"></i>Acceptance of Policy</h5>
                <p class="mb-0 text-secondary">
                    By booking an appointment and making payment for services, clients acknowledge that they have read, understood, and agreed to this Refund and Rescheduling Policy.
                </p>
            </div>

            <h4 class="text-primary-color fw-bold mt-4 mb-3">Contact Information</h4>
            <p class="mb-4">If you have any questions or need to request an emergency reschedule prior to your appointment time, please contact us:</p>

            <div class="row g-4 my-2">
                <!-- Card 1: Need a Quick Response? -->
                <div class="col-md-6">
                    <div class="p-4 p-md-5 rounded-4 text-white position-relative overflow-hidden h-100 d-flex flex-column justify-content-between" style="background-color: var(--primary-color, #2e2a70);">
                        <div>
                            <h4 class="fw-bold mb-3 text-white" style="font-size: 1.5rem;">Need a Quick Response?</h4>
                            <p class="text-white mb-4" style="line-height: 1.6;">
                                WhatsApp is the fastest way to get in touch with our intake team and request a reschedule before your session.
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
                        <h4 class="fw-bold mb-4 text-white" style="font-size: 1.5rem;">Direct Contact Channels</h4>
                        
                        <!-- Email item -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3 me-3 flex-shrink-0" style="width: 48px; height: 48px; background: rgba(255, 255, 255, 0.12);">
                                <i class="fas fa-envelope text-white fs-6"></i>
                            </div>
                            <div>
                                <div class="text-white text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">EMAIL US</div>
                                <a href="mailto:lekhapsy@gmail.com" class="text-white fw-bold text-decoration-none" style="font-size: 1.05rem;">lekhapsy@gmail.com</a>
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

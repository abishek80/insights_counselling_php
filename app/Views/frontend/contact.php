<?php 
helper('settings'); 
$settings = get_settings(); 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We have three accessible centers across Chennai, and offer online video sessions worldwide.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Locations Section -->
<section class="section-padding bg-white" id="contact">
    <div class="container">
        <!-- Location Cards -->
        <div class="row g-4 mb-5">
            <?php if (!empty($branches)): ?>
                <?php foreach ($branches as $branch): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-card bg-primary-subtle h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="location-icon-box">
                                    <i class="fas fa-location-dot"></i>
                                </div>
                                <h5 class="fw-bold mb-2"><?= esc($branch['name']) ?></h5>
                                <?php if (!empty($branch['serving_areas'])): ?>
                                    <p class="text-muted small mb-3 opacity-75"><?= esc($branch['serving_areas']) ?></p>
                                <?php endif; ?>
                                <p class="text-primary-color mb-3"><i class="fas fa-map-marker-alt me-2 text-primary-color"></i> <?= esc($branch['address']) ?></p>
                            </div>
                            <div>
                                <div class="mb-2">
                                    <i class="fas fa-phone me-2 text-primary-color"></i>
                                    <a href="tel:<?= preg_replace('/\s+/', '', $branch['phone']) ?>" class="text-decoration-none text-reset"><?= esc($branch['phone']) ?></a>
                                </div>
                                <div class="mb-3">
                                    <i class="fas fa-envelope me-2 text-primary-color"></i>
                                    <a href="mailto:<?= esc($branch['email']) ?>" class="text-decoration-none text-reset"><?= esc($branch['email']) ?></a>
                                </div>
                                <?php if (!empty($branch['map_url'])): ?>
                                    <a href="<?= esc($branch['map_url']) ?>" target="_blank" class="text-primary-color fw-bold text-decoration-none">GET DIRECTIONS <i class="fas fa-external-link-alt ms-1"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted">No branch locations available at the moment.</div>
            <?php endif; ?>
        </div>

        <!-- Form and Sidebar -->
        <div class="row g-5">
            <!-- Enquiry Form -->
            <div class="col-lg-7">
                <div class="card p-4 border-0 shadow-sm rounded-4 bg-primary-subtle">
                    <h3 class="fw-bold text-primary-color mb-2">Send an Enquiry</h3>
                    <p class="text-muted mb-4">Fill out the form below and our counseling support team will respond to you within 24 hours.</p>
                    
                    <form action="<?= base_url('contact/submit') ?>" method="POST" novalidate>
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-dark">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control <?= (isset($errors['name']) || $validation->hasError('name')) ? 'is-invalid' : '' ?>" placeholder="e.g. John Doe" value="<?= old('name') ?>" required>
                            <?php if (isset($errors['name']) || $validation->hasError('name')): ?>
                                <div class="invalid-feedback"><?= esc($errors['name'] ?? $validation->getError('name')) ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold text-dark">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control <?= (isset($errors['email']) || $validation->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="e.g. john@example.com" value="<?= old('email') ?>" required>
                                <?php if (isset($errors['email']) || $validation->hasError('email')): ?>
                                    <div class="invalid-feedback"><?= esc($errors['email'] ?? $validation->getError('email')) ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-bold text-dark">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control <?= (isset($errors['phone']) || $validation->hasError('phone')) ? 'is-invalid' : '' ?>" placeholder="e.g. +91 98765 43210" value="<?= old('phone') ?>" oninput="this.value = this.value.replace(/[^0-9+\s\-]/g, '')" maxlength="15" required>
                                <?php if (isset($errors['phone']) || $validation->hasError('phone')): ?>
                                    <div class="invalid-feedback"><?= esc($errors['phone'] ?? $validation->getError('phone')) ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-bold text-dark">Subject <span class="text-danger">*</span></label>
                            <select name="subject" id="subject" class="form-select <?= (isset($errors['subject']) || $validation->hasError('subject')) ? 'is-invalid' : '' ?>" required>
                                <option value="" disabled selected>Select an enquiry subject...</option>
                                <option value="General Enquiry" <?= old('subject') === 'General Enquiry' ? 'selected' : '' ?>>General Enquiry</option>
                                <option value="Appointment Booking" <?= old('subject') === 'Appointment Booking' ? 'selected' : '' ?>>Appointment Booking</option>
                                <option value="Career / Opportunities" <?= old('subject') === 'Career / Opportunities' ? 'selected' : '' ?>>Career / Opportunities</option>
                                <option value="Feedback / Suggestions" <?= old('subject') === 'Feedback / Suggestions' ? 'selected' : '' ?>>Feedback / Suggestions</option>
                            </select>
                            <?php if (isset($errors['subject']) || $validation->hasError('subject')): ?>
                                <div class="invalid-feedback"><?= esc($errors['subject'] ?? $validation->getError('subject')) ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold text-dark">Your Message <span class="text-danger">*</span></label>
                            <textarea name="message" id="message" class="form-control <?= (isset($errors['message']) || $validation->hasError('message')) ? 'is-invalid' : '' ?>" rows="5" placeholder="Write details about your query here..." required><?= old('message') ?></textarea>
                            <?php if (isset($errors['message']) || $validation->hasError('message')): ?>
                                <div class="invalid-feedback"><?= esc($errors['message'] ?? $validation->getError('message')) ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-5">
                <div class="whatsapp-box h-auto mb-4">
                    <h3 class="fw-bold mb-3 text-white">Need a Quick Response?</h3>
                    <p class="mb-4 opacity-75 text-white">WhatsApp is the fastest way to get in touch with our intake team and book your session immediately.</p>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp'] ?? '9445662922') ?>/" target="_blank" rel="noopener" class="btn-whatsapp-light">
                        <i class="fab fa-whatsapp fs-4"></i> Chat on WhatsApp
                    </a>
                </div>

                <div class="direct-channels-box">
                    <h5 class="fw-bold mb-4 text-white">Direct Channels</h5>
                    <div class="channel-item mb-3">
                        <div class="channel-icon-box">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="channel-content">
                            <h6>EMAIL US</h6>
                            <p><a href="mailto:<?= esc($settings['email']) ?>" class="text-decoration-none text-white"><?= esc($settings['email']) ?></a></p>
                        </div>
                    </div>
                    <div class="channel-item">
                        <div class="channel-icon-box">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="channel-content">
                            <h6>CALL US</h6>
                            <p><a href="tel:<?= preg_replace('/\s+/', '', $settings['phone']) ?>" class="text-decoration-none text-white"><?= esc($settings['phone']) ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="contact/submit"]');
    if (!form) return;

    form.addEventListener('submit', function(event) {
        let isValid = true;

        // Clear previous manual is-invalid classes
        form.querySelectorAll('.form-control, .form-select').forEach(function(input) {
            input.classList.remove('is-invalid');
            const feedback = input.parentNode.querySelector('.invalid-feedback');
            if (feedback) {
                feedback.style.display = 'none';
            }
        });

        // Validate Full Name
        const nameInput = document.getElementById('name');
        if (nameInput) {
            const nameVal = nameInput.value.trim();
            if (nameVal === '') {
                showError(nameInput, 'Please enter your name.');
                isValid = false;
            } else if (nameVal.length < 3) {
                showError(nameInput, 'Name must be at least 3 characters long.');
                isValid = false;
            }
        }

        // Validate Email
        const emailInput = document.getElementById('email');
        if (emailInput) {
            const emailVal = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailVal === '') {
                showError(emailInput, 'Please enter your email address.');
                isValid = false;
            } else if (!emailRegex.test(emailVal)) {
                showError(emailInput, 'Please enter a valid email address.');
                isValid = false;
            }
        }

        // Validate Phone
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            const phoneVal = phoneInput.value.trim();
            if (phoneVal === '') {
                showError(phoneInput, 'Please enter your phone number.');
                isValid = false;
            }
        }

        // Validate Subject
        const subjectSelect = document.getElementById('subject');
        if (subjectSelect) {
            if (subjectSelect.value === '') {
                showError(subjectSelect, 'Please select an enquiry subject.');
                isValid = false;
            }
        }

        // Validate Message
        const messageInput = document.getElementById('message');
        if (messageInput) {
            const messageVal = messageInput.value.trim();
            if (messageVal === '') {
                showError(messageInput, 'Please enter your message.');
                isValid = false;
            } else if (messageVal.length < 10) {
                showError(messageInput, 'Message must be at least 10 characters long.');
                isValid = false;
            }
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    function showError(input, message) {
        input.classList.add('is-invalid');
        let feedback = input.parentNode.querySelector('.invalid-feedback');
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            input.parentNode.appendChild(feedback);
        }
        feedback.textContent = message;
        feedback.style.display = 'block';
    }
});
</script>
<?= $this->endSection() ?>

<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">General Settings</h2>
    <p class="text-muted mb-0">Update contact channels, locations, and social media links served across the site.</p>
</div>

<div class="card p-4">
    <form class="needs-validation" novalidate action="<?= base_url('admin/settings/update') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label fw-bold small text-dark">Contact Phone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" name="phone" id="phone" class="form-control <?= (isset($errors['phone']) || $validation->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['phone'] ?? '') ?>" required>
                <?php if (isset($errors['phone']) || $validation->hasError('phone')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['phone'] ?? $validation->getError('phone')) ?></div>
                <?php endif; ?>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold small text-dark">Intake Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control <?= (isset($errors['email']) || $validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['email'] ?? '') ?>" required>
                <?php if (isset($errors['email']) || $validation->hasError('email')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['email'] ?? $validation->getError('email')) ?></div>
                <?php endif; ?>
                </div>
            </div>

            <!-- Social Media -->
            <div class="col-md-6 mb-3">
                <label for="facebook" class="form-label fw-bold small text-dark">Facebook Page URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                    <input type="url" name="facebook" id="facebook" class="form-control <?= (isset($errors['facebook']) || $validation->hasError('facebook')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['facebook'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="instagram" class="form-label fw-bold small text-dark">Instagram Profile URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                    <input type="url" name="instagram" id="instagram" class="form-control <?= (isset($errors['instagram']) || $validation->hasError('instagram')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['instagram'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="youtube" class="form-label fw-bold small text-dark">YouTube Channel URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                    <input type="url" name="youtube" id="youtube" class="form-control <?= (isset($errors['youtube']) || $validation->hasError('youtube')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['youtube'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="whatsapp" class="form-label fw-bold small text-dark">WhatsApp Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                    <input type="text" name="whatsapp" id="whatsapp" class="form-control <?= (isset($errors['whatsapp']) || $validation->hasError('whatsapp')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['whatsapp'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="booking_url" class="form-label fw-bold small text-dark">Consultation Booking URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="url" name="booking_url" id="booking_url" class="form-control <?= (isset($errors['booking_url']) || $validation->hasError('booking_url')) ? 'is-invalid' : '' ?>" value="<?= esc($settings['booking_url'] ?? '') ?>" required>
                <?php if (isset($errors['booking_url']) || $validation->hasError('booking_url')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['booking_url'] ?? $validation->getError('booking_url')) ?></div>
                <?php endif; ?>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold mt-2"><i class="fas fa-save me-1"></i> Save Changes</button>
    </form>
</div>

<?= $this->endSection() ?>

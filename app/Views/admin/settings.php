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
                <label for="whatsapp" class="form-label fw-bold small text-dark">WhatsApp Number (e.g. 919445662922)</label>
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

            <!-- Addresses -->
            <div class="col-md-12 mb-3">
                <label for="address_kovur" class="form-label fw-bold small text-dark">Kovur Center Address (Main)</label>
                <textarea name="address_kovur" id="address_kovur" class="form-control <?= (isset($errors['address_kovur']) || $validation->hasError('address_kovur')) ? 'is-invalid' : '' ?>" rows="2" required><?= esc($settings['address_kovur'] ?? '') ?></textarea>
                <?php if (isset($errors['address_kovur']) || $validation->hasError('address_kovur')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['address_kovur'] ?? $validation->getError('address_kovur')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-12 mb-3">
                <label for="address_porur" class="form-label fw-bold small text-dark">Porur Address (Family Clinic)</label>
                <textarea name="address_porur" id="address_porur" class="form-control <?= (isset($errors['address_porur']) || $validation->hasError('address_porur')) ? 'is-invalid' : '' ?>" rows="2" required><?= esc($settings['address_porur'] ?? '') ?></textarea>
                <?php if (isset($errors['address_porur']) || $validation->hasError('address_porur')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['address_porur'] ?? $validation->getError('address_porur')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-12 mb-4">
                <label for="address_ashok_nagar" class="form-label fw-bold small text-dark">Ashok Nagar Address (Magna Clinic)</label>
                <textarea name="address_ashok_nagar" id="address_ashok_nagar" class="form-control <?= (isset($errors['address_ashok_nagar']) || $validation->hasError('address_ashok_nagar')) ? 'is-invalid' : '' ?>" rows="2" required><?= esc($settings['address_ashok_nagar'] ?? '') ?></textarea>
                <?php if (isset($errors['address_ashok_nagar']) || $validation->hasError('address_ashok_nagar')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['address_ashok_nagar'] ?? $validation->getError('address_ashok_nagar')) ?></div>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
    </form>
</div>

<?= $this->endSection() ?>

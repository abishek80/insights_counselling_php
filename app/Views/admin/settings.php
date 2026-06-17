<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">General Settings</h2>
    <p class="text-muted mb-0">Update contact channels, locations, and social media links served across the site.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/settings/update') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label fw-bold small text-dark">Contact Phone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($settings['phone'] ?? '') ?>" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold small text-dark">Intake Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" value="<?= esc($settings['email'] ?? '') ?>" required>
                </div>
            </div>

            <!-- Social Media -->
            <div class="col-md-6 mb-3">
                <label for="facebook" class="form-label fw-bold small text-dark">Facebook Page URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                    <input type="url" name="facebook" id="facebook" class="form-control" value="<?= esc($settings['facebook'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="instagram" class="form-label fw-bold small text-dark">Instagram Profile URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                    <input type="url" name="instagram" id="instagram" class="form-control" value="<?= esc($settings['instagram'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="youtube" class="form-label fw-bold small text-dark">YouTube Channel URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                    <input type="url" name="youtube" id="youtube" class="form-control" value="<?= esc($settings['youtube'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="whatsapp" class="form-label fw-bold small text-dark">WhatsApp Number (e.g. 919445662922)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="<?= esc($settings['whatsapp'] ?? '') ?>">
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="booking_url" class="form-label fw-bold small text-dark">Consultation Booking URL</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="url" name="booking_url" id="booking_url" class="form-control" value="<?= esc($settings['booking_url'] ?? '') ?>" required>
                </div>
            </div>

            <!-- Addresses -->
            <div class="col-md-12 mb-3">
                <label for="address_kovur" class="form-label fw-bold small text-dark">Kovur Center Address (Main)</label>
                <textarea name="address_kovur" id="address_kovur" class="form-control" rows="2" required><?= esc($settings['address_kovur'] ?? '') ?></textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="address_porur" class="form-label fw-bold small text-dark">Porur Address (Family Clinic)</label>
                <textarea name="address_porur" id="address_porur" class="form-control" rows="2" required><?= esc($settings['address_porur'] ?? '') ?></textarea>
            </div>

            <div class="col-md-12 mb-4">
                <label for="address_ashok_nagar" class="form-label fw-bold small text-dark">Ashok Nagar Address (Magna Clinic)</label>
                <textarea name="address_ashok_nagar" id="address_ashok_nagar" class="form-control" rows="2" required><?= esc($settings['address_ashok_nagar'] ?? '') ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
    </form>
</div>

<?= $this->endSection() ?>

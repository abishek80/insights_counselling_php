<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Branch Location</h2>
    <p class="text-muted mb-0">Register a new clinic branch location.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/branches/store') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-bold small text-dark">Branch Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" placeholder="e.g. Kovur Center (Main)" required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label fw-bold small text-dark">Contact Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?= old('phone') ?>" placeholder="e.g. +91 94456 62922" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold small text-dark">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" placeholder="e.g. clinic@example.com" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="map_url" class="form-label fw-bold small text-dark">Google Maps Location URL</label>
                <input type="url" name="map_url" id="map_url" class="form-control" value="<?= old('map_url') ?>" placeholder="e.g. https://maps.app.goo.gl/..." required>
            </div>

            <div class="col-md-12 mb-4">
                <label for="address" class="form-label fw-bold small text-dark">Clinic Address</label>
                <textarea name="address" id="address" class="form-control" rows="4" placeholder="Full address details..." required><?= old('address') ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Add Location</button>
        <a href="<?= base_url('admin/branches') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

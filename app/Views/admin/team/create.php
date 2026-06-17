<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Team Member</h2>
    <p class="text-muted mb-0">Register a new counseling psychologist to the team.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/team/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-bold small text-dark">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>" placeholder="e.g. Dr. Jane Smith" required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="role" class="form-label fw-bold small text-dark">Professional Role</label>
                <input type="text" name="role" id="role" class="form-control" value="<?= old('role') ?>" placeholder="e.g. CLINICAL PSYCHOLOGIST" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="qualifications" class="form-label fw-bold small text-dark">Qualifications</label>
                <input type="text" name="qualifications" id="qualifications" class="form-control" value="<?= old('qualifications') ?>" placeholder="e.g. M.Sc Psychology, Ph.D" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="languages" class="form-label fw-bold small text-dark">Languages Spoken</label>
                <input type="text" name="languages" id="languages" class="form-control" value="<?= old('languages') ?>" placeholder="e.g. English, Tamil, Hindi" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="specialties" class="form-label fw-bold small text-dark">Specialties (comma-separated)</label>
                <input type="text" name="specialties" id="specialties" class="form-control" value="<?= old('specialties') ?>" placeholder="e.g. Anxiety Support, CBT, Couple Counseling" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Profile Photo</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div class="col-md-12 mb-4">
                <label for="about" class="form-label fw-bold small text-dark">About Profile Description</label>
                <textarea name="about" id="about" class="form-control" rows="4" placeholder="Brief professional description..." required><?= old('about') ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Register Member</button>
        <a href="<?= base_url('admin/team') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Team Member</h2>
    <p class="text-muted mb-0">Register a new counseling psychologist to the team.</p>
</div>

<div class="card p-4">
    <form class="needs-validation" novalidate action="<?= base_url('admin/team/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-bold small text-dark">Full Name</label>
                <input type="text" name="name" id="name" class="form-control <?= (isset($errors['name']) || $validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="e.g. Dr. Jane Smith" required>
                <?php if (isset($errors['name']) || $validation->hasError('name')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['name'] ?? $validation->getError('name')) ?></div>
                <?php endif; ?>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="role" class="form-label fw-bold small text-dark">Professional Role</label>
                <input type="text" name="role" id="role" class="form-control <?= (isset($errors['role']) || $validation->hasError('role')) ? 'is-invalid' : '' ?>" value="<?= old('role') ?>" placeholder="e.g. CLINICAL PSYCHOLOGIST" required>
                <?php if (isset($errors['role']) || $validation->hasError('role')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['role'] ?? $validation->getError('role')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="qualifications" class="form-label fw-bold small text-dark">Qualifications</label>
                <input type="text" name="qualifications" id="qualifications" class="form-control <?= (isset($errors['qualifications']) || $validation->hasError('qualifications')) ? 'is-invalid' : '' ?>" value="<?= old('qualifications') ?>" placeholder="e.g. M.Sc Psychology, Ph.D" required>
                <?php if (isset($errors['qualifications']) || $validation->hasError('qualifications')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['qualifications'] ?? $validation->getError('qualifications')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="languages" class="form-label fw-bold small text-dark">Languages Spoken</label>
                <input type="text" name="languages" id="languages" class="form-control <?= (isset($errors['languages']) || $validation->hasError('languages')) ? 'is-invalid' : '' ?>" value="<?= old('languages') ?>" placeholder="e.g. English, Tamil, Hindi" required>
                <?php if (isset($errors['languages']) || $validation->hasError('languages')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['languages'] ?? $validation->getError('languages')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="specialties" class="form-label fw-bold small text-dark">Specialties (comma-separated)</label>
                <input type="text" name="specialties" id="specialties" class="form-control <?= (isset($errors['specialties']) || $validation->hasError('specialties')) ? 'is-invalid' : '' ?>" value="<?= old('specialties') ?>" placeholder="e.g. Anxiety Support, CBT, Couple Counseling" required>
                <?php if (isset($errors['specialties']) || $validation->hasError('specialties')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['specialties'] ?? $validation->getError('specialties')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Profile Photo</label>
                <input type="file" name="image" id="image" class="form-control <?= (isset($errors['image']) || $validation->hasError('image')) ? 'is-invalid' : '' ?>" accept="image/*">
            </div>

            <div class="col-md-12 mb-4">
                <label for="about" class="form-label fw-bold small text-dark">About Profile Description</label>
                <textarea name="about" id="about" class="form-control summernote <?= (isset($errors['about']) || $validation->hasError('about')) ? 'is-invalid' : '' ?>" rows="4" placeholder="Brief professional description..." required><?= old('about') ?></textarea>
                <?php if (isset($errors['about']) || $validation->hasError('about')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['about'] ?? $validation->getError('about')) ?></div>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Register Member</button>
        <a href="<?= base_url('admin/team') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

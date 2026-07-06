<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Edit Branch Location</h2>
    <p class="text-muted mb-0">Modify details for this clinic branch location.</p>
</div>

<div class="card p-4">
    <form class="needs-validation" novalidate action="<?= base_url('admin/branches/update/' . $branch['id']) ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-bold small text-dark">Branch Name</label>
                <input type="text" name="name" id="name" class="form-control <?= (isset($errors['name']) || $validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= esc($branch['name']) ?>" required>
                <?php if (isset($errors['name']) || $validation->hasError('name')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['name'] ?? $validation->getError('name')) ?></div>
                <?php endif; ?>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label fw-bold small text-dark">Contact Phone</label>
                <input type="text" name="phone" id="phone" class="form-control <?= (isset($errors['phone']) || $validation->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= esc($branch['phone']) ?>" required>
                <?php if (isset($errors['phone']) || $validation->hasError('phone')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['phone'] ?? $validation->getError('phone')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-bold small text-dark">Email Address</label>
                <input type="email" name="email" id="email" class="form-control <?= (isset($errors['email']) || $validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= esc($branch['email']) ?>" required>
                <?php if (isset($errors['email']) || $validation->hasError('email')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['email'] ?? $validation->getError('email')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="map_url" class="form-label fw-bold small text-dark">Google Maps Location URL</label>
                <input type="url" name="map_url" id="map_url" class="form-control <?= (isset($errors['map_url']) || $validation->hasError('map_url')) ? 'is-invalid' : '' ?>" value="<?= esc($branch['map_url']) ?>" required>
                <?php if (isset($errors['map_url']) || $validation->hasError('map_url')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['map_url'] ?? $validation->getError('map_url')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-12 mb-4">
                <label for="address" class="form-label fw-bold small text-dark">Clinic Address</label>
                <textarea name="address" id="address" class="form-control <?= (isset($errors['address']) || $validation->hasError('address')) ? 'is-invalid' : '' ?>" rows="4" required><?= esc($branch['address']) ?></textarea>
                <?php if (isset($errors['address']) || $validation->hasError('address')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['address'] ?? $validation->getError('address')) ?></div>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Update Details</button>
        <a href="<?= base_url('admin/branches') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

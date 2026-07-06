<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Service Category</h2>
    <p class="text-muted mb-0">Define a new therapeutic category offered by the clinic.</p>
</div>

<div class="card p-4">
    <form class="needs-validation" novalidate action="<?= base_url('admin/services/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="title" class="form-label fw-bold small text-dark">Service Title</label>
                <input type="text" name="title" id="title" class="form-control <?= (isset($errors['title']) || $validation->hasError('title')) ? 'is-invalid' : '' ?>" value="<?= old('title') ?>" placeholder="e.g. Cognitive Behavioral Therapy (CBT)" required>
                <?php if (isset($errors['title']) || $validation->hasError('title')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['title'] ?? $validation->getError('title')) ?></div>
                <?php endif; ?>
            </div>
            
            <div class="col-md-4 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Cover Image</label>
                <input type="file" name="image" id="image" class="form-control <?= (isset($errors['image']) || $validation->hasError('image')) ? 'is-invalid' : '' ?>" accept="image/*">
            </div>

            <div class="col-md-12 mb-3">
                <label for="short_description" class="form-label fw-bold small text-dark">Short Summary Description</label>
                <input type="text" name="short_description" id="short_description" class="form-control <?= (isset($errors['short_description']) || $validation->hasError('short_description')) ? 'is-invalid' : '' ?>" value="<?= old('short_description') ?>" placeholder="Brief snippet shown on list cards..." required>
                <?php if (isset($errors['short_description']) || $validation->hasError('short_description')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['short_description'] ?? $validation->getError('short_description')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="long_description" class="form-label fw-bold small text-dark">Detailed Description (Long text)</label>
                <textarea name="long_description" id="long_description" class="form-control summernote <?= (isset($errors['long_description']) || $validation->hasError('long_description')) ? 'is-invalid' : '' ?>" rows="6" placeholder="Explain the symptoms, therapeutic approach, and what clients can expect..." required><?= old('long_description') ?></textarea>
                <?php if (isset($errors['long_description']) || $validation->hasError('long_description')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['long_description'] ?? $validation->getError('long_description')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-4">
                <label for="benefits" class="form-label fw-bold small text-dark">Benefits (Enter one benefit per line)</label>
                <textarea name="benefits" id="benefits" class="form-control summernote <?= (isset($errors['benefits']) || $validation->hasError('benefits')) ? 'is-invalid' : '' ?>" rows="6" placeholder="Identify cognitive triggers&#10;Develop stress boundary settings&#10;Build emotional resilience" required><?= old('benefits') ?></textarea>
                <?php if (isset($errors['benefits']) || $validation->hasError('benefits')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['benefits'] ?? $validation->getError('benefits')) ?></div>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Create Service</button>
        <a href="<?= base_url('admin/services') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

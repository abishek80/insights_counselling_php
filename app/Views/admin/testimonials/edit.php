<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Edit Testimonial</h2>
    <p class="text-muted mb-0">Modify review details of <?= esc($testimonial['client_name']) ?>.</p>
</div>

<div class="card p-4">
    <form class="needs-validation" novalidate action="<?= base_url('admin/testimonials/update/' . $testimonial['id']) ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="client_name" class="form-label fw-bold small text-dark">Client Name</label>
                <input type="text" name="client_name" id="client_name" class="form-control <?= (isset($errors['client_name']) || $validation->hasError('client_name')) ? 'is-invalid' : '' ?>" value="<?= esc(old('client_name', $testimonial['client_name'])) ?>" required>
                <?php if (isset($errors['client_name']) || $validation->hasError('client_name')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['client_name'] ?? $validation->getError('client_name')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-4 mb-3">
                <label for="rating" class="form-label fw-bold small text-dark">Star Rating</label>
                <select name="rating" id="rating" class="form-select">
                    <option value="5" <?= old('rating', $testimonial['rating'] ?? 5) == 5 ? 'selected' : '' ?>>⭐⭐⭐⭐⭐ (5 Stars)</option>
                    <option value="4" <?= old('rating', $testimonial['rating'] ?? 5) == 4 ? 'selected' : '' ?>>⭐⭐⭐⭐ (4 Stars)</option>
                    <option value="3" <?= old('rating', $testimonial['rating'] ?? 5) == 3 ? 'selected' : '' ?>>⭐⭐⭐ (3 Stars)</option>
                    <option value="2" <?= old('rating', $testimonial['rating'] ?? 5) == 2 ? 'selected' : '' ?>>⭐⭐ (2 Stars)</option>
                    <option value="1" <?= old('rating', $testimonial['rating'] ?? 5) == 1 ? 'selected' : '' ?>>⭐ (1 Star)</option>
                </select>
            </div>
            
            <div class="col-md-4 mb-3">
                <label for="meta_info" class="form-label fw-bold small text-dark">Meta Info (Verification)</label>
                <input type="text" name="meta_info" id="meta_info" class="form-control <?= (isset($errors['meta_info']) || $validation->hasError('meta_info')) ? 'is-invalid' : '' ?>" value="<?= esc(old('meta_info', $testimonial['meta_info'])) ?>" required>
                <?php if (isset($errors['meta_info']) || $validation->hasError('meta_info')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['meta_info'] ?? $validation->getError('meta_info')) ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-12 mb-4">
                <label for="content" class="form-label fw-bold small text-dark">Review Content</label>
                <textarea name="content" id="content" class="form-control summernote <?= (isset($errors['content']) || $validation->hasError('content')) ? 'is-invalid' : '' ?>" rows="4" required><?= esc(old('content', $testimonial['content'])) ?></textarea>
                <?php if (isset($errors['content']) || $validation->hasError('content')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['content'] ?? $validation->getError('content')) ?></div>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
        <a href="<?= base_url('admin/testimonials') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add FAQ</h2>
    <p class="text-muted mb-0">Create a new question and answer pair.</p>
</div>

<div class="card p-4">
    <form class="needs-validation" novalidate action="<?= base_url('admin/faq/store') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="mb-3">
            <label for="question" class="form-label fw-bold small text-dark">Question</label>
            <input type="text" name="question" id="question" class="form-control <?= (isset($errors['question']) || $validation->hasError('question')) ? 'is-invalid' : '' ?>" value="<?= old('question') ?>" placeholder="e.g. Do you offer online counseling?" required>
                <?php if (isset($errors['question']) || $validation->hasError('question')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['question'] ?? $validation->getError('question')) ?></div>
                <?php endif; ?>
        </div>

        <div class="mb-4">
            <label for="answer" class="form-label fw-bold small text-dark">Answer</label>
            <textarea name="answer" id="answer" class="form-control summernote <?= (isset($errors['answer']) || $validation->hasError('answer')) ? 'is-invalid' : '' ?>" rows="5" placeholder="Type the answer here..." required><?= old('answer') ?></textarea>
                <?php if (isset($errors['answer']) || $validation->hasError('answer')): ?>
                    <div class="invalid-feedback small"><?= esc($errors['answer'] ?? $validation->getError('answer')) ?></div>
                <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Add FAQ</button>
        <a href="<?= base_url('admin/faq') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

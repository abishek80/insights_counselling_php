<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Service Category</h2>
    <p class="text-muted mb-0">Define a new therapeutic category offered by the clinic.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/services/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="title" class="form-label fw-bold small text-dark">Service Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= old('title') ?>" placeholder="e.g. Cognitive Behavioral Therapy (CBT)" required>
            </div>
            
            <div class="col-md-4 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Cover Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div class="col-md-12 mb-3">
                <label for="short_description" class="form-label fw-bold small text-dark">Short Summary Description</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="<?= old('short_description') ?>" placeholder="Brief snippet shown on list cards..." required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="long_description" class="form-label fw-bold small text-dark">Detailed Description (Long text)</label>
                <textarea name="long_description" id="long_description" class="form-control" rows="6" placeholder="Explain the symptoms, therapeutic approach, and what clients can expect..." required><?= old('long_description') ?></textarea>
            </div>

            <div class="col-md-6 mb-4">
                <label for="benefits" class="form-label fw-bold small text-dark">Benefits (Enter one benefit per line)</label>
                <textarea name="benefits" id="benefits" class="form-control" rows="6" placeholder="Identify cognitive triggers&#10;Develop stress boundary settings&#10;Build emotional resilience" required><?= old('benefits') ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Create Service</button>
        <a href="<?= base_url('admin/services') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

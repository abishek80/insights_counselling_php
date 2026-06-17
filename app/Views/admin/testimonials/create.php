<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Testimonial</h2>
    <p class="text-muted mb-0">Record a new client review for website display.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/testimonials/store') ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="client_name" class="form-label fw-bold small text-dark">Client Name</label>
                <input type="text" name="client_name" id="client_name" class="form-control" value="<?= old('client_name') ?>" placeholder="e.g. John Doe" required>
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="rating" class="form-label fw-bold small text-dark">Star Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="5" <?= old('rating') === '5' ? 'selected' : '' ?>>5 Stars</option>
                    <option value="4" <?= old('rating') === '4' ? 'selected' : '' ?>>4 Stars</option>
                    <option value="3" <?= old('rating') === '3' ? 'selected' : '' ?>>3 Stars</option>
                    <option value="2" <?= old('rating') === '2' ? 'selected' : '' ?>>2 Stars</option>
                    <option value="1" <?= old('rating') === '1' ? 'selected' : '' ?>>1 Star</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="meta_info" class="form-label fw-bold small text-dark">Meta Info (Verification)</label>
                <input type="text" name="meta_info" id="meta_info" class="form-control" value="<?= old('meta_info') ?>" placeholder="e.g. Verified Client • 2 months ago" required>
            </div>

            <div class="col-md-12 mb-4">
                <label for="content" class="form-label fw-bold small text-dark">Review Content</label>
                <textarea name="content" id="content" class="form-control" rows="4" placeholder="Type review here..." required><?= old('content') ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Add Testimonial</button>
        <a href="<?= base_url('admin/testimonials') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Edit Testimonial</h2>
    <p class="text-muted mb-0">Modify review details of <?= esc($testimonial['client_name']) ?>.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/testimonials/update/' . $testimonial['id']) ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="client_name" class="form-label fw-bold small text-dark">Client Name</label>
                <input type="text" name="client_name" id="client_name" class="form-control" value="<?= esc(old('client_name', $testimonial['client_name'])) ?>" required>
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="rating" class="form-label fw-bold small text-dark">Star Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <?php $selectedRating = old('rating', $testimonial['rating']); ?>
                    <option value="5" <?= $selectedRating == '5' ? 'selected' : '' ?>>5 Stars</option>
                    <option value="4" <?= $selectedRating == '4' ? 'selected' : '' ?>>4 Stars</option>
                    <option value="3" <?= $selectedRating == '3' ? 'selected' : '' ?>>3 Stars</option>
                    <option value="2" <?= $selectedRating == '2' ? 'selected' : '' ?>>2 Stars</option>
                    <option value="1" <?= $selectedRating == '1' ? 'selected' : '' ?>>1 Star</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="meta_info" class="form-label fw-bold small text-dark">Meta Info (Verification)</label>
                <input type="text" name="meta_info" id="meta_info" class="form-control" value="<?= esc(old('meta_info', $testimonial['meta_info'])) ?>" required>
            </div>

            <div class="col-md-12 mb-4">
                <label for="content" class="form-label fw-bold small text-dark">Review Content</label>
                <textarea name="content" id="content" class="form-control" rows="4" required><?= esc(old('content', $testimonial['content'])) ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
        <a href="<?= base_url('admin/testimonials') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

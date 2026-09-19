<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Edit Service Category</h2>
    <p class="text-muted mb-0">Modify content, SEO metadata, images, and rich sections for <strong><?= esc($service['title']) ?></strong>.</p>
</div>

<div class="card p-4 shadow-sm">
    <form class="needs-validation" novalidate action="<?= base_url('admin/services/update/' . $service['id']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <!-- General & SEO Info -->
        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-search me-2"></i> General & SEO Metadata</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label fw-bold small text-dark">H1 Title / Service Title *</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= esc(old('title', $service['title'])) ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="sub_title" class="form-label fw-bold small text-dark">Subtitle / Hero Tagline</label>
                <input type="text" name="sub_title" id="sub_title" class="form-control" value="<?= esc(old('sub_title', $service['sub_title'] ?? '')) ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="meta_title" class="form-label fw-bold small text-dark">Meta Title (SEO)</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?= esc(old('meta_title', $service['meta_title'] ?? '')) ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="short_description" class="form-label fw-bold small text-dark">Short Summary Description *</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="<?= esc(old('short_description', $service['short_description'])) ?>" required>
            </div>

            <div class="col-md-12 mb-3">
                <label for="meta_description" class="form-label fw-bold small text-dark">Meta Description (SEO)</label>
                <textarea name="meta_description" id="meta_description" class="form-control" rows="2"><?= esc(old('meta_description', $service['meta_description'] ?? '')) ?></textarea>
            </div>
        </div>

        <hr class="my-4">

        <!-- Images Upload Section -->
        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-image me-2"></i> Service Images (Upload Options)</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Primary Cover Image File</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <?php if (!empty($service['image'])): ?>
                    <div class="mt-2 small text-muted">
                        Current: <strong><?= esc($service['image']) ?></strong>
                        <div class="mt-1">
                            <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" alt="Cover Image" class="rounded border shadow-sm" style="max-height: 80px; object-fit: cover;">
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="secondary_image" class="form-label fw-bold small text-dark">Secondary Section Image File</label>
                <input type="file" name="secondary_image" id="secondary_image" class="form-control" accept="image/*">
                <?php if (!empty($service['secondary_image'])): ?>
                    <div class="mt-2 small text-muted">
                        Current: <strong><?= esc($service['secondary_image']) ?></strong>
                        <div class="mt-1">
                            <img src="<?= base_url('assets/services/' . esc($service['secondary_image'])) ?>" alt="Secondary Image" class="rounded border shadow-sm" style="max-height: 80px; object-fit: cover;">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <hr class="my-4">

        <!-- Page Content Sections -->
        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-align-left me-2"></i> Page Content Sections</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="long_description" class="form-label fw-bold small text-dark">Main Intro & Description *</label>
                <textarea name="long_description" id="long_description" class="form-control" rows="5" required><?= esc(old('long_description', $service['long_description'])) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="what_is_section" class="form-label fw-bold small text-dark">"What Is [Topic]?" Section Content</label>
                <textarea name="what_is_section" id="what_is_section" class="form-control" rows="5"><?= esc(old('what_is_section', $service['what_is_section'] ?? '')) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="symptoms" class="form-label fw-bold small text-dark">Common Symptoms (Enter 1 per line)</label>
                <textarea name="symptoms" id="symptoms" class="form-control" rows="5"><?= esc(old('symptoms', $service['symptoms'] ?? '')) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="types_help" class="form-label fw-bold small text-dark">Types We Help With (1 per line, e.g. "Type Name: Description")</label>
                <textarea name="types_help" id="types_help" class="form-control" rows="5"><?= esc(old('types_help', $service['types_help'] ?? '')) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="benefits" class="form-label fw-bold small text-dark">How Counselling Can Help / Benefits (1 per line)</label>
                <?php
                $bVal = $service['benefits'];
                $bDec = json_decode($bVal, true);
                if (is_array($bDec)) {
                    $bVal = implode("\n", $bDec);
                }
                ?>
                <textarea name="benefits" id="benefits" class="form-control" rows="5"><?= esc(old('benefits', $bVal)) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="approach" class="form-label fw-bold small text-dark">Our Approach / Methodology (1 per line)</label>
                <textarea name="approach" id="approach" class="form-control" rows="5"><?= esc(old('approach', $service['approach'] ?? '')) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="why_choose" class="form-label fw-bold small text-dark">Why Choose Us Points (1 per line)</label>
                <textarea name="why_choose" id="why_choose" class="form-control" rows="5"><?= esc(old('why_choose', $service['why_choose'] ?? '')) ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="when_seek_help" class="form-label fw-bold small text-dark">When Should You Seek Help? Triggers (1 per line)</label>
                <textarea name="when_seek_help" id="when_seek_help" class="form-control" rows="5"><?= esc(old('when_seek_help', $service['when_seek_help'] ?? '')) ?></textarea>
            </div>

            <div class="col-md-12 mb-4">
                <label for="cta" class="form-label fw-bold small text-dark">Call to Action (CTA) Paragraph</label>
                <textarea name="cta" id="cta" class="form-control" rows="3"><?= esc(old('cta', $service['cta'] ?? '')) ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
        <a href="<?= base_url('admin/services') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

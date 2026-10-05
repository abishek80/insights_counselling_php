<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];

$existingBullets = [];
if (!empty($service['landing_bullet_points'])) {
    $dec = json_decode($service['landing_bullet_points'], true);
    if (is_array($dec)) {
        $existingBullets = $dec;
    } else {
        $existingBullets = array_filter(array_map('trim', explode("\n", $service['landing_bullet_points'])));
    }
}
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Edit Service Category</h2>
    <p class="text-muted mb-0">Modify content, SEO metadata, images, and separate sections for <strong><?= esc($service['title']) ?></strong>.</p>
</div>

<div class="card p-4 shadow-sm">
    <form class="needs-validation" novalidate action="<?= base_url('admin/services/update/' . $service['id']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <!-- Display Location Selector Checkboxes -->
        <div class="mb-4">
            <h5 class="fw-bold text-primary mb-2"><i class="fas fa-sliders-h me-2"></i> Service Display Location & Visibility</h5>
            <p class="text-muted small mb-3">Choose where this service should be displayed. Select one or both options below:</p>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-check form-switch p-3 bg-white border rounded-3 shadow-sm h-100">
                        <input class="form-check-input ms-0 me-2" type="checkbox" name="show_website" id="show_website" value="1" <?= old('show_website', $service['show_website'] ?? 1) == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label fw-bold text-dark cursor-pointer" for="show_website">
                            Show on Website (Main Site)
                        </label>
                        <div class="small text-muted mt-1">Shows this service on the main website services page and homepage cards.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch p-3 border-success border border-2 bg-success-subtle bg-opacity-10 rounded-3 shadow-sm h-100">
                        <input class="form-check-input ms-0 me-2" type="checkbox" name="show_landing" id="show_landing" value="1" <?= old('show_landing', $service['show_landing'] ?? 1) == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label fw-bold text-dark cursor-pointer" for="show_landing">
                            Show on Landing Page
                        </label>
                        <div class="small text-muted mt-1">Shows this service in a separate custom section on the landing page.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN WEBSITE SERVICE SECTION -->
        <div id="website-service-section">
            <!-- General & SEO Info -->
            <h5 class="fw-bold text-primary mb-3"><i class="fas fa-search me-2"></i> Website General & SEO Metadata</h5>
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
                    <label for="short_description" class="form-label fw-bold small text-dark">Website Short Summary Description</label>
                    <input type="text" name="short_description" id="short_description" class="form-control" value="<?= esc(old('short_description', $service['short_description'])) ?>">
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
            <h5 class="fw-bold text-primary mb-3"><i class="fas fa-align-left me-2"></i> Website Page Content Sections</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="long_description" class="form-label fw-bold small text-dark">Main Intro & Description</label>
                    <textarea name="long_description" id="long_description" class="form-control" rows="5"><?= esc(old('long_description', $service['long_description'])) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="what_is_section" class="form-label fw-bold small text-dark">"What Is [Topic]?" Section Content</label>
                    <textarea name="what_is_section" id="what_is_section" class="form-control" rows="5"><?= esc(old('what_is_section', $service['what_is_section'] ?? '')) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="symptoms" class="form-label fw-bold small text-dark">Common Symptoms (1 per line)</label>
                    <input type="text" name="symptoms_intro" class="form-control form-control-sm mb-2" placeholder="Symptoms section intro..." value="<?= esc(old('symptoms_intro', $service['symptoms_intro'] ?? '')) ?>">
                    <textarea name="symptoms" id="symptoms" class="form-control" rows="4"><?= esc(old('symptoms', $service['symptoms'] ?? '')) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="types_help" class="form-label fw-bold small text-dark">Types We Help With (1 per line, e.g. "Type Name: Description")</label>
                    <input type="text" name="types_intro" class="form-control form-control-sm mb-2" placeholder="Types section intro..." value="<?= esc(old('types_intro', $service['types_intro'] ?? '')) ?>">
                    <textarea name="types_help" id="types_help" class="form-control" rows="4"><?= esc(old('types_help', $service['types_help'] ?? '')) ?></textarea>
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
                    <input type="text" name="benefits_intro" class="form-control form-control-sm mb-2" placeholder="Benefits section intro..." value="<?= esc(old('benefits_intro', $service['benefits_intro'] ?? '')) ?>">
                    <textarea name="benefits" id="benefits" class="form-control" rows="4"><?= esc(old('benefits', $bVal)) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="approach" class="form-label fw-bold small text-dark">Our Approach / Methodology (1 per line)</label>
                    <input type="text" name="approach_intro" class="form-control form-control-sm mb-2" placeholder="Approach section intro..." value="<?= esc(old('approach_intro', $service['approach_intro'] ?? '')) ?>">
                    <textarea name="approach" id="approach" class="form-control" rows="4"><?= esc(old('approach', $service['approach'] ?? '')) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="why_choose" class="form-label fw-bold small text-dark">Why Choose Us Points (1 per line)</label>
                    <input type="text" name="why_choose_intro" class="form-control form-control-sm mb-2" placeholder="Why choose intro..." value="<?= esc(old('why_choose_intro', $service['why_choose_intro'] ?? '')) ?>">
                    <textarea name="why_choose" id="why_choose" class="form-control" rows="4"><?= esc(old('why_choose', $service['why_choose'] ?? '')) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="when_seek_help" class="form-label fw-bold small text-dark">When Should You Seek Help? Triggers (1 per line)</label>
                    <input type="text" name="when_seek_outro" class="form-control form-control-sm mb-2" placeholder="When seek help closing statement..." value="<?= esc(old('when_seek_outro', $service['when_seek_outro'] ?? '')) ?>">
                    <textarea name="when_seek_help" id="when_seek_help" class="form-control" rows="4"><?= esc(old('when_seek_help', $service['when_seek_help'] ?? '')) ?></textarea>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="cta" class="form-label fw-bold small text-dark">Call to Action (CTA) Paragraph</label>
                    <textarea name="cta" id="cta" class="form-control" rows="3"><?= esc(old('cta', $service['cta'] ?? '')) ?></textarea>
                </div>
            </div>
        </div>

        <!-- LANDING PAGE SEPARATE SERVICE SECTION -->
        <div id="landing-service-section" class="card p-4 mb-4 border-success border-2 bg-success-subtle bg-opacity-10 rounded-3 shadow-sm">
            <div class="mb-3">
                <h5 class="fw-bold text-success mb-0">Landing Page Service Details</h5>
                <small class="text-muted">Fields configured here will be displayed exclusively in the Landing Page service section.</small>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="landing_title" class="form-label fw-bold small text-dark">Landing Page Service Name</label>
                    <input type="text" name="landing_title" id="landing_title" class="form-control" value="<?= esc(old('landing_title', $service['landing_title'] ?? '')) ?>" placeholder="e.g. Anxiety Counselling & Support">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="landing_short_description" class="form-label fw-bold small text-dark">Landing Page Short Description</label>
                    <input type="text" name="landing_short_description" id="landing_short_description" class="form-control" value="<?= esc(old('landing_short_description', $service['landing_short_description'] ?? '')) ?>" placeholder="Brief tagline or card summary for landing page...">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="landing_description" class="form-label fw-bold small text-dark">Landing Page Full Description</label>
                    <textarea name="landing_description" id="landing_description" class="form-control" rows="3" placeholder="Detailed explanation for landing page readers..."><?= esc(old('landing_description', $service['landing_description'] ?? '')) ?></textarea>
                </div>

                <div class="col-md-12 mb-2">
                    <label class="form-label fw-bold small text-dark d-block">
                        <i class="fas fa-list-ul me-1 text-success"></i> Bullet Points (Multiple Single Input Option)
                    </label>
                    
                    <div id="landing-bullets-container">
                        <!-- Dynamic single input fields inserted via JavaScript -->
                    </div>

                    <button type="button" id="add-bullet-btn" class="btn btn-sm btn-outline-success fw-bold mt-2">
                        <i class="fas fa-plus me-1"></i> Add Bullet Point
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
            <a href="<?= base_url('admin/services') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle Sections Logic based on checkboxes
        const websiteChk = document.getElementById('show_website');
        const landingChk = document.getElementById('show_landing');
        const websiteSection = document.getElementById('website-service-section');
        const landingSection = document.getElementById('landing-service-section');

        function toggleSections() {
            if (websiteChk.checked) {
                websiteSection.style.display = 'block';
            } else {
                websiteSection.style.display = 'none';
            }

            if (landingChk.checked) {
                landingSection.style.display = 'block';
            } else {
                landingSection.style.display = 'none';
            }
        }

        websiteChk.addEventListener('change', toggleSections);
        landingChk.addEventListener('change', toggleSections);
        toggleSections(); // initial call

        // Dynamic Bullet Points logic
        const bulletsContainer = document.getElementById('landing-bullets-container');
        const addBulletBtn = document.getElementById('add-bullet-btn');
        const existingBullets = <?= json_encode($existingBullets) ?>;

        function addBulletRow(value = '') {
            const div = document.createElement('div');
            div.className = 'input-group mb-2 bullet-input-row';
            div.innerHTML = `
                <span class="input-group-text bg-light pe-3"><i class="fas fa-check text-success"></i></span>
                <input type="text" name="landing_bullet_points[]" class="form-control" placeholder="Type bullet point text here..." value="${value}">
                <button type="button" class="btn btn-outline-danger remove-bullet-btn" title="Remove Point"><i class="fas fa-trash"></i></button>
            `;

            div.querySelector('.remove-bullet-btn').addEventListener('click', function() {
                div.remove();
            });

            bulletsContainer.appendChild(div);
        }

        addBulletBtn.addEventListener('click', function() {
            addBulletRow();
        });

        // Pre-populate existing bullets if any exist
        if (Array.isArray(existingBullets) && existingBullets.length > 0) {
            existingBullets.forEach(b => addBulletRow(b));
        } else {
            addBulletRow();
            addBulletRow();
        }
    });
</script>
<?= $this->endSection() ?>

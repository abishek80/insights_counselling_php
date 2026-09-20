<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php 
$validation = \Config\Services::validation(); 
$errors = session()->getFlashdata('errors') ?? [];
?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Add Service Category</h2>
    <p class="text-muted mb-0">Define a new therapeutic category and configure custom page sections, SEO tags, and images.</p>
</div>

<div class="card p-4 shadow-sm">
    <form class="needs-validation" novalidate action="<?= base_url('admin/services/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <!-- Basic & SEO Info -->
        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-search me-2"></i> General & SEO Metadata</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label fw-bold small text-dark">H1 Title / Service Title *</label>
                <input type="text" name="title" id="title" class="form-control <?= (isset($errors['title']) || $validation->hasError('title')) ? 'is-invalid' : '' ?>" value="<?= old('title') ?>" placeholder="e.g. Anxiety Counselling in Chennai" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="sub_title" class="form-label fw-bold small text-dark">Subtitle / Hero Tagline</label>
                <input type="text" name="sub_title" id="sub_title" class="form-control" value="<?= old('sub_title') ?>" placeholder="e.g. Professional Anxiety Counselling for Emotional Well-Being">
            </div>

            <div class="col-md-6 mb-3">
                <label for="meta_title" class="form-label fw-bold small text-dark">Meta Title (SEO)</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?= old('meta_title') ?>" placeholder="e.g. Anxiety Counselling in Chennai | Psychologist Near Me">
            </div>

            <div class="col-md-6 mb-3">
                <label for="short_description" class="form-label fw-bold small text-dark">Short Summary Description *</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="<?= old('short_description') ?>" placeholder="Brief summary shown on service cards..." required>
            </div>

            <div class="col-md-12 mb-3">
                <label for="meta_description" class="form-label fw-bold small text-dark">Meta Description (SEO)</label>
                <textarea name="meta_description" id="meta_description" class="form-control" rows="2" placeholder="SEO search snippet description..."><?= old('meta_description') ?></textarea>
            </div>
        </div>

        <hr class="my-4">

        <!-- Images Upload Section -->
        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-image me-2"></i> Service Images</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Primary Cover Image (Upload File)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <div class="col-md-6 mb-3">
                <label for="secondary_image" class="form-label fw-bold small text-dark">Secondary Section Image (Upload File)</label>
                <input type="file" name="secondary_image" id="secondary_image" class="form-control" accept="image/*">
            </div>
        </div>

        <hr class="my-4">

        <!-- Page Content Sections -->
        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-align-left me-2"></i> Page Content Sections</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="long_description" class="form-label fw-bold small text-dark">Main Intro & Description *</label>
                <textarea name="long_description" id="long_description" class="form-control" rows="5" placeholder="Detailed intro narrative..." required><?= old('long_description') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="what_is_section" class="form-label fw-bold small text-dark">"What Is [Topic]?" Section Content</label>
                <textarea name="what_is_section" id="what_is_section" class="form-control" rows="5" placeholder="Explain the concept, causes, and impacts..."><?= old('what_is_section') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="symptoms" class="form-label fw-bold small text-dark">Common Symptoms (1 per line)</label>
                <input type="text" name="symptoms_intro" class="form-control form-control-sm mb-2" placeholder="Symptoms section intro (e.g. Anxiety impacts both the mind and the body. Common signs include:)" value="<?= old('symptoms_intro') ?>">
                <textarea name="symptoms" id="symptoms" class="form-control" rows="4" placeholder="Excessive worrying...&#10;Difficulty relaxing..."><?= old('symptoms') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="types_help" class="form-label fw-bold small text-dark">Types We Help With (1 per line, e.g. "Type Name: Description")</label>
                <input type="text" name="types_intro" class="form-control form-control-sm mb-2" placeholder="Types section intro (e.g. At Insight Counseling Services, we provide tailored support...)" value="<?= old('types_intro') ?>">
                <textarea name="types_help" id="types_help" class="form-control" rows="4" placeholder="Generalized Anxiety: Heavy worry about daily life..."><?= old('types_help') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="benefits" class="form-label fw-bold small text-dark">How Counselling Can Help / Benefits (1 per line)</label>
                <input type="text" name="benefits_intro" class="form-control form-control-sm mb-2" placeholder="Benefits section intro (e.g. Professional therapy helps you untangle...)" value="<?= old('benefits_intro') ?>">
                <textarea name="benefits" id="benefits" class="form-control" rows="4" placeholder="Reduce spiraling worries&#10;Manage panic symptoms"><?= old('benefits') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="approach" class="form-label fw-bold small text-dark">Our Approach / Methodology (1 per line)</label>
                <input type="text" name="approach_intro" class="form-control form-control-sm mb-2" placeholder="Approach section intro (e.g. We rely on evidence-based therapeutic approaches...)" value="<?= old('approach_intro') ?>">
                <textarea name="approach" id="approach" class="form-control" rows="4" placeholder="Recognize unhelpful thought patterns..."><?= old('approach') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="why_choose" class="form-label fw-bold small text-dark">Why Choose Us Points (1 per line)</label>
                <input type="text" name="why_choose_intro" class="form-control form-control-sm mb-2" placeholder="Why choose intro (e.g. Our practice is rooted in providing professional...)" value="<?= old('why_choose_intro') ?>">
                <textarea name="why_choose" id="why_choose" class="form-control" rows="4" placeholder="Experienced empathetic psychologists..."><?= old('why_choose') ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="when_seek_help" class="form-label fw-bold small text-dark">When Should You Seek Help? Triggers (1 per line)</label>
                <input type="text" name="when_seek_outro" class="form-control form-control-sm mb-2" placeholder="When seek help closing statement (e.g. Taking that step early on can prevent...)" value="<?= old('when_seek_outro') ?>">
                <textarea name="when_seek_help" id="when_seek_help" class="form-control" rows="4" placeholder="Anxiety is actively disrupting daily life..."><?= old('when_seek_help') ?></textarea>
            </div>

            <div class="col-md-12 mb-4">
                <label for="cta" class="form-label fw-bold small text-dark">Call to Action (CTA) Paragraph</label>
                <textarea name="cta" id="cta" class="form-control" rows="3" placeholder="Closing encouragement to take the first step towards emotional well-being..."><?= old('cta') ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Create Service</button>
        <a href="<?= base_url('admin/services') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title / Hero Banner -->
<section class="page-header text-center bg-primary-subtle py-5">
    <div class="container py-3">
        <h1 class="fw-bold text-primary mb-2"><?= esc($service['title']) ?></h1>
        <?php if (!empty($service['sub_title'])): ?>
            <p class="lead text-muted mb-3"><?= esc($service['sub_title']) ?></p>
        <?php else: ?>
            <p class="lead text-muted mb-3"><?= esc($service['short_description']) ?></p>
        <?php endif; ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('services') ?>" class="text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($service['title']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Main Overview & Detailed Description Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <?php if (!empty($service['image'])): ?>
                    <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" class="img-fluid w-100 rounded-5 shadow-lg border" alt="<?= esc($service['title']) ?>">
                <?php endif; ?>
            </div>
            <div class="col-lg-6 ps-lg-4">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">PROFESSIONAL PSYCHOLOGICAL SUPPORT</h6>
                <h2 class="fw-bold text-dark mb-3"><?= esc($service['title']) ?></h2>
                <div class="title-underline mb-4"></div>
                <div class="text-muted fs-5 mb-4" style="line-height: 1.8;">
                    <?= nl2br(esc($service['long_description'])) ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- "What is [Topic]?" Section -->
<?php if (!empty($service['what_is_section'])): ?>
<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="p-4 p-md-5 rounded-5 bg-white border shadow-sm">
                    <h3 class="fw-bold text-primary mb-3"><i class="fas fa-question-circle me-2"></i> What is <?= esc($service['title']) ?>?</h3>
                    <div class="text-muted fs-5 mb-0" style="line-height: 1.8;">
                        <?= nl2br(esc($service['what_is_section'])) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Symptoms Section -->
<?php 
$symptomsList = array_filter(array_map('trim', explode("\n", $service['symptoms'] ?? '')));
if (!empty($symptomsList)):
?>
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">IDENTIFYING THE SIGNS</h6>
            <h2 class="fw-bold text-dark">Common Symptoms & Indicators</h2>
            <div class="title-underline mx-auto"></div>
        </div>
        <div class="row g-3">
            <?php foreach ($symptomsList as $symptom): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="p-3 rounded-4 bg-light border h-100 d-flex align-items-center shadow-sm">
                        <i class="fas fa-exclamation-circle text-danger fs-5 me-3"></i>
                        <span class="fw-medium text-dark"><?= esc($symptom) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Types We Help With Section -->
<?php 
$typesList = array_filter(array_map('trim', explode("\n", $service['types_help'] ?? '')));
if (!empty($typesList)):
?>
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">TAILORED THERAPEUTIC CARE</h6>
            <h2 class="fw-bold text-dark">Types of Concerns We Help With</h2>
            <div class="title-underline mx-auto"></div>
        </div>
        <div class="row g-4">
            <?php foreach ($typesList as $typeItem): 
                $parts = explode(':', $typeItem, 2);
                $typeTitle = $parts[0];
                $typeDesc = isset($parts[1]) ? trim($parts[1]) : '';
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 rounded-4 bg-white border h-100 shadow-sm">
                        <h5 class="fw-bold text-primary mb-2"><i class="fas fa-shield-alt me-2 text-warning"></i> <?= esc($typeTitle) ?></h5>
                        <?php if (!empty($typeDesc)): ?>
                            <p class="text-muted small mb-0"><?= esc($typeDesc) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Secondary Section Image & Benefits Grid -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <?php if (!empty($service['secondary_image'])): ?>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="<?= base_url('assets/services/' . esc($service['secondary_image'])) ?>" class="img-fluid w-100 rounded-5 shadow-lg border" alt="<?= esc($service['title']) ?> Mindfulness">
                </div>
            <?php endif; ?>
            
            <div class="<?= !empty($service['secondary_image']) ? 'col-lg-6 ps-lg-4' : 'col-lg-12' ?>">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">TRANSFORMATIONAL GUIDANCE</h6>
                <h2 class="fw-bold text-dark mb-4">How Counselling Can Help</h2>
                
                <?php 
                $benefitsList = [];
                $rawBenefits = $service['benefits'] ?? '';
                $decoded = json_decode($rawBenefits, true);
                if (is_array($decoded)) {
                    $benefitsList = $decoded;
                } else {
                    $benefitsList = array_filter(array_map('trim', explode("\n", $rawBenefits)));
                }
                ?>

                <?php if (!empty($benefitsList)): ?>
                    <div class="row g-3">
                        <?php foreach ($benefitsList as $benefit): ?>
                            <div class="col-md-6">
                                <div class="p-3 rounded-4 bg-primary-subtle border border-primary-subtle d-flex align-items-start h-100">
                                    <i class="fas fa-check-circle text-success fs-5 me-3 mt-1"></i>
                                    <span class="fw-medium text-dark"><?= esc($benefit) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Our Approach & Why Choose Us -->
<?php 
$approachList = array_filter(array_map('trim', explode("\n", $service['approach'] ?? '')));
$whyChooseList = array_filter(array_map('trim', explode("\n", $service['why_choose'] ?? '')));
if (!empty($approachList) || !empty($whyChooseList)):
?>
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($approachList)): ?>
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-5 bg-white border h-100 shadow-sm">
                        <h4 class="fw-bold text-primary mb-3"><i class="fas fa-compass me-2"></i> Our Approach</h4>
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($approachList as $app): ?>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-arrow-circle-right text-primary me-3 mt-1"></i>
                                    <span class="text-muted fs-6"><?= esc($app) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($whyChooseList)): ?>
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-5 bg-white border h-100 shadow-sm">
                        <h4 class="fw-bold text-primary mb-3"><i class="fas fa-star me-2 text-warning"></i> Why Choose Us</h4>
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($whyChooseList as $reason): ?>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check-double text-success me-3 mt-1"></i>
                                    <span class="text-muted fs-6"><?= esc($reason) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- When Should You Seek Help? -->
<?php 
$whenSeekList = array_filter(array_map('trim', explode("\n", $service['when_seek_help'] ?? '')));
if (!empty($whenSeekList)):
?>
<section class="section-padding bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="p-4 p-md-5 rounded-5 bg-danger-subtle border border-danger-subtle shadow-sm">
                    <h3 class="fw-bold text-danger mb-3"><i class="fas fa-clock me-2"></i> When Should You Seek Help?</h3>
                    <p class="text-dark mb-4">You may want to consider reaching out for professional support if you notice any of the following triggers:</p>
                    <div class="row g-3">
                        <?php foreach ($whenSeekList as $trigger): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start bg-white p-3 rounded-4 border">
                                    <i class="fas fa-user-clock text-danger me-3 mt-1"></i>
                                    <span class="text-dark fw-medium small"><?= esc($trigger) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Call To Action (Take the First Step) -->
<section class="section-padding bg-primary text-white text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h2 class="fw-bold mb-3 text-white">Take the First Step Towards Better Mental Health</h2>
                <p class="fs-5 text-white-50 mb-4">
                    <?= !empty($service['cta']) ? esc($service['cta']) : 'If you are looking for dedicated psychological support in Chennai, Insight Counseling Services is here to walk beside you. With professional guidance and evidence-based tools, stepping into a balanced, fulfilling life is entirely possible.' ?>
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3 align-items-center">
                    <a href="tel:<?= preg_replace('/\s+/', '', $settings['phone'] ?? '9445662922') ?>" class="btn btn-secondary px-4 py-3 rounded-pill">
                        <i class="fas fa-phone me-2"></i> Call <?= esc($settings['phone'] ?? '9445662922') ?>
                    </a>
                    <a href="mailto:<?= esc($settings['email'] ?? 'lekhapsy@gmail.com') ?>" class="btn btn-outline-light px-4 py-3 rounded-pill">
                        <i class="fas fa-envelope me-2"></i> Email Us
                    </a>
                    <?php if (!empty($settings['booking_url'])): ?>
                        <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn btn-warning px-4 py-3 rounded-pill fw-semibold">
                            <i class="fas fa-calendar-check me-2"></i> Book Consultation
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

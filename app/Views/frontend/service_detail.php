<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero / Page Header -->
<section class="page-header text-center bg-primary-subtle py-5">
    <div class="container py-3">
        <h1 class="fw-bold text-primary mb-2"><?= esc($service['title']) ?></h1>
        <?php if (!empty($service['sub_title'])): ?>
            <p class="lead text-muted mb-3 mx-auto" style="max-width: 800px;"><?= esc($service['sub_title']) ?></p>
        <?php else: ?>
            <p class="lead text-muted mb-3 mx-auto" style="max-width: 800px;"><?= esc($service['short_description']) ?></p>
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

<!-- Main Overview Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <?php if (!empty($service['image'])): ?>
                <div class="col-lg-6">
                    <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" class="img-fluid w-100 rounded-4 shadow-sm border" alt="<?= esc($service['title']) ?>">
                </div>
            <?php endif; ?>
            <div class="<?= !empty($service['image']) ? 'col-lg-6 ps-lg-4' : 'col-lg-10 mx-auto' ?>">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-medium text-uppercase" style="letter-spacing: 0.5px;">Professional Psychological Support</span>
                <h2 class="fw-bold text-dark mb-3"><?= esc($service['title']) ?></h2>
                <div class="title-underline mb-4"></div>
                <div class="text-secondary fs-6 mb-4" style="line-height: 1.8;">
                    <?= nl2br(esc($service['long_description'])) ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- "What is [Topic]?" Section -->
<?php if (!empty($service['what_is_section'])): ?>
<section class="section-padding bg-primary-subtle border-top border-bottom">
    <div class="container">
        <div class="pe-lg-4">
            <h3 class="fw-bold text-primary mb-3">What is <?= esc($service['title']) ?>?</h3>
            <div class="text-secondary fs-6" style="line-height: 1.8;">
                <?= nl2br(esc($service['what_is_section'])) ?>
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
            <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-medium text-uppercase" style="letter-spacing: 0.5px;">Identifying the Signs</span>
            <h2 class="fw-bold text-dark">Common Symptoms & Indicators</h2>
            <?php if (!empty($service['symptoms_intro'])): ?>
                <p class="text-muted mx-auto mb-0" style="max-width: 750px;"><?= esc($service['symptoms_intro']) ?></p>
            <?php endif; ?>
        </div>
        
        <div class="row g-3">
            <?php foreach ($symptomsList as $symptom): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="p-3 rounded-3 bg-primary-subtle border-0 d-flex align-items-center h-100 transition-all">
                        <i class="fas fa-check text-primary me-3 flex-shrink-0"></i>
                        <span class="text-dark fw-medium fs-6"><?= esc($symptom) ?></span>
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
<section class="section-padding bg-primary-subtle border-top border-bottom">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-medium text-uppercase" style="letter-spacing: 0.5px;">Tailored Therapeutic Care</span>
            <h2 class="fw-bold text-dark">Types of Concerns We Help With</h2>
            <?php if (!empty($service['types_intro'])): ?>
                <p class="text-muted mx-auto mb-0" style="max-width: 750px;"><?= esc($service['types_intro']) ?></p>
            <?php endif; ?>
        </div>
        
        <div class="row g-4">
            <?php foreach ($typesList as $typeItem): 
                $parts = explode(':', $typeItem, 2);
                $typeTitle = $parts[0];
                $typeDesc = isset($parts[1]) ? trim($parts[1]) : '';
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 rounded-4 bg-white border-0 shadow-sm h-100 border-start border-4 border-primary">
                        <h5 class="fw-bold text-dark mb-2"><?= esc($typeTitle) ?></h5>
                        <?php if (!empty($typeDesc)): ?>
                            <p class="text-muted small mb-0" style="line-height: 1.6;"><?= esc($typeDesc) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- How Counselling Can Help Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-5 align-items-center">
            <?php if (!empty($service['secondary_image'])): ?>
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="<?= base_url('assets/services/' . esc($service['secondary_image'])) ?>" class="img-fluid w-100 rounded-4 shadow-sm border" alt="<?= esc($service['title']) ?> Benefits">
                </div>
            <?php endif; ?>
            
            <div class="<?= !empty($service['secondary_image']) ? 'col-lg-7 ps-lg-4' : 'col-lg-10 mx-auto' ?>">
                <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-medium text-uppercase" style="letter-spacing: 0.5px;">Transformational Guidance</span>
                <h2 class="fw-bold text-dark mb-3">How Counselling Can Help</h2>
                <div class="title-underline mb-4"></div>
                
                <?php if (!empty($service['benefits_intro'])): ?>
                    <p class="text-muted fs-6 mb-4" style="line-height: 1.7;"><?= esc($service['benefits_intro']) ?></p>
                <?php endif; ?>
                
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
                                <div class="d-flex align-items-start py-2">
                                    <i class="fas fa-check-circle text-success me-3 mt-1 fs-6 flex-shrink-0"></i>
                                    <span class="text-dark fw-medium fs-6"><?= esc($benefit) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Our Approach & Why Choose Us Section -->
<?php 
$approachList = array_filter(array_map('trim', explode("\n", $service['approach'] ?? '')));
$whyChooseList = array_filter(array_map('trim', explode("\n", $service['why_choose'] ?? '')));
if (!empty($approachList) || !empty($whyChooseList)):
?>
<section class="section-padding bg-primary-subtle border-top border-bottom">
    <div class="container">
        <div class="row g-5">
            <?php if (!empty($approachList)): ?>
                <div class="col-lg-6">
                    <div class="pe-lg-3">
                        <h3 class="fw-bold text-primary mb-3">Our Approach</h3>
                        <?php if (!empty($service['approach_intro'])): ?>
                            <p class="text-muted fs-6 mb-4" style="line-height: 1.7;"><?= esc($service['approach_intro']) ?></p>
                        <?php endif; ?>
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($approachList as $app): ?>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-arrow-right text-primary me-3 mt-1 flex-shrink-0"></i>
                                    <span class="text-dark fs-6"><?= esc($app) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($whyChooseList)): ?>
                <div class="col-lg-6">
                    <div class="ps-lg-3">
                        <h3 class="fw-bold text-primary mb-3">Why Choose Us</h3>
                        <?php if (!empty($service['why_choose_intro'])): ?>
                            <p class="text-muted fs-6 mb-4" style="line-height: 1.7;"><?= esc($service['why_choose_intro']) ?></p>
                        <?php endif; ?>
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($whyChooseList as $reason): ?>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fas fa-check text-success me-3 mt-1 flex-shrink-0"></i>
                                    <span class="text-dark fs-6"><?= esc($reason) ?></span>
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

<!-- Call To Action Section -->
<section class="section-padding bg-primary-color text-white text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3 text-white">Take the First Step Towards Better Mental Health</h2>
                <p class="fs-6 text-white-50 mb-4" style="line-height: 1.7;">
                    <?= !empty($service['cta']) ? esc($service['cta']) : 'If you are looking for dedicated psychological support in Chennai, Insight Counseling Services is here to walk beside you. With professional guidance and evidence-based tools, stepping into a balanced, fulfilling life is entirely possible.' ?>
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3 align-items-center">
                    <a href="tel:<?= preg_replace('/\s+/', '', $settings['phone'] ?? '9445662922') ?>" class="btn btn-secondary px-4 py-3 rounded-pill">
                        <i class="fas fa-phone me-2"></i> <?= esc($settings['phone'] ?? '9445662922') ?>
                    </a>
                    <a href="mailto:<?= esc($settings['email'] ?? 'lekhapsy@gmail.com') ?>" class="btn btn-outline-light px-4 py-3 rounded-pill">
                        <i class="fas fa-envelope me-2"></i> <?= esc($settings['email'] ?? 'lekhapsy@gmail.com') ?>
                    </a>
                    <?php if (!empty($settings['booking_url'])): ?>
                        <a href="<?= esc($settings['booking_url']) ?>" target="_blank" rel="noopener" class="btn btn-secondary px-4 py-3 rounded-pill">
                            <i class="fas fa-calendar-check me-2"></i> Book Your Consultation
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- When Should You Seek Help? Section -->
<?php 
$whenSeekList = array_filter(array_map('trim', explode("\n", $service['when_seek_help'] ?? '')));
if (!empty($whenSeekList)):
?>
<section class="section-padding bg-white">
    <div class="container">
        <div class="p-4 p-md-5 rounded-4 bg-primary-subtle border-start border-4 border-primary shadow-sm">
            <h3 class="fw-bold text-dark mb-2">When Should You Seek Professional Support?</h3>
            <p class="text-muted mb-4 fs-6">Consider reaching out for professional counselling if you experience any of the following:</p>
            
            <div class="row g-3 mb-4">
                <?php foreach ($whenSeekList as $trigger): ?>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-circle text-primary me-3 mt-2 flex-shrink-0" style="font-size: 0.4rem;"></i>
                            <span class="text-dark fw-medium fs-6"><?= esc($trigger) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (!empty($service['when_seek_outro'])): ?>
                <div class="bg-white p-4 rounded-3">
                    <p class="text-primary fw-medium mb-0 fs-6"><?= esc($service['when_seek_outro']) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?= $this->endSection() ?>


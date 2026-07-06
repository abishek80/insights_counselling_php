<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to common questions about our counseling, appointments, and processes.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </nav>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="section-padding bg-white">
    <div class="container">
        <?php if (!empty($faqs)): ?>
            <div class="accordion shadow-sm" id="faqAccordion">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?= $faq['id'] ?>">
                            <button class="accordion-button fw-bold text-primary-color <?= $index === 0 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $faq['id'] ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $faq['id'] ?>">
                                <?= esc($faq['question']) ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $faq['id'] ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $faq['id'] ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="line-height: 1.7;">
                                <?= nl2br(esc($faq['answer'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Fallback standard questions if empty -->
            <div class="accordion shadow-sm" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button fw-bold text-primary-color" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            What can I expect in the first session?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="line-height: 1.7;">
                            The first session is a safe space to discuss what brings you to therapy. The counselor will collect historical context, understand your challenges, and collaborate with you to define your healing goals.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading2">
                        <button class="accordion-button fw-bold text-primary-color collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            How long is a counseling session?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="line-height: 1.7;">
                            A standard session lasts between 45 to 60 minutes for individuals and up to 75 minutes for couples.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading3">
                        <button class="accordion-button fw-bold text-primary-color collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Is counseling confidential?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="line-height: 1.7;">
                            Absolutely. Everything shared in your counseling session remains strictly confidential, conforming to ethical guidelines. Details are only disclosed in extreme safety crises as legally required.
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>

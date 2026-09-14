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

<!-- FAQ Section -->
<section class="section-padding bg-body-secondary">
    <div class="container">
        <!-- Interactive Search Bar -->
        <div class="faq-search-wrapper">
            <i class="fas fa-search faq-search-icon"></i>
            <input type="text" id="faqSearchInput" class="form-control faq-search-input" placeholder="Search questions or keywords (e.g. anxiety, fee, online)..." aria-label="Search FAQs">
        </div>

        <?php 
        $activeFaqs = !empty($faqs) ? $faqs : [
            ["id" => 1, "question" => "What is counseling and how can it help me?", "answer" => "Counseling is a professional process that helps individuals understand their thoughts, emotions, and behaviors. It can help with stress, anxiety, depression, relationship concerns, academic challenges, and personal growth."],
            ["id" => 2, "question" => "How do I know if I need counseling?", "answer" => "You may benefit from counseling if you are experiencing persistent stress, anxiety, low mood, relationship difficulties, academic pressure, workplace stress, or challenges coping with life changes."],
            ["id" => 3, "question" => "Do I need counseling even if my problems are not severe?", "answer" => "Yes. Counseling is not only for severe mental health concerns. Many people seek counseling to improve emotional well-being, build resilience, enhance relationships, and develop healthier coping skills."],
            ["id" => 4, "question" => "What is the difference between a psychologist and a psychiatrist?", "answer" => "A psychologist provides counseling, psychotherapy, and psychological assessments. A psychiatrist is a medical doctor who can diagnose mental health conditions and prescribe medication when necessary."],
            ["id" => 5, "question" => "Do you provide counseling for anxiety and depression?", "answer" => "Yes. We offer professional counseling for anxiety, depression, panic attacks, excessive worry, emotional distress, and related mental health concerns."],
            ["id" => 6, "question" => "Can counseling help with academic stress and exam anxiety?", "answer" => "Yes. Our academic stress counseling services help students manage exam anxiety, improve concentration, build confidence, and develop effective coping strategies."],
            ["id" => 7, "question" => "Do you offer teen counseling?", "answer" => "Yes. We provide specialized teen counseling for academic stress, emotional difficulties, behavioral concerns, self-esteem issues, and parent-teen relationship challenges."],
            ["id" => 8, "question" => "Can counseling help with workplace stress and burnout?", "answer" => "Yes. Counseling can help individuals manage workplace stress, burnout, career uncertainty, work-life balance concerns, and professional challenges."],
            ["id" => 9, "question" => "Can counseling help after a breakup, separation, or divorce?", "answer" => "Yes. Counseling can help individuals process emotions, cope with grief and loss, rebuild confidence, and move forward in a healthy manner."],
            ["id" => 10, "question" => "Can counseling help with anger management?", "answer" => "Yes. Anger management counseling helps individuals understand emotional triggers, improve emotional regulation, and develop healthier communication skills."],
            ["id" => 11, "question" => "Can counseling improve self-confidence and self-esteem?", "answer" => "Yes. Counseling can help identify negative thought patterns, improve self-awareness, build confidence, and promote personal growth."],
            ["id" => 12, "question" => "Do you provide couple counseling in Chennai?", "answer" => "Yes. Our couple counseling services help partners improve communication, resolve conflicts, rebuild trust, strengthen emotional intimacy, and enhance relationship satisfaction."],
            ["id" => 13, "question" => "Do you provide LGBTQ+ affirmative counseling?", "answer" => "Yes. We provide a safe, respectful, and non-judgmental space for LGBTQ+ individuals. Counseling focuses on emotional well-being, self-acceptance, relationships, identity-related concerns, and personal growth."],
            ["id" => 14, "question" => "Can I discuss my sexual orientation or gender identity in counseling?", "answer" => "Absolutely. Counseling is a confidential space where you can openly discuss questions or concerns related to sexual orientation, gender identity, self-discovery, relationships, and emotional well-being."],
            ["id" => 15, "question" => "Do you offer counseling for LGBTQ+ couples?", "answer" => "Yes. We provide couple counseling for LGBTQ+ partners to help improve communication, navigate relationship challenges, strengthen intimacy, and build healthier relationships."],
            ["id" => 16, "question" => "Do you provide online counseling in Chennai?", "answer" => "Yes. We offer secure online counseling sessions, allowing clients to access professional mental health support from the comfort of their homes."],
            ["id" => 17, "question" => "What happens during the first counseling session?", "answer" => "The first session focuses on understanding your concerns, discussing your goals, gathering relevant background information, and creating a personalized counseling plan."],
            ["id" => 18, "question" => "How long does a counseling session last?", "answer" => "Individual counseling sessions typically last 50 minutes. Couple and family counseling sessions may last longer based on the requirements."],
            ["id" => 19, "question" => "How many counseling sessions will I need?", "answer" => "The number of sessions depends on your concerns, goals, and progress. Some individuals benefit from a few sessions, while others may require longer-term support."],
            ["id" => 20, "question" => "How often should I attend counseling sessions?", "answer" => "Most clients begin with weekly or bi-weekly sessions. The frequency may be adjusted based on your needs and progress."],
            ["id" => 21, "question" => "Is counseling confidential?", "answer" => "Yes. All counseling sessions are confidential and follow professional ethical guidelines, except in situations involving risk of harm or legal obligations."],
            ["id" => 22, "question" => "Will I be given advice during counseling?", "answer" => "Counseling is not about telling you what to do. Instead, it helps you gain insight, explore options, and make informed decisions that align with your values and goals."],
            ["id" => 23, "question" => "Do you provide psychological assessments?", "answer" => "Yes. Psychological assessments may be recommended when needed to better understand personality traits, emotional concerns, behavioral patterns, and other psychological factors."],
            ["id" => 24, "question" => "How can I book an appointment with a psychologist in Chennai?", "answer" => "You can book an appointment through our website, WhatsApp, or phone call. We offer both online and in-person counseling appointments."],
            ["id" => 25, "question" => "What if I need to cancel or reschedule my appointment?", "answer" => "Appointments cannot be canceled or refunded once booked. However, in case of a genuine emergency, you may reschedule your session one time, subject to availability. Please inform us as early as possible if you need to request a reschedule."],
            ["id" => 26, "question" => "Why choose Insight Counseling?", "answer" => "Insight Counseling provides confidential, evidence-based counseling services for individuals, couples, teenagers, and families. Our experienced psychologists support clients in managing stress, anxiety, depression, relationship concerns, academic challenges, and overall emotional well-being."]
        ];
        ?>

        <!-- Custom Card Accordion -->
        <div class="accordion faq-accordion-custom" id="faqAccordion">
            <?php foreach ($activeFaqs as $index => $faq): 
                $faqId = isset($faq['id']) ? $faq['id'] : ($index + 1);
            ?>
                <div class="accordion-item faq-item-card">
                    <h2 class="accordion-header" id="heading<?= $faqId ?>">
                        <button class="accordion-button <?= $index === 0 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $faqId ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $faqId ?>">
                            <span class="faq-icon-circle"><i class="fas fa-question"></i></span>
                            <span class="faq-question-text"><?= esc($faq['question']) ?></span>
                        </button>
                    </h2>
                    <div id="collapse<?= $faqId ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $faqId ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= nl2br(esc($faq['answer'])) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- No Results Message -->
        <div id="faqNoResults" class="text-center py-5 d-none">
            <i class="fas fa-search-minus text-muted display-4 mb-3"></i>
            <h4 class="fw-bold text-dark">No matching questions found</h4>
            <p class="text-muted">Try searching with a different term or reach out to us directly.</p>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('faqSearchInput');
        const faqItems = document.querySelectorAll('.faq-item-card');
        const noResults = document.getElementById('faqNoResults');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                let matches = 0;

                faqItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(query)) {
                        item.style.display = 'block';
                        matches++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (noResults) {
                    if (matches === 0) {
                        noResults.classList.remove('d-none');
                    } else {
                        noResults.classList.add('d-none');
                    }
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>

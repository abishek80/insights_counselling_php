<?php helper('settings'); $settings = get_settings(); ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Page Title -->
<section class="page-header text-center">
    <div class="container">
        <h1>Our Team</h1>
        <p>Professional, compassionate, and experienced counseling psychologists.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Team</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Team Members Grid -->
<section class="section-padding bg-white" id="teams">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php if (!empty($team)): ?>
                <?php foreach ($team as $member): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-card bg-body-secondary h-100 d-flex flex-column gap-2 justify-content-between mt-3">
                            <div>
                                <div class="team-img-wrapper">
                                    <img src="<?= base_url('assets/team/' . esc($member['image'])) ?>" class="team-img" alt="<?= esc($member['name']) ?>">
                                </div>
                                <h5><?= esc($member['name']) ?></h5>
                                <div class="team-role"><?= esc($member['role']) ?></div>
                                <p class="team-desc"><?= esc($member['qualifications']) ?></p>
                                <div class="team-langs"><?= esc($member['languages']) ?></div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-3">
                                <button class="btn-team-dark" data-bs-toggle="modal" data-bs-target="#teamModal" data-id="<?= $member['id'] ?>">VIEW PROFILE</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No team members found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Dynamic Team Profile Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content modal-profile position-relative">
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body">
                <div class="row g-0">
                    <div class="col-lg-5 profile-img-col d-none d-lg-block" id="modal-img-col"></div>
                    <div class="col-lg-7 profile-info-col">
                        <h2 class="fw-bold mb-1" id="modal-name"></h2>
                        <div class="profile-role" id="modal-role"></div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="profile-detail-content">
                                <h6>Qualifications</h6>
                                <p id="modal-qual"></p>
                            </div>
                        </div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="profile-detail-content">
                                <h6>Languages</h6>
                                <p id="modal-langs"></p>
                            </div>
                        </div>

                        <div class="profile-detail-item">
                            <div class="profile-detail-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="profile-detail-content">
                                <h6>Specialties</h6>
                                <div id="modal-specialties" class="d-flex flex-wrap gap-1 mt-1"></div>
                            </div>
                        </div>

                        <div class="profile-about-label">ABOUT</div>
                        <p class="profile-about-text" id="modal-about"></p>

                        <button class="btn-book-profile" onclick="window.open('<?= esc($settings['booking_url']) ?>', '_blank')">
                            <i class="fas fa-comment-dots"></i> Book Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    (function() {
        const teamMembers = <?= json_encode($team) ?>;
        const teamModal = document.getElementById('teamModal');
        
        if (teamModal) {
            teamModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const memberId = button.getAttribute('data-id');
                const member = teamMembers.find(m => m.id == memberId);
                
                if (member) {
                    document.getElementById('modal-name').textContent = member.name;
                    document.getElementById('modal-role').textContent = member.role;
                    document.getElementById('modal-qual').textContent = member.qualifications;
                    document.getElementById('modal-langs').textContent = member.languages;
                    document.getElementById('modal-about').textContent = member.about;
                    
                    const imgCol = document.getElementById('modal-img-col');
                    imgCol.style.backgroundImage = `url('<?= base_url("assets/team/") ?>${member.image}')`;
                    
                    const specialtiesContainer = document.getElementById('modal-specialties');
                    specialtiesContainer.innerHTML = '';
                    const specialties = member.specialties.split(',');
                    specialties.forEach(spec => {
                        const tag = document.createElement('span');
                        tag.className = 'specialty-tag';
                        tag.textContent = spec.trim();
                        specialtiesContainer.appendChild(tag);
                    });
                }
            });
        }
    })();
</script>
<?= $this->endSection() ?>

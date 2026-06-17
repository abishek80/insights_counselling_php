<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <h2 class="fw-bold text-primary-color mb-1">Edit Team Member</h2>
    <p class="text-muted mb-0">Modify professional details of <?= esc($member['name']) ?>.</p>
</div>

<div class="card p-4">
    <form action="<?= base_url('admin/team/update/' . $member['id']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label fw-bold small text-dark">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= esc(old('name', $member['name'])) ?>" required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="role" class="form-label fw-bold small text-dark">Professional Role</label>
                <input type="text" name="role" id="role" class="form-control" value="<?= esc(old('role', $member['role'])) ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="qualifications" class="form-label fw-bold small text-dark">Qualifications</label>
                <input type="text" name="qualifications" id="qualifications" class="form-control" value="<?= esc(old('qualifications', $member['qualifications'])) ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="languages" class="form-label fw-bold small text-dark">Languages Spoken</label>
                <input type="text" name="languages" id="languages" class="form-control" value="<?= esc(old('languages', $member['languages'])) ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="specialties" class="form-label fw-bold small text-dark">Specialties (comma-separated)</label>
                <input type="text" name="specialties" id="specialties" class="form-control" value="<?= esc(old('specialties', $member['specialties'])) ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="image" class="form-label fw-bold small text-dark">Change Photo (leave blank to keep current)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <div class="mt-2 text-muted small">
                    Current file: <strong><?= esc($member['image']) ?></strong>
                </div>
            </div>

            <div class="col-md-12 mb-4">
                <label for="about" class="form-label fw-bold small text-dark">About Profile Description</label>
                <textarea name="about" id="about" class="form-control" rows="4" required><?= esc(old('about', $member['about'])) ?></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="fas fa-save me-1"></i> Save Changes</button>
        <a href="<?= base_url('admin/team') ?>" class="btn btn-outline-secondary px-4 fw-bold ms-2">Cancel</a>
    </form>
</div>

<?= $this->endSection() ?>

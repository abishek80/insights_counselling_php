<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Team Management</h2>
        <p class="text-muted mb-0">Manage clinic counselors and psychologists.</p>
    </div>
    <a href="<?= base_url('admin/team/create') ?>" class="btn btn-primary fw-bold"><i class="fas fa-plus me-1"></i> Add Team Member</a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle rounded-3 overflow-hidden">
            <thead>
                <tr>
                    <th style="width: 80px;">Photo</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Languages</th>
                    <th>Custom Buttons</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($team)): ?>
                    <?php foreach ($team as $member): ?>
                        <?php 
                            $memberBtns = !empty($member['custom_buttons']) ? json_decode($member['custom_buttons'], true) : [];
                        ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('assets/team/' . esc($member['image'])) ?>" alt="<?= esc($member['name']) ?>" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover; border: 2px solid #2D2A70;">
                            </td>
                            <td><strong><?= esc($member['name']) ?></strong></td>
                            <td><span class="badge bg-light text-primary border"><?= esc($member['role']) ?></span></td>
                            <td><?= esc($member['languages']) ?></td>
                            <td>
                                <?php if (!empty($memberBtns) && is_array($memberBtns)): ?>
                                    <div class="d-flex flex-wrap gap-1">
                                        <?php foreach ($memberBtns as $b): ?>
                                            <span class="badge bg-light text-primary border" style="font-size: 0.75rem;">
                                                <i class="fas fa-link me-1"></i><?= esc($b['label']) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted small">Default (1)</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($member['status'] == 1): ?>
                                    <a href="<?= base_url('admin/team/toggle-status/' . $member['id']) ?>" class="btn btn-sm btn-success fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i> Active</a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/team/toggle-status/' . $member['id']) ?>" class="btn btn-sm btn-secondary fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-times-circle me-1"></i> Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('admin/team/edit/' . $member['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/team/delete/' . $member['id']) ?>" onclick="return confirm('Are you sure you want to delete this team member?');" class="btn btn-sm btn-outline-danger btn-action" title="Delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No team members registered yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

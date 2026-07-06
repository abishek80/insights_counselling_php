<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Branch Locations</h2>
        <p class="text-muted mb-0">Manage clinic branch locations and contact details.</p>
    </div>
    <a href="<?= base_url('admin/branches/create') ?>" class="btn btn-primary fw-bold"><i class="fas fa-plus me-1"></i> Add Branch Location</a>
</div>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Branch Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Map Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($branches)): ?>
                    <?php foreach ($branches as $branch): ?>
                        <tr>
                            <td><strong><?= esc($branch['name']) ?></strong></td>
                            <td class="small text-muted" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="<?= esc($branch['address']) ?>">
                                <?= esc($branch['address']) ?>
                            </td>
                            <td><?= esc($branch['phone']) ?></td>
                            <td><?= esc($branch['email']) ?></td>
                            <td>
                                <?php if (!empty($branch['map_url'])): ?>
                                    <a href="<?= esc($branch['map_url']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary py-1 px-2 text-decoration-none">
                                        <i class="fas fa-map-marker-alt text-danger me-1"></i> View Map
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted small">No URL</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($branch['status'] == 1): ?>
                                    <a href="<?= base_url('admin/branches/toggle-status/' . $branch['id']) ?>" class="btn btn-sm btn-success fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i> Active</a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/branches/toggle-status/' . $branch['id']) ?>" class="btn btn-sm btn-secondary fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-times-circle me-1"></i> Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/branches/edit/' . $branch['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/branches/delete/' . $branch['id']) ?>" onclick="return confirm('Are you sure you want to delete this branch location?');" class="btn btn-sm btn-outline-danger btn-action" title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No branch locations registered yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<?php $this->load->view('includes/header'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Service Items</h3>
        <a href="<?= base_url('service_items/add') ?>" class="btn btn-primary">Add Service Item</a>
    </div>
    <?php if ($this->session->flashdata('alert_msg')): ?>
        <?php $msg = $this->session->flashdata('alert_msg'); ?>
        <div class="alert alert-<?= $msg[0] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
            <strong><?= $msg[1] ?>:</strong> <?= $msg[2] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated By</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($items)): $ci =& get_instance(); $ci->load->model('User_model'); $i = 1; ?>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($item->name) ?></td>
                            <td><?= htmlspecialchars($item->description) ?></td>
                            <td><?= number_format($item->price, 2) ?></td>
                            <td><?= $item->created_by ? $ci->User_model->get_username($item->created_by) : '-' ?></td>
                            <td><?= $item->created_at ? date('Y-m-d H:i', strtotime($item->created_at)) : '-' ?></td>
                            <td><?= $item->updated_by ? $ci->User_model->get_username($item->updated_by) : '-' ?></td>
                            <td><?= $item->updated_at ? date('Y-m-d H:i', strtotime($item->updated_at)) : '-' ?></td>
                            <td>
                                <a href="<?= base_url('service_items/edit/'.$item->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= base_url('service_items/delete/'.$item->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="9" class="text-center">No service items found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>

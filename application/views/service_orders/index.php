<?php require_once APPPATH . 'views/includes/header.php'; ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $page_title ?></h5>
                    <form class="d-flex mb-2 mb-md-0" method="get" action="<?= base_url() ?>service_orders">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search by SR No or Customer ID" value="<?= isset($search) ? $search : '' ?>">
                        <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div>
                        <a href="<?= base_url() ?>service_orders/add" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add Service Order
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('alert_msg')): ?>
                        <?php $alert_msg = $this->session->flashdata('alert_msg'); ?>
                        <div class="alert alert-<?= $alert_msg[0] ?> alert-dismissible fade show" role="alert">
                            <strong><?= $alert_msg[1] ?>!</strong> <?= $alert_msg[2] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="ordersTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SR No</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($orders)): $i=1+$limit*($page-1); foreach ($orders as $order): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $order->sr_no ?></td>
                                    <td><?= $order->customer_id ?></td>
                                    <td><?= $order->total ?></td>
                                    <td><?= $order->created_at ?></td>
                                    <td><?= $this->User_model->get_username($order->created_by) ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>service_orders/view/<?= $order->id ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr><td colspan="7" class="text-center">No service orders found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <?php if ($total > $limit): ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php $pages = ceil($total/$limit); for ($p=1; $p<=$pages; $p++): ?>
                                <li class="page-item <?= $p == $page ? 'active' : '' ?>">
                                    <a class="page-link" href="<?= base_url() ?>service_orders?page=<?= $p ?><?= $search ? '&search='.urlencode($search) : '' ?>"> <?= $p ?> </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#ordersTable').DataTable({paging: false, searching: false, info: false});
});
</script>
<?php require_once APPPATH . 'views/includes/footer.php'; ?>

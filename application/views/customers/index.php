<?php require_once APPPATH . 'views/includes/header.php'; ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $page_title ?></h5>
                    <form class="d-flex mb-2 mb-md-0" method="get" action="<?= base_url() ?>customers">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search by name, contact, tag" value="<?= isset($search) ? $search : '' ?>">
                        <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div>
                        <a href="<?= base_url() ?>customers/add" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add Customer
                        </a>
                        <a href="<?= base_url() ?>customers/export_csv<?= isset($search) && $search ? '?search=' . urlencode($search) : '' ?>" class="btn btn-success">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Export CSV
                        </a>
                        <button onclick="window.print()" class="btn btn-secondary"><i class="bi bi-printer"></i> Print</button>
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
                        <table class="table table-striped table-hover" id="customersTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Tag</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($customers)): $i=1+$limit*($page-1); foreach ($customers as $customer): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $customer->name ?></td>
                                    <td><?= $customer->contact ?></td>
                                    <td><?= $customer->address ?></td>
                                    <td><?= $customer->tag ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>customers/view/<?= $customer->id ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="<?= base_url() ?>customers/edit/<?= $customer->id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="<?= base_url() ?>customers/delete/<?= $customer->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?');"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; else: ?>
                                <tr><td colspan="6" class="text-center">No customers found.</td></tr>
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
                                    <a class="page-link" href="<?= base_url() ?>customers?page=<?= $p ?><?= $search ? '&search='.urlencode($search) : '' ?>"> <?= $p ?> </a>
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
    $('#customersTable').DataTable({paging: false, searching: false, info: false});
});
</script>
<?php require_once APPPATH . 'views/includes/footer.php'; ?>

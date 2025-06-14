<?php require_once APPPATH . 'views/includes/header.php'; ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $page_title ?></h5>
                    <a href="<?= base_url() ?>service_orders" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Service Orders
                    </a>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('alert_msg')): ?>
                        <?php $alert_msg = $this->session->flashdata('alert_msg'); ?>
                        <div class="alert alert-<?= $alert_msg[0] ?> alert-dismissible fade show" role="alert">
                            <strong><?= $alert_msg[1] ?>!</strong> <?= $alert_msg[2] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url() ?>service_orders/add" method="post" id="serviceOrderForm">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="customer_id" class="form-label">Customer <span class="text-danger">*</span></label>
                                <select class="form-select" id="customer_id" name="customer_id" required>
                                    <option value="">Select Customer</option>
                                    <?php foreach ($customers as $c): ?>
                                        <option value="<?= $c->id ?>" <?= set_select('customer_id', $c->id) ?>><?= $c->name ?> (<?= $c->tag ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="sr_no" class="form-label">SR No <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sr_no" name="sr_no" value="<?= set_value('sr_no') ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="total" class="form-label">Total <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control" id="total" name="total" value="<?= set_value('total') ?>" readonly required>
                            </div>
                        </div>
                        <h6>Service Items</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="itemsTable">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="itemsBody">
                                    <tr>
                                        <td>
                                            <select class="form-select item-select" name="items[0][service_item_id]" required>
                                                <option value="">Select Item</option>
                                                <?php foreach ($service_items as $item): ?>
                                                    <option value="<?= $item->id ?>" data-rate="<?= $item->price ?>" data-desc="<?= $item->description ?>">
                                                        <?= $item->name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td class="desc-cell"></td>
                                        <td><input type="number" class="form-control qty-input" name="items[0][qty]" min="1" value="1" required></td>
                                        <td><input type="number" class="form-control rate-input" name="items[0][rate]" step="0.01" min="0" required></td>
                                        <td><input type="number" class="form-control amount-input" name="items[0][amount]" step="0.01" min="0" readonly required></td>
                                        <td><button type="button" class="btn btn-danger btn-sm remove-row"><i class="bi bi-x"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-secondary" id="addRowBtn"><i class="bi bi-plus"></i> Add Item</button>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save Service Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let rowIdx = 1;
$('#addRowBtn').on('click', function() {
    let row = $('#itemsBody tr:first').clone();
    row.find('select, input').each(function() {
        let name = $(this).attr('name');
        if (name) {
            name = name.replace(/\[0\]/, '['+rowIdx+']');
            $(this).attr('name', name);
        }
        if ($(this).is('input')) $(this).val('');
    });
    row.find('.desc-cell').text('');
    $('#itemsBody').append(row);
    rowIdx++;
});
$('#itemsBody').on('click', '.remove-row', function() {
    if ($('#itemsBody tr').length > 1) $(this).closest('tr').remove();
    calculateTotal();
});
$('#itemsBody').on('change', '.item-select', function() {
    let rate = $(this).find(':selected').data('rate') || 0;
    let desc = $(this).find(':selected').data('desc') || '';
    let row = $(this).closest('tr');
    row.find('.rate-input').val(rate);
    row.find('.desc-cell').text(desc);
    row.find('.qty-input').trigger('input');
});
$('#itemsBody').on('input', '.qty-input, .rate-input', function() {
    let row = $(this).closest('tr');
    let qty = parseFloat(row.find('.qty-input').val()) || 0;
    let rate = parseFloat(row.find('.rate-input').val()) || 0;
    let amount = qty * rate;
    row.find('.amount-input').val(amount.toFixed(2));
    calculateTotal();
});
function calculateTotal() {
    let total = 0;
    $('.amount-input').each(function() {
        total += parseFloat($(this).val()) || 0;
    });
    $('#total').val(total.toFixed(2));
}
$(document).ready(function() {
    $('#itemsBody').on('input', '.qty-input, .rate-input', calculateTotal);
    $('#itemsBody').on('change', '.item-select', calculateTotal);
    calculateTotal();
});
</script>
<?php require_once APPPATH . 'views/includes/footer.php'; ?>

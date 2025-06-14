<?php require_once APPPATH . 'views/includes/header.php'; ?>
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text display-4"><?php echo isset($total_customers) ? $total_customers : '-'; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Service Orders</h5>
                    <p class="card-text display-4"><?php echo isset($total_orders) ? $total_orders : '-'; ?></p>
                </div>
            </div>
        </div>
        <!-- Add more summary cards as needed -->
    </div>
    <!-- Example: Show recent assignments or inspections if available -->
    <?php if (isset($vehicle_assignments)): ?>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Recent Vehicle Assignments</div>
                <div class="card-body">
                    <?php if (!empty($vehicle_assignments)): ?>
                        <ul>
                        <?php foreach ($vehicle_assignments as $assign): ?>
                            <li><?php echo $assign->vehicle_name . ' assigned to ' . $assign->assigned_to; ?></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No recent assignments.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php require_once APPPATH . 'views/includes/footer.php'; ?>

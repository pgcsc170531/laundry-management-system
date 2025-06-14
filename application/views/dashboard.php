<?php require_once 'includes/header.php'; ?>

<div class="container-fluid">
    <!-- Quick Actions Bar -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card dashboard-card">
                <div class="card-body d-flex gap-2 flex-wrap">
                    <a class="btn btn-primary" href="<?= base_url() ?>assignments/add">
                        <i class="bi bi-plus-circle"></i> New Assignment
                    </a>
                    <a class="btn btn-success" href="<?= base_url() ?>vehicles/add">
                        <i class="bi bi-truck"></i> Add Vehicle
                    </a>
                    <a class="btn btn-info text-white" href="<?= base_url() ?>maintenance/schedule">
                        <i class="bi bi-tools"></i> Schedule Maintenance
                    </a>
                    <a class="btn btn-warning text-dark" href="<?= base_url() ?>fuel/add">
                        <i class="bi bi-fuel-pump"></i> Fuel Entry
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card bg-primary text-white h-100">
                <div class="card-body">
                    <div class="d-flex flex-column flex-sm-row justify-content-between">
                        <div>
                            <h6 class="card-title">Total Vehicles</h6>
                            <h2 class="mb-0"><?php echo $this->Vehicle_model->count_all(); ?></h2>
                            <small>
                                Active: <?php echo $this->Vehicle_model->count_by('status', 'active'); ?> |
                                Maintenance: <?php echo $this->Vehicle_model->count_by('status', 'maintenance'); ?>
                            </small>
                        </div>
                        <div class="fs-1 opacity-75 mt-2 mt-sm-0">
                            <i class="bi bi-truck"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card bg-success text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Active Assignments</h6>
                            <h2 class="mb-0"><?php echo $this->Assignment_model->count_all(); ?></h2>
                            <small>Completed this month: <?php echo $this->Assignment_model->count_by_month(date('Y'), date('m')); ?></small>
                        </div>
                        <div class="fs-1 opacity-75">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card bg-warning text-dark h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Pending Maintenance</h6>
                            <h2 class="mb-0"><?php echo $this->Maintenance_model->count_pending(); ?></h2>
                            <small>Due this week: <?php echo $this->Maintenance_model->count_due_this_week(); ?></small>
                        </div>
                        <div class="fs-1 opacity-75">
                            <i class="bi bi-tools"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card bg-info text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Monthly Revenue</h6>
                            <h2 class="mb-0">₦1.2M</h2>
                            <small>Previous: ₦980K</small>
                        </div>
                        <div class="fs-1 opacity-75">
                            <i class="bi bi-graph-up"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="row g-4">
        <!-- Vehicle Status Overview -->
        <div class="col-12 col-lg-8">
            <div class="card dashboard-card">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Vehicle Status Overview</h5>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary" data-period="week">Week</button>
                        <button class="btn btn-sm btn-outline-secondary active" data-period="month">Month</button>
                        <button class="btn btn-sm btn-outline-secondary" data-period="year">Year</button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="vehicleStatusChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Upcoming Maintenance -->
        <div class="col-12 col-lg-4">
            <div class="card dashboard-card">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">Upcoming Maintenance</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <?php
                        $upcoming_maintenance = $this->Maintenance_model->get_upcoming_maintenance(30);
                        foreach ($upcoming_maintenance as $maintenance) {
                            $days_left = (int) ceil((strtotime($maintenance->next_service_due) - time()) / (60 * 60 * 24));
                        ?>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1"><?php echo $maintenance->vehicle_number; ?></h6>
                                <small class="text-<?php echo $days_left <= 7 ? 'danger' : 'secondary'; ?>">
                                    <?php echo $days_left . ' days left'; ?>
                                </small>
                            </div>
                            <p class="mb-1">
                                <?php echo $maintenance->maintenance_type; ?>
                            </p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Assignments -->
        <div class="col-12">
            <div class="card dashboard-card">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Assignments</h5>
                    <a href="<?=base_url()?>assignments" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mobile-card-view">
                            <thead>
                                <tr>
                                    <th>Vehicle</th>
                                    <th>Company</th>
                                    <th>Assignment</th>
                                    <th>Start Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $this->db->query("SELECT v.vehicle_number, a.id, c.company_name, a.job_description, a.assignment_date, a.job_status
                                    FROM vehicle_assignments a
                                    INNER JOIN vehicles v ON a.vehicle_id = v.id
                                    INNER JOIN companies c ON a.company_id = c.id
                                    ORDER BY a.assignment_date DESC
                                    LIMIT 5");
                                foreach ($query->result() as $assignment):
                                ?>
                                <tr>
                                    <td data-label="Vehicle"><?php echo $assignment->vehicle_number; ?></td>
                                    <td data-label="Company"><?php echo $assignment->company_name; ?></td>
                                    <td data-label="Assignment"><?php echo $assignment->job_description; ?></td>
                                    <td data-label="Start Date"><?php echo date('Y-m-d', strtotime($assignment->assignment_date)); ?></td>
                                    <td data-label="Status">
                                        <span class="badge bg-<?php echo ($assignment->job_status == 'active') ? 'success' : 'secondary'; ?>">
                                            <?php echo ucfirst($assignment->job_status); ?>
                                        </span>
                                    </td>
                                    <td data-label="Action">
                                        <a href="<?=base_url()?>assignments/view/<?php echo $assignment->id; ?>" class="btn btn-sm btn-outline-primary">Details</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!-- Modals -->
<!-- New Assignment Modal -->
<div class="modal fade" id="newAssignmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Add form fields here -->
            </div>
        </div>
    </div>
</div>

<!-- Add other modals similarly -->

<!-- Initialize Charts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Vehicle Status Chart
    fetch('<?php echo base_url() ?>vehicles/get_chart_data')
        .then(response => response.json())
        .then(chartData => {
            const ctx = document.getElementById('vehicleStatusChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Assigned Vehicles',
                        data: chartData.active,
                        borderColor: '#28a745',
                        tension: 0.1
                    }, {
                        label: 'In Maintenance',
                        data: chartData.maintenance,
                        borderColor: '#ffc107',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        })
        .catch(error => console.error('Error fetching chart data:', error));
});
</script>

<?php require_once 'includes/footer.php'; ?>

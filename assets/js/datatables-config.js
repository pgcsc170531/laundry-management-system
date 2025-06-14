// Global DataTables configuration
const YubaDataTables = {
    // Initialize DataTable with fleet management specific configurations
    init: function(tableId, options = {}) {
        // Check if table already initialized
        if ($.fn.DataTable.isDataTable(tableId)) {
            $(tableId).DataTable().destroy();
        }

        // Default options aligned with fleet management needs
        const defaultOptions = {
            responsive: true,
            pageLength: 25,
            order: [[0, 'desc']],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                 '<"row"<"col-sm-12"tr>>' +
                 '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-secondary btn-sm',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-secondary btn-sm',
                    title: 'Yuba Transport - ' + this.getReportTitle(tableId),
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-secondary btn-sm',
                    title: 'Yuba Transport - ' + this.getReportTitle(tableId),
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-secondary btn-sm',
                    title: 'Yuba Transport - ' + this.getReportTitle(tableId),
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                }
            ],
            // Fleet management specific language customization
            language: {
                emptyTable: "No records found",
                zeroRecords: "No matching records found",
                infoFiltered: "(filtered from _MAX_ total records)"
            }
        };

        // Merge custom options with defaults
        const finalOptions = {...defaultOptions, ...options};
        
        // Initialize DataTable
        return $(tableId).DataTable(finalOptions);
    },

    // Get report title based on table ID
    getReportTitle: function(tableId) {
        const titles = {
            '#fuelTable': 'Fuel Records',
            '#vehicleTable': 'Vehicle Records',
            '#maintenanceTable': 'Maintenance Records',
            '#assignmentTable': 'Vehicle Assignments',
            '#companyTable': 'Company Records',
            '#inspectionTable': 'Inspection Records',
            '#payrollTable': 'Payroll Records'
        };
        return titles[tableId] || 'Report';
    }
};
// Common JavaScript functions
function formatNumber(number, decimals = 2) {
    return new Intl.NumberFormat('en-IN', {
        minimumFractionDigits: decimals,
        maximumFractionDigits: decimals
    }).format(number);
}

function formatCurrency(amount) {
    return '₹' + formatNumber(amount, 2);
}

// Initialize DataTable with options
function initializeDataTable(tableId, options = {}) {
    // Destroy existing DataTable if it exists
    if ($.fn.DataTable.isDataTable(tableId)) {
        $(tableId).DataTable().destroy();
    }
    
    const defaultOptions = {
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            {
                extend: 'copy',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'excel',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'pdf',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'print',
                className: 'btn btn-secondary btn-sm'
            }
        ],
        pageLength: 25,
        order: [[0, 'desc']]
    };
    
    return $(tableId).DataTable({...defaultOptions, ...options});
}
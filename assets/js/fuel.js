$(document).ready(function() {
    // Get last reading when vehicle is selected
    $('#vehicle_id').change(function() {
        var vehicle_id = $(this).val();
        if(vehicle_id) {
            $.ajax({
                url: baseURL + 'fuel/get_last_reading',
                type: 'POST',
                data: { 
                    vehicle_id: vehicle_id,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(response) {
                    console.log('Response:', response);

                    if (response.is_first_record) {
                        $('#firstRecordAlert').show();
                        $('#initialReadingSection').show();
                        $('#initial_reading').val(response.current_reading || 0);
                        $('#previous_reading').val(response.current_reading || 0);
                        $('#previous_reading').prop('readonly', false);
                    } else {
                        $('#firstRecordAlert').hide();
                        $('#initialReadingSection').hide();
                        $('#previous_reading').val(response.current_reading || 0);
                        $('#previous_reading').prop('readonly', true);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('Error fetching vehicle data. Please try again.');
                }
            });
        } else {
            $('#firstRecordAlert').hide();
            $('#initialReadingSection').hide();
            $('#previous_reading').val(0);
            $('#previous_reading').prop('readonly', true);
            $('#initial_reading').val(0);
        }
    });

    // Update previous reading when initial reading changes
    $('#initial_reading').on('input', function() {
        $('#previous_reading').val($(this).val());
        calculateValues();
    });

    // Calculate values on input change
    function calculateValues() {
        var current = parseFloat($('#current_reading').val()) || 0;
        var previous = parseFloat($('#previous_reading').val()) || 0;
        var quantity = parseFloat($('#fuel_quantity').val()) || 0;
        var rate = parseFloat($('#fuel_rate').val()) || 0;

        var distance = current - previous;
        var efficiency = quantity > 0 ? (distance / quantity).toFixed(2) : 0;
        var total = (quantity * rate).toFixed(2);

        $('#distance_covered').text(distance.toFixed(2) + ' km');
        $('#fuel_efficiency').text(efficiency + ' km/L');
        $('#total_amount').text('₹' + total);

        var efficiencyElement = $('#fuel_efficiency');
        if(efficiency < 3) {
            efficiencyElement.removeClass().addClass('text-danger');
        } else if(efficiency < 4) {
            efficiencyElement.removeClass().addClass('text-warning');
        } else {
            efficiencyElement.removeClass().addClass('text-success');
        }
    }

    // Bind calculation to input changes
    $('#current_reading, #fuel_quantity, #fuel_rate').on('input', calculateValues);

    // Form validation
$('#fuelForm').submit(function(e) {
    var current = parseFloat($('#current_reading').val()) || 0;
    var previous = parseFloat($('#previous_reading').val()) || 0;
    
    // Clear any existing error messages
    $('.reading-error').remove();
    
    if (current <= previous) {
        e.preventDefault();
        // Add error message below the current reading field
        $('#current_reading').addClass('is-invalid')
            .after('<div class="invalid-feedback reading-error">Current reading must be greater than previous reading (' + previous + ' km)</div>');
        return false;
    } else {
        $('#current_reading').removeClass('is-invalid');
    }
});

// Add real-time validation on current reading input
$('#current_reading').on('input', function() {
    var current = parseFloat($(this).val()) || 0;
    var previous = parseFloat($('#previous_reading').val()) || 0;
    
    if (current <= previous) {
        $(this).addClass('is-invalid');
        // Update or add error message
        if ($('.reading-error').length === 0) {
            $(this).after('<div class="invalid-feedback reading-error">Current reading must be greater than previous reading (' + previous + ' km)</div>');
        }
    } else {
        $(this).removeClass('is-invalid');
        $('.reading-error').remove();
    }
});
});

$(document).ready(function(){
    dataTable = $("#schedule").DataTable({
        dom: 'Brtp',
        responsive: true,
        fixedHeader: true,
        pageLength: 5,
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Excel',
                classfirstname: 'border-white',
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                classfirstname: 'border-white p-3',
                download: 'open',
            }
        ],
        'columnDefs': [ {
            'targets': [2,3], /* column index */
            'orderable': false, /* true or false */
        }]
    });

    dataTable.buttons().container().appendTo($('#MyButtons'));

    var table = dataTable;
    var filter = createFilter(table, [1,2]);

    function createFilter(table, columns) {
        var input = $('input#keyword').on("keyup", function() {
            table.draw();
        });
        
        $.fn.dataTable.ext.search.push(function(
            settings,
            searchData,
            index,
            rowData,
            counter
        ) {
            var val = input.val().toLowerCase();
        
            for (var i = 0, ien = columns.length; i < ien; i++) {
                if (searchData[columns[i]].toLowerCase().indexOf(val) !== -1) {
                return true;
                }
            }
        
            return false;
        });
        
        return input;
    }

    $('select#schedule-description').on('change', function(e){
        var status = $(this).val();
        dataTable.columns([2]).search(status).draw();
    });

    

    $(document).on('submit', '#saveschedule', function (e) {
        e.preventDefault();
    
            var formData = new FormData(this);
            formData.append("save_schedule", true);

    
        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var res = $.parseJSON(response);
    
                $("#errorMessage").addClass('d-none');
    
                if (res.status == 422) {
                    $("#errorMessage").removeClass('d-none');
                    $("#errorMessage").text(res.message);
                } else if (res.status == 200) {
                    // Close the modal
                    $('#scheduleAddModal').modal('hide');
    
                    // Reset the form
                    $('#saveschedule')[0].reset();
    
                    // Display success message
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);
    
                    // Refresh or update the table data
                    $('#schedule').load(location.href + " #schedule");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            }
        });
    });
    


    // Edit a schedule
    $(document).on('click', '.editscheduleBtn', function() {
        var schedule_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?schedule_id=" + schedule_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Assuming your gender select has an id of 'gender'
                    $('#schedule_id').val(res.data.id);
                    $('#start_time').val(res.data.start_time);
                    $('#end_time').val(res.data.end_time);
                   
                   

                    $('#scheduleEditModal').modal('show');
                    
                }
            }
        });
    });
    


    // Update a schedule
    $(document).on('submit', '#updateschedule', function(e) {
    e.preventDefault();

    // Create FormData object
    var formData = new FormData(this);
    formData.append("update_schedule", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // You can use jQuery also
            var res = $.parseJSON(response);
            if (res.status == 422) {
                $("#errorMessageUpdate").removeClass('d-none');
                $("#errorMessageUpdate").text(res.message);
            } else if (res.status == 200) {
                $('#errorMessageUpdate').addClass('d-none');
                $('#scheduleEditModal').modal('hide');
                $('#updateschedule')[0].reset();

                alertify.set('notifier', 'position', 'top-center');
                alertify.success(res.message);

                // view table data without reloading the page
                $('#schedule').load(location.href + " #schedule");
            }
        },
    });
});

    // View a schedule
    $(document).on('click', '.viewscheduleBtn', function() {
        var schedule_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?schedule_id=" + schedule_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Concatenate first name, middle name, and last name
                   
                    $('#view_start_time').text(res.data.start_time);
                    $('#view_end_time').text(res.data.end_time);
                    
            
    
                    // Show the modal   
                    $('#scheduleViewModal').modal('show');
                }
            }
        });
    });
    
    $(document).on('click', '.deleteScheduleBtn', function(e) {
        e.preventDefault();

        var schedule_id = $(this).val();
        var modal = $(this).closest('.modal');

        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                delete_schedule: true,
                schedule_id: schedule_id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 500) {
                    alert(response.message);
                } else if (response.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    modal.modal('hide');
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(response.message);
                    $('#schedule').load(location.href + " #schedule");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Failed to delete schedule. Please try again.");
            }
        });
    });




    
    
    
})
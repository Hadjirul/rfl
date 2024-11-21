$(document).ready(function(){
    dataTable = $("#walkin_history").DataTable({
        dom: 'Brtp',
        responsive: true,
        fixedHeader: true,
        pageLength: 5,
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Excel',
                classservice: 'border-white',
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                classservice: 'border-white p-3',
                download: 'open',
            }
        ],
        'columnDefs': [ {
            'targets': [2,3,4,5], /* column index */
            'orderable': false, /* true or false */
        }]
    });

    dataTable.buttons().container().appendTo($('#MyButtons'));

    var table = dataTable;
    var filter = createFilter(table, [1,2,3,4]);

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

    $('select#walkin_history-role').on('change', function(e){
        var status = $(this).val();
        dataTable.columns([2]).search(status).draw();
    });

    

    $(document).on('submit', '#savewalkin_history', function (e) {
        e.preventDefault();
    
            var formData = new FormData(this);
            formData.append("save_walkin_history", true);

    
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
                    $('#walkin_historyAddModal').modal('hide');
    
                    // Reset the form
                    $('#savewalkin_history')[0].reset();
    
                    // Display success message
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);
    
                    // Refresh or update the table data
                    $('#walkin_history').load(location.href + " #walkin_history");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            }
        });
    });
    


    // Edit a walkin_history
    $(document).on('click', '.editwalkin_historyBtn', function() {
        var walkin_history_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?walkin_history_id=" + walkin_history_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Assuming your service select has an id of 'service'
                    $('#walkin_history_id').val(res.data.id);
                    $('#medical_history').val(res.data.medical_history);
                    $('#eye_history').val(res.data.eye_history);
                    $('#date_held').val(res.data.date_held);
                    $('#service').val(res.data.service);
                    $('#doctor').val(res.data.doctor);
                    $('#findings').val(res.data.findings);
                    $('#diagnosis').val(res.data.diagnosis);
                    $('#prescription').val(res.data.prescription);
    
    
                    $('#walkin_historyEditModal').modal('show');
                }
            }
        });
    });
    


    // Update a walkin_history
    $(document).on('submit', '#updatewalkin_history', function(e) {
    e.preventDefault();

    // Create FormData object
    var formData = new FormData(this);
    formData.append("update_walkin_history", true);

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
                $('#walkin_historyEditModal').modal('hide');
                $('#updatewalkin_history')[0].reset();

                alertify.set('notifier', 'position', 'top-center');
                alertify.success(res.message);

                // view table data without reloading the page
                $('#walkin_history').load(location.href + " #walkin_history");
            }
        },
    });
});

    // View a walkin_history
    $(document).on('click', '.viewwalkin_historyBtn', function() {
        var walkin_history_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?walkin_history_id=" + walkin_history_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Concatenate first name, middle name, and last name
                  
                    $('#view_medical_history').text(res.data.medical_history);
                    $('#view_eye_history').text(res.data.eye_history);
                    $('#view_date_held').text(res.data.date_held);
                    $('#view_service').text(res.data.service);
                    $('#view_doctor').text(res.data.doctor);
                    $('#view_findings').text(res.data.findings);
                    $('#view_diagnosis').text(res.data.diagnosis);
                    $('#view_prescription').text(res.data.prescription);
    
                
    
                    // Show the modal   
                    $('#walkin_historyViewModal').modal('show');
                }
            }
        });
    });
    
    $(document).on('click', '.deletewalkin_historyBtn', function(e) {
        e.preventDefault();
    
        var walkin_history_id = $(this).val();
        console.log(walkin_history_id);
    
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                delete_walkin_history: true,
                'walkin_history_id': walkin_history_id
            },
            dataType: 'json',  // Specify data type as JSON
            success: function(response) {
                console.log(response);
                if (response.status == 500) {
                    alert(response.message);
                } else if (response.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    $('#deleteSchedModal').modal('hide');
    
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(response.message);
    
                    $('#walkin_history').load(location.href + " #walkin_history");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Failed to delete walkin_history. Please try again.");  // Provide a generic error message
            }
        });
    });
    
    
    
})
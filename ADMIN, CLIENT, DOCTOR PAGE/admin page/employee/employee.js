$(document).ready(function(){
    dataTable = $("#employee").DataTable({
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

    $('select#employee-role').on('change', function(e){
        var status = $(this).val();
        dataTable.columns([2]).search(status).draw();
    });

    

    $(document).on('submit', '#saveemployee', function (e) {
        e.preventDefault();
    
            var formData = new FormData(this);
            formData.append("save_employee", true);

    
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
                    $('#employeeAddModal').modal('hide');
    
                    // Reset the form
                    $('#saveemployee')[0].reset();
    
                    // Display success message
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);
    
                    // Refresh or update the table data
                    $('#employee').load(location.href + " #employee");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            }
        });
    });
    


    // Edit a employee
    $(document).on('click', '.editEmployeeBtn', function() {
        var employee_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?employee_id=" + employee_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Assuming your gender select has an id of 'gender'
                    $('#employee_id').val(res.data.id);
                    $('#firstname').val(res.data.firstname);
                    $('#middlename').val(res.data.middlename);
                    $('#lastname').val(res.data.lastname);
                    $('#birthdate').val(res.data.birthdate);
                    $('#email').val(res.data.email);
                    $('#contact_number').val(res.data.contact_number);
                    $("input[name='gender']").each(function() {
                        if ($(this).val() == res.data.gender) {
                            $(this).prop('checked', true);
                        }
                    });
    
                    $('#address').val(res.data.address);
                    $('#role').val(res.data.role);
    
                    var pictureInput = $('#picture');
                    var pictureText = $('#pictureText');
                    pictureText.val(res.data.picture);
                    pictureInput.val(''); // Clear the file input to handle updates
    
                    $('#employeeEditModal').modal('show');
                }
            }
        });
    });
    


    // Update a employee
    $(document).on('submit', '#updateemployee', function(e) {
    e.preventDefault();

    // Create FormData object
    var formData = new FormData(this);
    formData.append("update_employee", true);

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
                $('#employeeEditModal').modal('hide');
                $('#updateemployee')[0].reset();

                alertify.set('notifier', 'position', 'top-center');
                alertify.success(res.message);

                // view table data without reloading the page
                $('#employee').load(location.href + " #employee");
            }
        },
    });
});

    // View a employee
    $(document).on('click', '.viewEmployeeBtn', function() {
        var employee_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?employee_id=" + employee_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Concatenate first name, middle name, and last name
                    var fullName = '<div style="text-align: center; font-size:1.3em"><strong>' + res.data.firstname + '</strong> ' + 
                                   '<strong>' + res.data.middlename + '</strong> ' + 
                                   '<strong>' + res.data.lastname + '</strong></div>';
    
                    // Update modal content
                    $('#view_fullname').html(fullName);
                    $('#view_birthdate').text(res.data.birthdate);
                    $('#view_email').text(res.data.email);
                    $('#view_contact_number').text(res.data.contact_number);
                    $('#view_gender').text(res.data.gender);
                    $('#view_address').text(res.data.address);
                    $('#view_role').text(res.data.role);
    
                    // Set image source
                    var viewPicture = $('#view_picture');
                    viewPicture.attr('src', res.data.picture);
    
                    // Set width and height
                    viewPicture.css({
                        'border-radius': '50%',
                        'width': '100x', // Set the desired width
                        'height': '100px' // Set the desired height
                    });
    
                    // Show the modal   
                    $('#employeeViewModal').modal('show');
                }
            }
        });
    });
    
    $(document).on('click', '.deleteEmployeeBtn', function(e) {
        e.preventDefault();

        var employee_id = $(this).val();
        var modal = $(this).closest('.modal');

        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                delete_employee: true,
                employee_id: employee_id
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
                    $('#employee').load(location.href + " #employee");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Failed to delete employee. Please try again.");
            }
        });
    });

    
    
    
})
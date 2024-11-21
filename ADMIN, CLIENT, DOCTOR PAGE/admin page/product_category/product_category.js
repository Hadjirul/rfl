$(document).ready(function(){
    dataTable = $("#employee").DataTable({
        dom: 'Brtp',
        responsive: true,
        fixedHeader: true,
        pageLength: 3,
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
                    $('#name').val(res.data.name);
                    $('#description').val(res.data.description);

    
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
                
                    
                    $('#view_name').text(res.data.name);
                    $('#view_description').text(res.data.description);

    
                    // Show the modal   
                    $('#employeeViewModal').modal('show');
                }
            }
        });
    });
    
    $(document).on('click', '.deleteEmployeeBtn', function(e) {
        e.preventDefault();
    
        var employee_id = $(this).val();
        console.log(employee_id);
    
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                delete_employee: true,
                'employee_id': employee_id
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
    
                    $('#employee').load(location.href + " #employee");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Failed to delete employee. Please try again.");  // Provide a generic error message
            }
        });
    });  


    
})
document.addEventListener('DOMContentLoaded', function() {
    const serviceLink = document.getElementById('serviceLink');
    const categoryLink = document.getElementById('categoryLink');

    const activeLink = localStorage.getItem('activeLink');

    if (activeLink === 'service') {
        serviceLink.classList.add('active-link');
    } else if (activeLink === 'category') {
        categoryLink.classList.add('active-link');
    }

    serviceLink.addEventListener('click', function(event) {
        localStorage.setItem('activeLink', 'service');
        categoryLink.classList.remove('active-link');
        serviceLink.classList.add('active-link');
    });

    categoryLink.addEventListener('click', function(event) {
        localStorage.setItem('activeLink', 'category');
        serviceLink.classList.remove('active-link');
        categoryLink.classList.add('active-link');
    });
});
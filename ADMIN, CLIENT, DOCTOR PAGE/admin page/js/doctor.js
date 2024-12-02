$(document).ready(function(){
    loademployeeData();
    var dataTable;

    function loademployeeData() {
        $.ajax({
            type: "GET",
            url: "show_employee_ajax.php", // Replace with the actual URL of your PHP script
            success: function(data) {
                // Clear the table body
                $("#employeeTableBody").html(data);
                // Initialize or redraw DataTable based on filters
                if (dataTable) {
                    dataTable.destroy();
                    createDataTable();
                } else {
                    createDataTable();
                }
            },
            error: function() {
                // Handle AJAX error
                alert("Failed to load employee data.");
            }
        });
    }


    $("#addEmployeeButton").click(function(e) {
        e.preventDefault();

        // Collect form data
        var formData = {
            first_name: $("#first_name").val(),
            middle_name: $("#middle_name").val(),
            last_name: $("#last_name").val(),
            birthdate: $("#birthdate").val(),
            email: $("#email").val(),
            contact_number: $("#contact_number").val(),
            gender: $("#gender").val(),
            address: $("#address").val(),
            role: $("#role").val(),
            picture: $("#picture").val(),
        };

        // Send AJAX request
        $.ajax({
            type: "POST",
            url: "add_employee.php", // PHP script to handle the request
            data: formData,
            success: function(response) {
                if (response === "success") {
                    // Close the modal
                    $("#addEmployeeModal").modal("hide");
                    // Perform any other actions (e.g., updating the page)
                    loademployeeData();
                    // for clearing data after save
                    $("#first_name").val('');
                    $("#middle_name").val('');
                    $("#last_name").val('');
                    $("#birthdate").val('');
                    $("#email").val('');
                    $("#contact_number").val('');
                    $("#gender").val('');
                    $("#address").val('');
                    $("#role").val('');
                    $("#picture").val('');
                } else {
                    alert("Failed to add Employee.");
                }
            }
        });
    function createDataTable() {
        dataTable = $("#employee").DataTable({
            dom: 'Brtp',
            responsive: true,
            fixedHeader: true,
            pageLength: 4,
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'border-white excel-button text-white fw-bolder',
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    className: 'border-white pdf-button text-white fw-bolder',
                    download: 'open',
                }
            ],
            'columnDefs': [ 
                {
                    'targets': [2,3,4,5], /* column index */
                    'orderable': false, /* true or false */
                }
            ]
        });

        dataTable.buttons().container().appendTo($('#MyButtons'));

        var table = dataTable;
        var filter = createFilter(table, [1,2,3,4]);

        function createFilter(table, columns) {
            var input = $('input#keyword').on("keyup", function() {
                loademployeeData();
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
                    var regex = new RegExp('[^a-zA-Z0-9]', 'g');
                    var sanitizedQuery = val.replace(regex, '');
                    var sanitizedData = searchData[columns[i]].toLowerCase().replace(regex, '');

                    if (sanitizedData.indexOf(sanitizedQuery) !== -1) {
                        return true;
                    }
                }

                return false;
            });
            
            return input;
        }
    }  
    });
});

// Add this code to your doctor.js or any JavaScript file included in your page








function deleteEmployee(employeeId) {
    // Assuming you have included jQuery
    $('#deleteSchedModal').modal('hide');
    
    // Redirect to delete_employee.php with the employee id
    window.location.href = 'delete_employee.php?id=' + employeeId;
}

$(document).ready(function(){
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
        ]
    ,
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
            // Use a regular expression to remove non-alphanumeric characters
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

    

    $('select#employee-role').on('change', function(e){
        var status = $(this).val();
        dataTable.columns([3]).search(status).draw();
    });
})


document.addEventListener('DOMContentLoaded', function () {
    var firstModal = new bootstrap.Modal(document.getElementById('deleteSchedModal'));
    var secondModal = new bootstrap.Modal(document.getElementById('deleteSuccessModal'));

    // Event listener for the button inside the second modal
    var updateButton = document.getElementById('yesButton');
    if (updateButton) {
        updateButton.addEventListener('click', function () {
            // Hide the first modal when the button is clicked
            firstModal.hide();
        });
    }
});


$(document).ready(function(){
    var dataTable;

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

        $('.table-responsive select#employee-role').on('change', function(e){
            var status = $(this).val();
            dataTable.columns([2]).search(status).draw();
        });

        $('.table-responsive select#employee-status').on('change', function(e){
            var status = $(this).val();
            dataTable.columns([4]).search(status).draw();
        });
    }

    // Call loademployeeData initially
    loademployeeData();

    // Attach keyup event to the search input
    $('input#keyword').on("keyup", function () {
        loademployeeData();
    });

    function loademployeeData() {
        $.ajax({
            type: "GET",
            url: "show_employee_ajax.php",
            success: function (data) {
                // Clear the table body
                $("#employeeTableBody").html(data);

                // Initialize or redraw DataTable based on filters
                if (dataTable) {
                    dataTable.destroy();
                }
                createDataTable();
            },
            error: function () {
                // Handle AJAX error
                alert("Failed to load employee data.");
            }
        });
    }

    $("#addEmployeeButton").click(function (e) {
        e.preventDefault();

        // Collect form data
        var formData = {
            firstname: $("#firstname").val(),
            middlename: $("#middlename").val(),
            lastname: $("#lastname").val(),
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
            url: "add_employee.php",
            data: formData,
            success: function (response) {
                if (response === "success") {
                    // Close the modal
                    $("#addEmployeeModal").modal("hide");
                    // Clear form data
                    $("#addEmployeeModal").find('form')[0].reset();
                    // Reload DataTable
                    loademployeeData();
                } else {
                    alert("Failed to add Employee.");
                }
            },
            error: function () {
                alert("Error in AJAX request.");
            }
        });
    });
});


    function deleteEmployee(employeeId) {
        // Assuming you have included jQuery
        $('#deleteSchedModal').modal('hide');
        
        // Redirect to delete_employee.php with the employee id
        window.location.href = 'delete_employee.php?id=' + employeeId;
    }




    

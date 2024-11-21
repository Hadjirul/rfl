$(document).ready(function(){
    dataTable = $("#employee").DataTable({
        dom: 'Brtp',
        responsive: true,
        fixedHeader: true,
        pageLength: 6,
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
            'targets': [2,3,4,5,6], /* column index */
            'orderable': false, /* true or false */
        }]
    });

    dataTable.buttons().container().appendTo($('#MyButtons'));

    var table = dataTable;
    var filter = createFilter(table, [1,2,3,4,5]);

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
        dataTable.columns([2]).search(status).draw();
    });
})


    document.addEventListener('DOMContentLoaded', function () {
        var firstModal = new bootstrap.Modal(document.getElementById('EditDoctorModal'));
        var secondModal = new bootstrap.Modal(document.getElementById('passwordModal'));

        // Event listener for the button inside the second modal
        var updateButton = document.getElementById('updateButton');
        if (updateButton) {
            updateButton.addEventListener('click', function () {
                // Hide the first modal when the button is clicked
                firstModal.hide();
            });
        }
    });


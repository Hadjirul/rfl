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

alertify.set('notifier', 'position', 'top-center');





document.querySelectorAll('.view-modal-btn').forEach(button => {
    button.addEventListener('click', function () {
        document.getElementById('ocular-history').textContent = this.getAttribute('data-ocular-history');
        document.getElementById('family-history').textContent = this.getAttribute('data-family-history');
        document.getElementById('appointment-reason').textContent = this.getAttribute('data-reason');
        document.getElementById('date-held').textContent = this.getAttribute('data-date-held');
        document.getElementById('service').textContent = this.getAttribute('data-service');
        document.getElementById('doctor').textContent = this.getAttribute('data-doctor');
        document.getElementById('findings').textContent = this.getAttribute('data-findings');
        document.getElementById('diagnostics').textContent = this.getAttribute('data-diagnostics');
        document.getElementById('prescription').textContent = this.getAttribute('data-prescription');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    let selectedAppointmentId = null;

    // Handle View Modal
    document.querySelectorAll('.view-modal-btn').forEach(button => {
        button.addEventListener('click', function () {
            const appointmentId = this.dataset.id;
            fetch(`view_appointment.php?id=${appointmentId}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('view-modal-content').innerHTML = data;
                    new bootstrap.Modal(document.getElementById('viewModal')).show();
                });
        });
    });
});


// Example for adding patient history via AJAX

 document.getElementById('print-modal-content').addEventListener('click', function () {
        const modalBody = document.querySelector('#viewModal .modal-body').innerHTML;
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
            <head>
                <title>Print Appointment Details</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    h1, h2, h3, h4, h5, h6 {
                        color: #0008BD;
                    }
                </style>
            </head>
            <body>
                <h2>Appointment Details</h2>
                ${modalBody}
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    });










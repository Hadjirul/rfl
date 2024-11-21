$(document).ready(function () {
    // Function to add classes to the calendar element
    function initializeCalendar() {
        $('#calendar').addClass('sidebar-hide event-hide');
    }

    // Attach click event listener to the input tag
    $('#selectedDate').on('click', function () {
        initializeCalendar();
    });
});


$(document).click(function () {
    // Function to add classes to the calendar element
    function initializeCalendarTwo() {
        $('#calendar').removeClass('event-hide');
    }

    // Attach click event listener to the input tag
    $('.day').on('click', function () {
        initializeCalendarTwo();
    });
});
$(document).click(function () {
    // Function to add classes to the calendar element
    function initializeCalendarThree() {
        $('#calendar').addClass('event-hide');
    }

    // Attach click event listener to the input tag
    $('#sidebarToggler').on('click', function () {
        initializeCalendarThree();
    });
});
$(document).click(function () {
    // Function to add classes to the calendar element
    function initializeCalendarFour() {
        $('#calendar').addClass('sidebar-hide');
    }

    // Attach click event listener to the input tag
    $('#eventListToggler').on('click', function () {
        initializeCalendarFour();
    });
});
$(document).click(function () {
    // Function to add classes to the calendar element
    function initializeCalendarFive() {
        $('#calendar').addClass('sidebar-hide');
    }

    // Attach click event listener to the input tag
    $('.month').on('click', function () {
        initializeCalendarFive();
    });
});

$(document).ready(function () {
    // Function to disable buttons for dates before today
    function disablePastDates() {
        var today = new Date();
        today.setHours(0, 0, 0, 0);

        $('.day').each(function () {
            var dateVal = $(this).data('date-val');
            var buttonDate = new Date(dateVal);
            if (buttonDate < today) {
                $(this).prop('disabled', true);
            }
        });
    }

    // Function to disable past dates when the modal is shown
    function disablePastDatesOnModalShow() {
        $('#calendarModal').on('shown.bs.modal', function () {
            disablePastDates();
        });
    }

    // Call the function initially to disable past dates
    disablePastDatesOnModalShow();

    // Call the function to disable past dates when the user clicks on a month
    $('#calendar').on('click', '.month', function () {
        disablePastDates();
    });

    // Call the function to disable past dates when the user clicks on a day
    $('#calendar').on('click', '.day', function () {
        disablePastDates();
    });
});



$(document).ready(function () {
    // Function to disable buttons for unavailable dates
    function disableUnavailableDates() {
        $('.day').each(function () {
            // Check if the button represents an unavailable date
            if ($(this).find('.event-indicator').length > 0) {
                // If it represents an unavailable date, disable the button
                $(this).prop('disabled', true);
            }
        });
    }

    // Call the function to disable unavailable dates when the modal is shown
    $('#calendarModal').on('shown.bs.modal', function () {
        disableUnavailableDates();
    });
});

$(document).ready(function () {
    // Function to disable all .event-indicator elements
    function disableAllEventIndicators() {
        $('.event-indicator').closest('.day').attr('disabled', 'disabled');
    }

    // Function to disable .event-indicator elements after a month is clicked
    function disableEventIndicatorsAfterMonthClick() {
        $('.month').on('click', function () {
            disableAllEventIndicators();
        });
    }

    // Call the function to disable all .event-indicator elements when the modal is shown
    $('#calendarModal').on('shown.bs.modal', function () {
        disableAllEventIndicators();
        disableEventIndicatorsAfterMonthClick(); // Call this function to reapply the disabling logic
    });

    // Listen for clicks on .day elements
    $(document).on('click', '.day', function (event) {
        // Check if the clicked element or any of its ancestors have the class .event-indicator
        if ($(event.target).closest('.event-indicator').length > 0) {
            // Prevent the default action (click) for this element
            event.preventDefault();
            // Optionally, you can add additional logic here (e.g., display a message to the user)
        }
    });
});

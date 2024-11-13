function updateCounter() {
    let textEntered = document.getElementById("message").value;
    let charCount = 1000 - textEntered.length;
    document.getElementById("charCount").innerText = charCount;
}
$(document).ready(function () {
    $('#yes').click(function () {
        if ($(this).is(':checked')) {
            $('#signupButton').removeClass('disabled-button').prop('disabled', false);
        } else {
            $('#signupButton').addClass('disabled-button').prop('disabled', true);
        }
    });
});

$(document).ready(function() {
    $('#appointmentdate').change(function() {
        var isDisabled = $(this).val() === "" || $(this).val() === "Select Date";
        $('#appointmenttime').prop('disabled', isDisabled);
    });
});




//$(document).ready(function() {
//    $('#signUp').submit(function(e) {
//        let fieldNames = ["firstname", "lastname", "email", "address", "phonenumber", "password", "confirmpassword"];
//        let allField  = true;
//        fieldNames.forEach(function(fieldName) {
//            let fieldValue = $('input[name="' + fieldName + '"]').val();
//            if (fieldValue.length <1) {
//                allField  = false;
//            }
//        });
//        if (!allField){
//            alert('Please fill the Form below');
//            e.preventDefault();
//            return;
//        }
//    });
//});

//$(document).ready(function() {
//    $('#signUp').submit(function(e) {
//        if (!$('input[name="gender"]:checked').length) {
//            alert('Please select your gender.');
//            e.preventDefault();  //Prevent form submission
//            return;
//        }
//    });
//});

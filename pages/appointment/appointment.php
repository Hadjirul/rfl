<?php
session_start();
ob_start();
include '../header.php';
include '../../database/connection.php';

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$query = "SELECT first_name, middle_name, last_name, email, phone, gender, birthdate, street_address, street_address_line_2, city, province, zip_code 
          FROM users WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc() ?: [];
    $stmt->close();
} else {
    die("Query preparation failed: " . $conn->error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'] ?? null;
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $street_address = $_POST['street_address'];
    $street_address_line_2 = $_POST['street_address_line_2'] ?? null;
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $ocular_history = $_POST['ocular_history'];
    $family_health_history = $_POST['family_health_history'];
    $appointment_reason = $_POST['appointment_reason'];
    $doctor_id = $_POST['doctor_id'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert data into the database
    $query = "INSERT INTO appointments 
    (user_id, first_name, middle_name, last_name, birthdate, phone, gender, email, 
     street_address, street_address_line_2, city, province, zip_code, ocular_history, 
     family_health_history, appointment_reason, doctor_id, service, date, time) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt) {
$stmt->bind_param("isssssssssssssssssss",
  $user_id, $first_name, $middle_name, $last_name, $birthdate, $phone, $gender, $email,
  $street_address, $street_address_line_2, $city, $province, $zip_code, $ocular_history,
  $family_health_history, $appointment_reason, $doctor_id, $service, $date, $time
);
if ($stmt->execute()) {
  header("Location: ../home/index.php");
  exit();
} else {
  echo "<p>Error: " . $stmt->error . "</p>";
}
$stmt->close();
}
else {
      die("Query preparation failed: " . $conn->error);
  }
}
?>  


<!-- Form HTML -->
<div class="form-container">
  <div class="form-wrapper mb-3">
    <form  method="POST" action="">
      <h1 class="form-title">Appointment Form</h1>
      
      <!-- Steps Indicator -->
      <div class="steps" style="margin-bottom:40px;">
        <ul>
          <li class="step-menu active" id="step1">
            <span>1</span> Personal Information
          </li>
          <li class="step-menu" id="step2">
            <span>2</span> History
          </li>
          <li class="step-menu" id="step3">
            <span>3</span> Confirmation
          </li>
        </ul>
      </div>

      <!-- Step 1: Personal Information -->
      <div class="form-step" id="form-step-1">
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="firstName">First Name:</label>
            <input type="text" name="first_name" class="form-control" id="firstName" value="<?php echo htmlspecialchars($user['first_name'] ?? ''); ?>" >
          </div>
          <div class="form-group col-md-4">
            <label for="middleName">Middle Name:</label>
            <input type="text" name="middle_name" class="form-control" id="middleName" value="<?php echo htmlspecialchars($user['middle_name'] ?? ''); ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="lastName">Last Name:</label>
            <input type="text" name="last_name" class="form-control" id="lastName" value="<?php echo htmlspecialchars($user['last_name'] ?? ''); ?>" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $user['birthdate']; ?>"  data-default-value="<?php echo $user['birthdate']; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" data-default-value="<?php echo $user['phone']; ?>" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" id="gender" >
              <option value="male" <?php echo $user['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
              <option value="female" <?php echo $user['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
              <option value="other" <?php echo $user['gender'] == 'other' ? 'selected' : ''; ?>>Other</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>"  data-default-value="<?php echo $user['email']; ?>">
          </div>
        </div>
        <div class="form-row">
    <div class="form-group col-6">
        <label for="province">Province:</label>
        <select class="form-control" id="province" name="province">
            <option value="" disabled selected>Select a province</option>
            <option value="Zamboanga Del Sur" <?php echo $user['province'] == 'Zamboanga Del Sur' ? 'selected' : ''; ?>>Zamboanga Del Sur</option>
            <option value="Zamboanga Del Norte" <?php echo $user['province'] == 'Zamboanga Del Norte' ? 'selected' : ''; ?>>Zamboanga Del Norte</option>
            <option value="Zamboanga Sibugay" <?php echo $user['province'] == 'Zamboanga Sibugay' ? 'selected' : ''; ?>>Zamboanga Sibugay</option>
            <!-- Add more provinces as needed -->
        </select>
    </div>

    <div class="form-group col-6">
        <label for="city">City:</label>
        <select class="form-control" id="city" name="city">
            <option value="" disabled selected>Select a city</option>
            <option value="Zamboanga City" <?php echo $user['city'] == 'Zamboanga City' ? 'selected' : ''; ?>>Zamboanga City</option>
            <!-- Add more cities as needed -->
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-4">
        <label for="streetAddress">Barangay:</label>
        <select class="form-control" id="street_address" name="street_address">
            <option value="" disabled selected>Select a barangay</option>
            <option value="Arena Blanco" <?php echo $user['street_address'] == 'Arena Blanco' ? 'selected' : ''; ?>>Arena Blanco</option>
            <option value="Tumaga" <?php echo $user['street_address'] == 'Tumaga' ? 'selected' : ''; ?>>Tumaga</option>
            <option value="Talon Talon" <?php echo $user['street_address'] == 'Talon Talon' ? 'selected' : ''; ?>>Talon Talon</option>
            <option value="Zambowood" <?php echo $user['street_address'] == 'Zambowood' ? 'selected' : ''; ?>>Zambowood</option>
        </select>
    </div>

    <div class="form-group col-4">
        <label for="streetAddress2">Street Address</label>
        <input type="text" class="form-control" id="street_address_line_2" name="street_address_line_2" 
               value="<?php echo $user['street_address_line_2']; ?>" placeholder="Optional">
    </div>

    <div class="form-group col-4">
        <label for="zip_code">Zip Code:</label>
        <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo $user['zip_code']; ?>">
    </div>
</div>
</div>

<!-- Step 2: History -->
<div class="form-step" id="form-step-2" style="display: none;">
        <div>
          <label for="ocular_history">Ocular History:</label>
          <textarea name="ocular_history" id="ocular_history" placeholder="Please type your answer" class="multi-line-input"></textarea>
        </div>
        <div>
          <label for="family_health_history">Family Health History:</label>
          <textarea name="family_health_history" id="family_health_history" placeholder="Please type your answer" class="multi-line-input"></textarea>
        </div>
        <div>
          <label for="appointment_reason">Reason for Appointment:</label>
          <textarea name="appointment_reason" id="appointment_reason" placeholder="Please type your answer" class="multi-line-input"></textarea>
        </div>
      </div>

      <!-- Step 3: Confirmation -->
      <div class="form-step" id="form-step-3" style="display: none;">
        <div class="form-group">
          <label for="doctor_id">Choose Doctor:</label>
          <select name="doctor_id" class="form-control" id="doctor_id" >
            <option value="">Choose your Doctor</option>
            <?php
    // Fetch doctors from the database
    $doctor_query = "SELECT id, first_name, last_name FROM doctor";
    $doctor_result = $conn->query($doctor_query);
    while ($doctor_id = $doctor_result->fetch_assoc()) {
        echo '<option value="' . $doctor_id['id'] . '">' . htmlspecialchars($doctor_id['first_name'] . ' ' . $doctor_id['last_name']) . '</option>';
    }
    ?>
          </select>
        </div>

        
        <div class="form-group">
          <label for="service">Choose Service:</label>
          <select name="service" class="form-control" id="service" >
                <option value="">Choose Service</option>
                <option value="Lense Type">Lense Type</option>
                <option value="Frame Selection">Frame Selection</option>
                <option value="Custom Fitting">Custom Fitting</option>
                <option value="ense Type">Lense Type</option>
                <option value="Digital Retinal Imaging">Digital Retinal Imaging</option>
                <option value="Visual Activity Test">Visual Activity Test</option>
                <option value="Refraction Assessment">Refraction Assessment</option>
                <option value="Eye Pressure Measurement">Eye Pressure Measurement</option>
                <option value="Foreign Body Removal">Foreign Body Removal</option>  
                <option value="Anti-Reflective Coating">Anti-Reflective Coating</option>
                <option value="Scratch-Resistant Coating">Scratch-Resistant Coating</option>
                <option value="UV Protection">UV Protection</option>
            </select>
        </div>
          
    <div>
    <label for="date">Choose Date:</label>
    <input type="date" name="date" id="date" placeholder="Select a date">
      </div>

      <div class = "mb-3">
          <label for="date" >Choose Time:</label>
          <select name="time" id="time" class="form-control">
          <option value="">Choose Time</option>
          <option value="8:00am-8:30am">8:00 AM - 8:30 AM</option>
          <option value="8:30am-9:00am">8:30 AM - 9:00 AM</option>
          <option value="9:00am-9:30am">9:00 AM - 9:30 AM</option>
          <option value="9:30am-10:00am">9:30 AM - 10:00 AM</option>
          <option value="10:00am-10:30am">10:00 AM - 10:30 AM</option>
          <option value="10:30am-11:00am">10:30 AM - 11:00 AM</option>
          <option value="11:00am-11:30am">11:00 AM - 11:30 AM</option>
          <option value="11:30am-12:00pm">11:30 AM - 12:00 PM</option>
          <option value="12:00pm-12:30pm">See More..</option> 
      </select>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="form-btn-wrapper">
        <button type="button" id="prevBtn" style="display: none;" class="prev-btn">Previous</button>
        <button type="button" id="nextBtn" class="next-btn">Next</button>
        <button type="button" class="btn btn-primary mt-3" id="submitBtn">Submit</button>
      </div>

<div class="modal text-align-center" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-block">
        <h5 class="modal-title" id="confirmationModalLabel">Confirm Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Are you sure you want to book this appointment?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  " data-dismiss="modal">Cancel</button>
        <button type="button" id="confirmSubmit" class="btn btn-primary btn-block">Yes, Confirm</button>
      </div>
    </div>
  </div>
</div>


<!-- Success Modal -->
<div class="modal fade text-align-center" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Appointment Successful</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your appointment has been successfully booked.
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-block">Back to Homepage</button>
      </div>
    </div>
  </div>
</div>

    </form>
  </div>
</div>

<div id="appointmentModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Appointment Options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Is this appointment for you or someone else?</p>
        <div class="form-group">
          <button id="appointSelfBtn" class="btn btn-primary btn-block">For Myself</button>
          <button id="appointOthersBtn" class="btn btn-secondary btn-block">For Someone Else</button>
        </div>
        <div id="patientCountGroup" class="form-group" style="display: none;">
          <label for="patientCount">How many patients do you want to appoint?</label>
          <input type="number" id="patientCount" class="form-control" min="1" placeholder="Enter number of patients">
        </div>
      </div>
      <div class="modal-footer">
        <button id="confirmBtn" class="btn btn-success" style="display: none;">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<style>
body {
    background-image: url(../img/backround.jpg);
    background-size: cover;
     /* Solid background for the body */
}

  .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px;
  }
.steps{

  m
}
  h1{
    text-align: center;
    margin: 30px;
  }
  .form-wrapper {
    max-width: 650px;
    width: 100%;
    background: white;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }
  .steps ul {
    display: flex;
    justify-content: space-around;
    padding: 0;
    margin-bottom: 20px;
    list-style: none;
  }

  .form-group{
    height:70px;
  }
  input{
    height:40px;
  }
  .steps li {
    text-align: center;
    font-size: 16px;
    color: #555;
    font-weight: bold;
  }
  .step-menu.active span, .step-menu.active {
    color: #1A76D1;;
  }
  .step-menu span {
    display: inline-block;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: #ddd;
    color: #fff;
    text-align: center;
    line-height: 35px;
  }
  .form-step { display: none; }
  .form-step.active { display: block; }
  .input-flex {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
  }
  .input-flex div { width: 48%; }
  label {
    font-size: 14px;
    color: #333;
    display: block;
    margin-bottom: 5px;
  }
  input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ddd;
  }
  .form-confirm p {
    font-size: 16px;
    color: #555;
  }
  .form-btn-wrapper {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
  }
  .back-btn, .next-btn {
    padding: 10px 20px;
    border: none;
    color: white;
    background-color: #1A76D1;;
    border-radius: 4px;
    cursor: pointer;
  }

  .form-control {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
    }
    .custom-select {
        appearance: none;           /* Remove default arrow */
        -webkit-appearance: none;    /* Remove arrow in Safari */
        background-color: #fff;
        padding-right: 30px;         /* Add padding for arrow */
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns="http://www.w3.org/2000/svg" width="10" height="5" viewBox="0 0 10 5"%3E%3Cpath fill="%23000000" d="M0 0l5 5 5-5z"/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: right 10px center;
    }

    .form-title {
    font-size: 37px;
    margin-bottom: 15px;
    position: relative;
    padding-bottom: 20px;
  }

  /* Add the blue line below the heading */
  .form-title::after {
    content: "";
    display: block;
    width: 100%;
    height: 3px; /* Thickness of the line */
    background-color: blue; /* Color of the line */
    position: absolute;
    bottom: 0;
    left: 0;
  }
  .steps{
    list-style: none;
    padding: 0;
    margin-bottom: 10px;
    position: relative;
    padding-bottom: .5px; /* Space for the line */
  }

  /* Blue line below the steps-list */
  .steps::after {
    content: "";
    display: block;
    width: 100%;
    height: 3px; /* Thickness of the line */
    background-color: blue; /* Color of the line */
    position: absolute;
    bottom: 0;
    left: 0;
  }

  .multi-line-input {
    height: 60px; /* Adjust height to simulate rows */
    padding: 10px;
    line-height: 1.5;
    margin-bottom: 15px;
}

  .confirm-btn.active { background-color: #1A76D1;; color: white; }

  .modal-content {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);

  }

  .modal-header {
    border-bottom: 2px solid blue;
  }

  .modal-title {
    font-size: 20px;
    font-weight: bold;
    color: #1A76D1;;
  }

  .btn-primary,
  .btn-secondary,
  .btn-success {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    margin-bottom: 10px;
  }

  .btn-primary {
    background-color: #1A76D1;;
    border: none;
  }

  .btn-secondary {
    background-color: #ddd;
    border: none;
  }

  .btn-success {
    background-color: green;
    border: none;
  }

  .form-group label {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .form-control {
    border-radius: 4px;
    height: 40px;
    font-size: 16px;
  }
</style>

<script>  

document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("appointmentModal");
    const appointSelfBtn = document.getElementById("appointSelfBtn");
    const appointOthersBtn = document.getElementById("appointOthersBtn");
    const patientCountGroup = document.getElementById("patientCountGroup");
    const confirmBtn = document.getElementById("confirmBtn");

    // Show modal when page loads
    $(modal).modal({ backdrop: "static", keyboard: false });

    appointSelfBtn.addEventListener("click", () => {
      patientCountGroup.style.display = "none";
      confirmBtn.style.display = "block";
    });

    appointOthersBtn.addEventListener("click", () => {
      patientCountGroup.style.display = "block";
      confirmBtn.style.display = "block";
    });

    confirmBtn.addEventListener("click", () => {
      const patientCount = document.getElementById("patientCount").value;

      if (appointOthersBtn.classList.contains("active") && !patientCount) {
        alert("Please specify the number of patients.");
        return;
      }

      $(modal).modal("hide");
    });
  });





  document.addEventListener("DOMContentLoaded", function () {
  const steps = document.querySelectorAll(".form-step"); // Form steps
  const stepMenus = document.querySelectorAll(".step-menu"); // Menu steps
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");
  const submitBtn = document.getElementById("submitBtn");
  let currentStep = 0;

  // Function to show the current step
  function showStep(stepIndex) {
    // Show/hide form steps
    steps.forEach((step, index) => {
      step.style.display = index === stepIndex ? "block" : "none";
    });

    // Update menu step styles
    stepMenus.forEach((menu, index) => {
      if (index === stepIndex) {
        menu.classList.add("active"); // Add 'active' class to the current step
      } else {
        menu.classList.remove("active");
      }
    });

    // Show/hide buttons
    prevBtn.style.display = stepIndex === 0 ? "none" : "inline-block";
    nextBtn.style.display = stepIndex === steps.length - 1 ? "none" : "inline-block";
    submitBtn.style.display = stepIndex === steps.length - 1 ? "inline-block" : "none";
  }

  // Event listeners for navigation buttons
  nextBtn.addEventListener("click", () => {
    if (currentStep < steps.length - 1) {
      currentStep++;
      showStep(currentStep);
    }
  });

  prevBtn.addEventListener("click", () => {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  });

  

  // Initialize the form with the first step visible
  showStep(currentStep);
});

  document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("appointmentModal");
    const appointSelfBtn = document.getElementById("appointSelfBtn");
    const appointOthersBtn = document.getElementById("appointOthersBtn");
    const patientCountGroup = document.getElementById("patientCountGroup");
    const confirmBtn = document.getElementById("confirmBtn");
    const patientCountInput = document.getElementById("patientCount");

    // Initially hide the "Confirm" button and patient count group
    confirmBtn.style.display = "none";
    patientCountGroup.style.display = "none";

    // If "For Myself" is clicked
    appointSelfBtn.addEventListener("click", function () {
        patientCountGroup.style.display = "none"; // Hide the patient count input
        confirmBtn.style.display = "block"; // Show the confirm button
    });

    // If "For Someone Else" is clicked
    appointOthersBtn.addEventListener("click", function () {
        patientCountGroup.style.display = "block"; // Show the patient count input
        confirmBtn.style.display = "block"; // Show the confirm button
    });

    // Enable "Confirm" button only if patient count is valid
    patientCountInput.addEventListener("input", function () {
        const patientCount = parseInt(patientCountInput.value, 10);
        if (patientCount > 0) {
            confirmBtn.style.display = "block";
        } else {
            confirmBtn.style.display = "none";
        }
    });
});


document.getElementById('submitBtn').addEventListener('click', function () {
      // Show the confirmation modal
      $('#confirmationModal').modal('show');
  });

 // Handle "Yes, Confirm" button click
 document.getElementById('confirmSubmit').addEventListener('click', function () {
      // Hide the confirmation modal
      $('#confirmationModal').modal('hide');
  });


  document.getElementById('confirmSubmit').addEventListener('click', function () {
      // Show the confirmation modal
      $('#successModal').modal('show');
  });

</script>

<?php
include '../script.php';
?>

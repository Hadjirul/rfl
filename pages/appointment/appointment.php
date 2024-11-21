<?php
session_start();
include '../header.php';
?>

<div class="form-container">
  <div class="form-wrapper">
    <form action="" method="POST">
      <h1 class = "form-title">Appointment Form</h1>
        <div class="steps" style = "margin-bottom:40px;">
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

        <div class="form-step" id="form-step-1">
        <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" placeholder="First name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="middleName">Middle Name:</label>
                    <input type="text" name="middle_name" class="form-control" id="middleName" placeholder="Middle name">
                </div>
                <div class="form-group col-md-4">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Last name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birthdate">Birthdate:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                </div>
            </div>
            <div class="form-row">
    <div class="form-group col-md-6">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender" required>
            <option value="" disabled selected>Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
    </div>
</div>


            <!-- Address -->
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="streetAddress">Street Address:</label>
                    <input type="text" class="form-control" id="street_address" name="street_address" required>
                </div>
                <div class="form-group col-6">
                    <label for="streetAddress2">Street Address Line 2:</label>
                    <input type="text" class="form-control" id="street_address_line_2" name="street_address_line_2" placeholder="Optional">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group col-4">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control" id="province" name="province" required>
                </div>
                <div class="form-group col-4">
                    <label for="province">Zip Code:</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                </div>
            </div>

        </div>


        

        <div class="form-step" id="form-step-2">
            <div>
                <label for="ocular_history">Occular History:</label>
                <input type="text" name="ocular_history" id="ocular_history" placeholder="Please type your answer" class="multi-line-input">
            </div>

            <div>
                <label for="family_health_history">Family Health History:</label>
                <input type="text" name="family_health_history" id="family_health_history" placeholder="Please type your answer" class="multi-line-input">
            </div>

            <div>
                <label for="appointment_reason">Reason for Appointment:</label>
                <input type="text" name="appointment_reason" id="appointment_reason" placeholder="Please type your answer" class="multi-line-input">
            </div>
        </div>






  
    <div class="form-step" id="form-step-3">
        <div class="form-group">
            <label for="doctor">Choose Doctor:</label>
            <select name="dcotr" class="form-control" id="doctor" required>
                <option value="" disabled selected>Select your doctor</option>
                <option value="">Dr. Rosalinda Lim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="service">Choose Service:</label>
            <select name="service" class="form-control" id="service" required>
                <option value="" disabled selected>Select service you need</option>
                <option value="">Lense Type</option>
                <option value="">Frame Selection</option>
                <option value="">Custom Fitting</option>
                <option value="">Lense Type</option>
                <option value="">Digital Retinal Imaging</option>
                <option value="">Visual Activity Test</option>
                <option value="">Refraction Assessment</option>
                <option value="">Eye Pressure Measurement</option>
                <option value="">Foreign Body Removal</option>  
                <option value="">Anti-Reflective Coating</option>
                <option value="">Scratch-Resistant Coating</option>
                <option value="">UV Protection</option>
            </select>
        </div>
          
        <div>
    <label for="date">Choose Date:</label>
    <input type="date" name="date" id="date" placeholder="Select a date">
      </div>

      <div class = "mb-3">
          <label for="time">Choose Time:</label>
          <input type="time" name="time" id="time" placeholder="Select a time">
      </div >
          
        </div>


        <div class="form-btn-wrapper">
          <button type="button" class="back-btn" id="back-btn">Back</button>
          <button type="button" class="next-btn" id="next-btn">Next Step</button>
        </div>
    </form>
  </div>
</div>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
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
    color: #6A64F1;
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
    background-color: #6A64F1;
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

  .confirm-btn.active { background-color: #6A64F1; color: white; }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const steps = document.querySelectorAll(".step-menu");
    const formSteps = document.querySelectorAll(".form-step");
    const nextBtn = document.getElementById("next-btn");
    const backBtn = document.getElementById("back-btn");

    let currentStep = 0;
    updateForm();

    nextBtn.addEventListener("click", (event) => {
      event.preventDefault(); // Prevent form submission
      if (currentStep < steps.length - 1) {
        currentStep++;
        updateForm();
      } else {
        document.querySelector("form").submit();
      }
    });

    backBtn.addEventListener("click", () => {
      if (currentStep > 0) {
        currentStep--;
        updateForm();
      }
    });

    function updateForm() {
      formSteps.forEach((step, index) => {
        step.classList.toggle("active", index === currentStep);
        steps[index].classList.toggle("active", index === currentStep);
      });
      backBtn.style.display = currentStep === 0 ? "none" : "inline-block";
      nextBtn.textContent = currentStep === steps.length - 1 ? "Submit" : "Next Step";
    }
  });


  
</script>

<?php
include '../script.php';
?>

<?php
session_start();

// Include the database connection file
include "./Config/conn.php";

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $home_address = $_POST["home_address"];
    $password = $_POST["password"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email is already in use
    $sql = "SELECT * FROM customer WHERE email_address = '$email'";
    $result = mysqli_query($conn, $sql);
    //hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //if the email is not in use, insert the user into the database

    if (mysqli_num_rows($result) == 0) {
        // Email is not in use, insert the user into the database
        $sql = "INSERT INTO customer (first_name, last_name, date_of_birth, email_address, phone_number, home_address, password) VALUES ('$first_name', '$last_name', '$date_of_birth', '$email', '$phone_number', '$home_address', '$hashed_password')";
        $result = mysqli_query($conn, $sql);

        // Redirect to login page
        header("Location: login.php");
        exit();
    } else {
        // Email is already in use, show error message
        $error = "Email is already in use";
    }
}
?>


<?php
include './includes/header.php';
?>

<!-- Sign-up form HTML -->
<div class="container-sm m1 mt-5">
    <!-- spit error with a class .error -->
    <div class="error">
        <?php if (isset($error)) {
            echo $error;
        } ?>
    </div>

    <div class="row m-3">
        <div class="col-md-12">
            <h2>Create an account</h2>
        </div>
    </div>


    <form class="form-group row g-3 needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">First name</label>
            <input type="text" class="form-control" name="first_name" id="validationTooltip01" value="Mark" required>
            <div class="valid-tooltip">
                Looks good!
            </div>
        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">Last name</label>
            <input type="text" class="form-control" name="last_name" id="validationTooltip02" value="Otto" required>
            <div class="valid-tooltip">
                Looks good!
            </div>
        </div>
        <!-- email -->
        <div class="col-md-6 position-relative">
            <label for="validationTooltip03" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="validationTooltip03" required>
            <div class="invalid-tooltip">
                Please provide a valid email.
            </div>
        </div>
        <!-- phone number -->
        <div class="col-md-6 position-relative">
            <label for="validationTooltip03" class="form-label">Phone number</label>
            <input type="text" class="form-control" name="phone_number" id="validationTooltip03" required>
            <div class="invalid-tooltip">
                Please provide a valid phone number.
            </div>
        </div>
        <!-- date of birth -->
        <div class="col-md-6 position-relative">
            <label for="validationTooltip03" class="form-label">Date of birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="validationTooltip03" required>
            <div class="invalid-tooltip">
                Please provide a valid date of birth.
            </div>
        </div>

        <!-- choose password and retype passwprd -->
        <div class="col-md-6 position-relative">
            <label for="validationTooltip03" class="form-label">Choose password</label>
            <input type="password" class="form-control" id="validationTooltip03" required>
            <div class="invalid-tooltip">
                Please provide a valid password.
            </div>
        </div>
        <div class="col-md-6 position-relative">
            <label for="validationTooltip03" class="form-label">Retype password</label>
            <input type="password" class="form-control" name="password" id="validationTooltip03" required>
            <div class="invalid-tooltip">
                Please provide a valid password.
            </div>
        </div>

        <!-- address -->
        <div class="col-md-6 position-relative">
            <label for="validationTooltip03" class="form-label">Address</label>
            <input type="text" name="home_address" class="form-control" id="validationTooltip03" required>
            <div class="invalid-tooltip">
                Please provide a valid address.
            </div>
        </div>


        <div class="col-12">
            <button class="btn btn-primary mt-1 mb-1" type="submit">Submit form</button>
        </div>
    </form>


    <hr>
    <p>Already have an account? <a href="login.php">Login</a></p>

</div>
<!-- a section that can allow a user to login if they have an account -->


<?php
include './includes/footer.php';
?>
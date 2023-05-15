<?php
session_start();

// Include the database connection file
include "./Config/conn.php";

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query the database for the user with the given email
    $sql = "SELECT * FROM customer WHERE email_address = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if the user exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password_db = $row["password"];

        // Verify the password
        if (password_verify($password, $hashed_password_db)) {
            // Password is correct, store user information in session
            $_SESSION["customer_id"] = $row["customer_id"];
            $_SESSION["first_name"] = $row["first_name"];
            $_SESSION["last_name"] = $row["last_name"];

            // Redirect to home page or dashboard
            header("Location: approvals.php");
            exit();
        } else {
            // Password is incorrect, show error message
            $error = "Invalid email or password";
        }
    } else {
        // User does not exist, show error message
        $error = "Invalid email or password";
    }
}

?>

<!-- Login form HTML -->
<?php
include './includes/header.php';
?>

<div class="container-sm m1 mt-5">


    <div class="row m-3">
        <div class="col-md-12">
            <h2>Sign In</h2>
        </div>
    </div>



    <div class="error">
        <?php if (isset($error)) {
            echo $error;
        } ?>
    </div>

    <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">



        <!-- email -->
        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="validationTooltip01" value="Mark" required>
            <div class="valid-tooltip">
                Looks good!
            </div>
        </div>

        <!-- password -->
        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="validationTooltip01" value="Mark" required>
            <div class="valid-tooltip">
                Looks good!
            </div>
        </div>



        <button class="btn btn-primary mt-1 mb-2" type="submit">Login</button>

    </form>

    <!-- A section that goes to sign up in case the user has no account yet -->
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>







</div>



<?php
include './includes/footer.php';
?>
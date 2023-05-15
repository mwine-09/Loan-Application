<?php

session_start();
include './includes/header.php';
?>



<?php
include './Config/conn.php';
$id = $_SESSION['customer_id'];

// retrieve the user's profile information
$sql = "SELECT * FROM customer WHERE customer_id = '$id'";

$result = mysqli_query($conn, $sql);
// i want to display the firstname, lastname, email, phone number, and home address from the result set
$row = mysqli_fetch_assoc($result);
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email_address'];
$phone_number = $row['phone_number'];
$home_address = $row['home_address'];


// display the user information in tabular format


?>
<!-- display the error messages -->
<div class="error">
    <?php if (isset($error)) {
        echo "<h2>" + $error + "</h2>";
    } ?>
</div>

<div class="container">
    <h5>User Profile</h5>




    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Personal Information</h5>
            <div class="row">
                <div class="col-sm-6">
                    <p><strong>First Name:</strong> <?php echo $first_name; ?></p>
                    <p><strong>Last Name:</strong> <?php echo $last_name; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                </div>
                <div class="col-sm-6">
                    <p><strong>Phone:</strong> <?php echo $phone_number; ?></p>
                    <p><strong>Address:</strong> <?php echo $home_address; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- change password -->
<div class="container mt-5">
    <h5>Change Password</h5>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form1">
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['form1'])) {

    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    $hashed_password_db = $row["password"];

    if (password_verify($current_password, $hashed_password_db)) {
        if ($new_password == $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE customer SET password = '$hashed_password' WHERE customer_id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: profile.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            $error = "New password and confirm password do not match";
        }
    } else {
        $error = "Current password is incorrect";
    }
}
?>



<?php
include './includes/footer.php';
?>
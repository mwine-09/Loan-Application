<?php
include './includes/header.php';
include './Config/conn.php';

$id = $_SESSION['customer_id'];

$sql = "SELECT * FROM customer WHERE customer_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ([isset($_POST["current_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])]) {
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





<!-- footer -->
<?php
include './includes/footer.php';
?>
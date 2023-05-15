<?php
include './includes/header.php';

include './Config/conn.php';

$id = $_SESSION['id'];
$sql = 'SELECT * FROM loan_approval where customer_id = $id';
$result = mysqli_query($conn, $sql);



$sql2 = 'SELECT * FROM loan_approval where loan_status = "Approved"';
$result2 = mysqli_query($conn, $sql2);


?>
<div class="container">
    <h3>Recent Loan Applications</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Application ID</th>
                <th scope="col">Loan Amount</th>
                <th scope="col">Loan Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $application_id = $row['application_id'];
                $loan_amount = $row['loan_amount'];
                $loan_status = $row['loan_status'];
            ?>
                <tr>
                    <th scope="row"><?php echo $application_id; ?></th>
                    <td><?php echo $loan_amount; ?></td>
                    <td><?php echo $loan_status; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <hr>
    <h3>Approved Loans</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Application ID</th>
                <th scope="col">Loan Amount</th>
                <th scope="col">Loan Status</th>
            </tr>
        </thead>

        <?php if (mysqli_num_rows($result2) == 0) { ?>
            <tbody>
                <tr>
                    <td colspan="4">No approved loans</td>
                </tr>
            </tbody>
        <?php } else { ?>

            <tbody>
                <?php
                $sql = 'SELECT * FROM loan_approval where customer_id = $id and loan_status = "Approved"';
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $application_id = $row['application_id'];
                    $loan_amount = $row['loan_amount'];
                    $loan_status = $row['loan_status'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $application_id; ?></th>
                        <td><?php echo $loan_amount; ?></td>
                        <td><?php echo $loan_status; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        <?php } ?>
    </table>



</div>




<?php
include './includes/footer.php';
?>
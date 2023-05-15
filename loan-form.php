<?php
include './includes/header.php';
?>

<!-- About page HTML -->
<div class="container">
    <h1>Loan Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form1">
        <div class="mb-3">
            <label for="loan_amount" class="form-label">Loan Amount</label>
            <input type="text" class="form-control" id="loan_amount" name="loan_amount">
        </div>
        <div class="mb-3">
            <label for="loan_term" class="form-label">Loan Term</label>
            <input type="text" class="form-control" id="loan_term" name="loan_term">
        </div>
        <div class="mb-3">
            <label for="loan_purpose" class="form-label">Loan Purpose</label>
            <input type="text" class="form-control" id="loan_purpose" name="loan_purpose">
        </div>
        <div class="mb-3">
            <label for="loan_type" class="form-label">Loan Type</label>
            <input type="text" class="form-control" id="loan_type" name="loan_type">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>

</div>

<?php
include '../includes/footer.php';
?>
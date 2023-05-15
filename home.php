<?php
include './includes/header.php';
include './Config/conn.php';
$sql = "SELECT * FROM loans";
$result = mysqli_query($conn, $sql);
?>



<main class="wrapper container" style="height:1000px">


    <div id="loan-carousel" class="carousel slide mt-5 mb-5" data-bs-ride="carousel" style="height:40vh">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#loan-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#loan-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#loan-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height:100%">
            <div class="carousel-item active">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center mb-5" style="position:absolute; z-index:1">
                    <h5>Personal Loans</h5>
                    <p>Get the funds you need to cover unexpected expenses and more.</p>
                </div>
                <img src="./images/personal.jpg" class="d-block w-100 h-100" alt="...">

            </div>

            <div class="carousel-item">
                <img src="./images/business.jpg" class="d-block w-100 h-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center mb-5" style="position:absolute; z-index:1">
                    <h5>Business Loans</h5>
                    <p>Expand your business with a loan tailored to your needs.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./images/car.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center mb-5" style="position:absolute; z-index:1">
                    <h5>Car Loans</h5>
                    <p>Get the car of your dreams with our competitive rates.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#loan-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#loan-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container mb-5">
        <!-- i want to display the types of loans we offer to our clients. These loans have fields like name, image and description -->
        <h4 class="mt-5 mb-5">Our Services</h4>
        <!-- cards -->
        <div class="card-deck row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $loan_id = $row['loan_id'];
                $loan_name = $row['name'];
                $loan_image = $row['image_path'];
                $loan_description = $row['description'];
            ?>
                <div class="col-md-3">
                    <div class="card h-70">
                        <img src="<?php echo $loan_image; ?>" class="card-img-bottom" alt="<?php echo $loan_name; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $loan_name; ?> Loans</h5>
                            <p class="card-text"><?php echo $loan_description; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="apply.php?loan_id=<?php echo $loan_id; ?>" class="btn btn-primary">Apply Now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<style>
    .card-text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }
</style>










<!-- include the footer -->

<div class="footer fixed-bottom">

    <?php
    include './includes/footer.php';
    ?>

</div>
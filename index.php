<?php
include './includes/header.php';
?>

<div class="hero ">
    <h1 class="block">Welcome to Jumbo Loans</h1>
    <p>Here at Jumbo Loans we offer the best rates on the market.</p>

</div>


<style>
    /* center the .container vertically and horizontally */


    .hero {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 60vh;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 0;
    }

    .hero p {
        font-size: 1.5rem;
        margin-top: 0;
    }
</style>






<!-- include the footer -->

<?php
include './includes/footer.php';
?>
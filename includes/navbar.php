<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <h1>Jumbo</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loan-form.php">Apply for a loan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                    <!-- If the user is logged in, show the logout link -->

                    <?php if (isset($_SESSION["customer_id"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="approvals.php">Loan approvals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="profile.php">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>






                </ul>
            </div>
        </div>
    </nav>
    <hr>

</header>
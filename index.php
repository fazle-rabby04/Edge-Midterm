<?php
session_start();
?>
<?php include 'header.php'; ?>
<div class="d-flex flex-column min-vh-100">
    <div class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to the Hotel Management Admin Panel</h1>
                <p class="lead mb-4">Please select an option below:</p>
                <?php
                if (isset($_SESSION['admin'])) {
                    echo "<a href='Dashboard.php' class='btn btn-primary btn-lg custom-link'>Go to Dashboard</a>";
                } else {
                    echo "<a href='login.php' class='btn btn-primary btn-lg custom-link me-3'>Login</a>";
                    echo "<a href='register.php' class='btn btn-secondary btn-lg custom-link'>Register</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>




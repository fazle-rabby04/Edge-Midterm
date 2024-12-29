<?php include 'header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Register Admin User</h4>
                </div>
                <div class="card-body">
                    <?php
                    include 'dbConnect.php';

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        // Hash the password
                        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                        $sql = "INSERT INTO AdminUsers (Username, Password) VALUES (?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $username, $hashedPassword);

                        if ($stmt->execute()) {
                            echo "<div class='alert alert-success'>Admin user registered successfully. <a href='login.php' class='custom-link'>Login here</a>.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error registering admin user: " . $conn->error . "</div>";
                        }

                        $stmt->close();
                        $conn->close();
                    }
                    ?>
                    <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 custom-button">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>




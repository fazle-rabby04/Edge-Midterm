<?php include 'header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Admin Login</h4>
                </div>
                <div class="card-body">
                    <?php
                    session_start();
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        include 'dbConnect.php';
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $sql = "SELECT * FROM AdminUsers WHERE Username = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $admin = $result->fetch_assoc();
                            if (password_verify($password, $admin['Password'])) {
                                $_SESSION['admin'] = $admin['AdminID'];
                                header("Location: Dashboard.php");
                                exit();
                            } else {
                                echo "<div class='alert alert-danger'>Incorrect password.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Username not found.</div>";
                        }

                        $stmt->close();
                        $conn->close();
                    }
                    ?>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 custom-button">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>




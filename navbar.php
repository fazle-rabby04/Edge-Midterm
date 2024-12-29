<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">Hotel Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="AddRoom.php">Add Room</a></li>
                <li class="nav-item"><a class="nav-link" href="UpdateRoom.php">Update Room</a></li>
                <li class="nav-item"><a class="nav-link" href="DeleteRoom.php">Delete Room</a></li>
                <?php
                session_start();
                if (isset($_SESSION['admin'])) {
                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>




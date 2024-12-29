<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'session.php'; ?>
<div class="container mt-5">
    <h2>Add Room</h2>
    <?php
    include 'dbConnect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $roomType = $_POST['roomType'];
        $roomPrice = $_POST['roomPrice'];
        $roomStatus = $_POST['roomStatus'];

        $sql = "INSERT INTO Rooms (RoomType, Price, Status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sds", $roomType, $roomPrice, $roomStatus);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Room added successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding room: " . $conn->error . "</div>";
        }

        $stmt->close();
    }
    ?>
    <form action="AddRoom.php" method="post">
        <div class="mb-3">
            <label for="roomType" class="form-label">Room Type</label>
            <input type="text" class="form-control" id="roomType" name="roomType" required>
        </div>
        <div class="mb-3">
            <label for="roomPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="roomPrice" name="roomPrice" required>
        </div>
        <div class="mb-3">
            <label for="roomStatus" class="form-label">Status</label>
            <select class="form-select" id="roomStatus" name="roomStatus">
                <option value="Available">Available</option>
                <option value="Occupied">Occupied</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Room</button>
    </form>
</div>

<?php include 'footer.php'; ?>


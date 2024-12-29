<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2>Update Room</h2>
    <?php
    include 'dbConnect.php';

    if (isset($_GET['id']) || isset($_POST['updateRoomId'])) {
        $roomId = isset($_GET['id']) ? $_GET['id'] : $_POST['updateRoomId'];

        if (!empty($roomId)) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $roomType = $_POST['updateRoomType'];
                $roomPrice = $_POST['updateRoomPrice'];
                $roomStatus = $_POST['updateRoomStatus'];

                $sql = "UPDATE Rooms SET RoomType = ?, Price = ?, Status = ? WHERE RoomID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sdsi", $roomType, $roomPrice, $roomStatus, $roomId);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Room updated successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error updating room: " . $conn->error . "</div>";
                }

                $stmt->close();
            } else {
                // Fetch room data
                $sql = "SELECT * FROM Rooms WHERE RoomID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $roomId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $room = $result->fetch_assoc();
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-danger'>Room not found.</div>";
                    $stmt->close();
                    $conn->close();
                    exit();
                }
            }
        } else {
            echo "<div class='alert alert-warning'>Room ID is missing. Please provide a Room ID.</div>";
            $conn->close();
            exit();
        }
    } else {
        // If Room ID is not provided, ask for it
        ?>
        <form action="UpdateRoom.php" method="get">
            <div class="mb-3">
                <label for="roomId" class="form-label">Room ID</label>
                <input type="text" class="form-control" id="roomId" name="id" placeholder="Enter Room ID to update" required>
            </div>
            <button type="submit" class="btn btn-primary custom-button">Fetch Room Details</button>
        </form>
        <?php
        include 'footer.php';
        exit();
    }
    ?>
    <form action="UpdateRoom.php" method="post">
        <input type="hidden" id="updateRoomId" name="updateRoomId" value="<?php echo isset($room['RoomID']) ? $room['RoomID'] : ''; ?>" required>
        <div class="mb-3">
            <label for="updateRoomType" class="form-label">Room Type</label>
            <input type="text" class="form-control" id="updateRoomType" name="updateRoomType" value="<?php echo isset($room['RoomType']) ? $room['RoomType'] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="updateRoomPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="updateRoomPrice" name="updateRoomPrice" value="<?php echo isset($room['Price']) ? $room['Price'] : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="updateRoomStatus" class="form-label">Status</label>
            <select class="form-select" id="updateRoomStatus" name="updateRoomStatus">
                <option value="Available" <?php echo (isset($room['Status']) && $room['Status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Occupied" <?php echo (isset($room['Status']) && $room['Status'] == 'Occupied') ? 'selected' : ''; ?>>Occupied</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary custom-button">Update Room</button>
    </form>
</div>

<?php include 'footer.php'; ?>




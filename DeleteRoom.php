<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2>Delete Room</h2>
    <?php
    include 'dbConnect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $roomId = $_POST['deleteRoomId'];

        $sql = "DELETE FROM Rooms WHERE RoomID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $roomId);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Room deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting room: " . $conn->error . "</div>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
    <form action="DeleteRoom.php" method="post">
        <div class="mb-3">
            <label for="deleteRoomId" class="form-label">Room ID</label>
            <input type="text" class="form-control" id="deleteRoomId" name="deleteRoomId" placeholder="Enter room ID to delete" required>
        </div>
        <button type="submit" class="btn btn-danger custom-button">Delete Room</button>
    </form>
</div>

<?php include 'footer.php'; ?>



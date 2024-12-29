<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'session.php'; ?>
<div class="container mt-5">
    <h2>Dashboard</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Room ID</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'dbConnect.php';

            $sql = "SELECT * FROM Rooms";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['RoomID']}</td>
                            <td>{$row['RoomType']}</td>
                            <td>{$row['Price']}</td>
                            <td>{$row['Status']}</td>
                            <td>
                                <a href='UpdateRoom.php?id={$row['RoomID']}' class='btn btn-warning btn-sm'>Update</a>
                                <a href='DeleteRoom.php?id={$row['RoomID']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No rooms found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

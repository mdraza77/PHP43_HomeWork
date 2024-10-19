<?php
include("connection.php");
// Handle form submission for inserting data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Create the SQL query
    $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$name', '$email', '$phone')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Prevent form resubmission on page refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM contacts WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Prevent form resubmission on page refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// Display data in a table
$sql = "SELECT id, name, email, phone FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>All Records</h3>";
    echo "<table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["name"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["phone"] . "</td>
            <td style='display: flex; justify-content: space-evenly'>
                <form method='post' action='' style='display:inline-block;' class='delete_update'>
                    <button type='submit' name='delete' value='" . $row["id"] . "' class='action-icons delete'>
                        <i class='bx bxs-trash'></i>
                    </button>
                </form>
                <form method='post' action='' style='display:inline-block;' class='delete_update'>
                    <button type='submit' name='update' value='" . $row["id"] . "' class='action-icons update'>
                        <i class='bx bxs-edit'></i>
                    </button>
                </form>
            </td>
          </tr>";
    }
    echo "</table>";
} else {
    echo "<h3>0 Records</h3>";
}

$conn->close();
?>
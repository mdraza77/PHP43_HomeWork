<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <h2 class="Title" style="text-align: center; padding: 6px; border-radius: 5px">Basic Create, Read, Delete Operation Performed By PHP And MySQL</h2>
    <h3>Insert Data</h3>
    <form method="post" action="" class="insert_data">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required>

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" required>

        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    include("crud_operation.php");
    ?>
</body>

</html>
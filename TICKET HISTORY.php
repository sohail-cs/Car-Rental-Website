<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket History</title>
    <link rel="stylesheet" type="text/css" href="css_style.css">
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 80%;
            color: white;
        }
        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .title {
            color: white;
            text-align: center;
            margin-top: 50px;
        }
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            font-family: Arial, sans-serif;
        }
        .nav-links {
            text-align: right;
            margin-right: 20px;
        }
        .nav-links a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .form-container {
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="nav-links">
        <a href="homepage.html">HOME</a>
        <a href="ADD.html">ADD</a>
        <a href="UPDATE.php">UPDATE</a>
        <a href="delete.php">DELETE</a>
        <a href="CHARTS.html">CHARTS</a>
        <a href="index.html">LOG OUT</a>
    </div>
    <center>
        <h3 class="title">View Ticket History</h3>
        <?php
        // DATABASE DETAILS
        $hostname = "localhost";
        $user = "root";
        $pass = "";
        $db = "tickets";

        // ESTABLISHING DATABASE CONNECTION
        $conn = mysqli_connect($hostname, $user, $pass, $db);

        if (mysqli_connect_errno()) {
            die("No connection: " . mysqli_connect_error());
        }

        // Handle form submission for updating ticket status
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];

            // Update the status in the database
            $updateQuery = "UPDATE `Tickets Information` SET Status='$status' WHERE id='$id'";
            if (mysqli_query($conn, $updateQuery)) {
                echo '<p>Status updated successfully!</p>';
            } else {
                echo '<p>Error updating status: ' . mysqli_error($conn) . '</p>';
            }
        }

        // SQL QUERY TO SELECT ALL ROWS FROM Tickets Information
        $result = mysqli_query($conn, "SELECT * FROM `Tickets Information` ORDER BY id ASC");

        // DISPLAY TABLE CONTAINING DATA
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Issue</th>';
        echo '<th>Description</th>';
        echo '<th>Status</th>';
        echo '<th>Update Status</th>';
        echo '</tr>';

        while ($res = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $res['id'] . '</td>';
            echo '<td>' . $res['Issue'] . '</td>';
            echo '<td>' . $res['Description'] . '</td>';
            echo '<td>' . $res['Status'] . '</td>';
            echo '<td>
                    <form action="" method="POST">
                        <select name="status">
                            <option value="Open" ' . ($res['Status'] == 'Open' ? 'selected' : '') . '>Open</option>
                            <option value="In Progress" ' . ($res['Status'] == 'In Progress' ? 'selected' : '') . '>In Progress</option>
                            <option value="Closed" ' . ($res['Status'] == 'Closed' ? 'selected' : '') . '>Closed</option>
                        </select>
                        <input type="hidden" name="id" value="' . $res['id'] . '">
                        <input type="submit" name="update" value="Update">
                    </form>
                  </td>';
            echo '</tr>';
        }
        echo '</table>';

        // Close the connection
        mysqli_close($conn);
        ?>
    </center>
</body>
</html>

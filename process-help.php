<?php
// submit_ticket.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tickets";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$issue = $_POST['issue'];
$description = $_POST['description'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO `Tickets Information` (issue, description, status) VALUES (?, ?, 'Open')");
$stmt->bind_param("ss", $issue, $description);

// Execute the statement
if ($stmt->execute()) {
    // Check the number of tickets
    $result = $conn->query("SELECT COUNT(*) as ticket_count FROM `Tickets Information`");
    $row = $result->fetch_assoc();
    $ticket_count = $row['ticket_count'];

    // Provide feedback to the user
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Ticket Submission</title>
        <style>
            body {
                background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('bg.jpg');
                height: 100vh;
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
                color: white;
                font-family: Arial, sans-serif;
            }
            .container {
                background: rgba(0, 0, 0, 0.8);
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                text-align: center;
            }
            a {
                color: #4CAF50;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Ticket Submitted Successfully!</h2>
            <p>Your ticket has been created. Thank you for your submission.</p>";

    // Display the link to view existing tickets if more than one ticket exists
    if ($ticket_count > 1) {
        echo "<p><a href='TICKET HISTORY .php'>View Ticket History</a></p>";
    }

    echo "<p><a href='help.html'>Back to Submit Another Ticket</a></p>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

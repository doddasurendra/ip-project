<?php
// Define the file path where the data will be saved
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "feedback";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $sql = "INSERT INTO responses(Name,Email,Feedback) VALUES ('$name', '$email','$feedback')";
    // Format the data for saving
    $data = "Name: $name\nEmail: $email\nFeedback: $feedback\n\n";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close connection
$conn->close();
?>'';

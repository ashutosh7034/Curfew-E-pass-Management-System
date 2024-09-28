<?php
// Database configuration
$host = 'localhost'; // Change if your DB server is different
$dbname = 'cpms'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $message = $conn->real_escape_string(trim($_POST['message']));

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Message sent successfully
        echo "<div style='text-align: center; margin-top: 50px;'>
                <h2>Message sent successfully!</h2>
                <script>
                    setTimeout(function() {
                        window.location.href = 'http://localhost/cpms/'; // Change to your target page
                    }, 1000); // Redirect after 2 seconds
                </script>
              </div>";
    } else {
        echo "<div style='text-align: center; margin-top: 50px;'>
                <h2>Error: " . $stmt->error . "</h2>
              </div>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<div style='text-align: center; margin-top: 50px;'>
            <h2>Invalid request method.</h2>
          </div>";
}
?>

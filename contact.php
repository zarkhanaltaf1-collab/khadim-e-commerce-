<?php
// --- HANDLE CONTACT FORM SUBMISSION ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // CONNECT TO DATABASE
    $conn = new mysqli("localhost", "root", "", "khadim_project");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // INSERT INTO DATABASE
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $success = "Message successfully sent!";
    } else {
        $error = "Error sending message!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css"> <!-- your CSS -->
</head>
<body>

<h2>Contact Us</h2>

<?php if(!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form action="contact.php" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Message:</label>
    <textarea name="message" required></textarea>

    <button type="submit">Send</button>
</form>

</body>
</html>

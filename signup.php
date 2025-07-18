<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $registration_number = trim($_POST['registration_number']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, registration_number, email, username, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $registration_number, $email, $username, $password);

    if ($stmt->execute()) {
        echo "Signup successful! <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

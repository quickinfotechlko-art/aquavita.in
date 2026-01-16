<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
    $address = htmlspecialchars(trim($_POST['address']));
    $city = htmlspecialchars(trim($_POST['city']));
    $state = htmlspecialchars(trim($_POST['state']));
    $pincode = preg_replace('/[^0-9]/', '', $_POST['pincode']);

    if (!$full_name || !$email || !$phone || !$address || !$city || !$state || !$pincode) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email.");
    }

    $stmt = $conn->prepare("
        INSERT INTO distributors 
        (full_name, email, phone, address, city, state, pincode) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("sssssss",
        $full_name, $email, $phone, $address, $city, $state, $pincode
    );

    if ($stmt->execute()) {

        $headers = "From: no-reply@aquavita.com";

        mail("admin@aquavita.com", "New Distributor Application",
            "New distributor registered:\nName: $full_name\nPhone: $phone", $headers);

        mail($email, "Aquavita Distributorship Application",
            "Dear $full_name,\nThank you for applying with Aquavita.", $headers);

        echo "<h2 style='text-align:center;color:green;'>Application Submitted Successfully</h2>";
    } else {
        echo "Error occurred.";
    }
}
?>
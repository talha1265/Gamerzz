<?php
if (!isset($_GET['payment_id'])) {
  die("Invalid access");
}

include 'db.php';

$payment_id = $_GET['payment_id'];
$name = $_GET['name'];
$email = $_GET['email'];
$slot = $_GET['slot'];

// Save to DB
$stmt = $conn->prepare("INSERT INTO registrations (name, email, slot, payment_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $slot, $payment_id);

if ($stmt->execute()) {
  echo "<h2>✅ Registration Successful!</h2><p>Thank you, $name. Your match slot is at $slot.</p>";
  echo "<p>Watch the tournament live on our <a href='https://youtube.com/@YourChannel/live' target='_blank'>YouTube channel</a>.</p>";
} else {
  echo "❌ Error saving data.";
}

$stmt->close();
$conn->close();
?>

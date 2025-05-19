<?php
include 'db.php';

$date = isset($_GET['date']) ? $_GET['date'] : null;

if ($date) {
  $stmt = $conn->prepare("SELECT slot, COUNT(*) as total FROM registrations WHERE date = ? GROUP BY slot");
  $stmt->bind_param("s", $date);
  $stmt->execute();
  $result = $stmt->get_result();

  $slots = [];

  while ($row = $result->fetch_assoc()) {
    $slots[$row['slot']] = $row['total'];
  }

  echo json_encode($slots);
} else {
  echo json_encode([]);
}
?>

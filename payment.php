<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $slot = $_POST['slot'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment Page</title>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
  <script>
    var options = {
      "key": "YOUR_RAZORPAY_KEY_ID", // Replace with your Razorpay Key ID
      "amount": "20000", // 200 INR in paise
      "currency": "INR",
      "name": "GameZone Tournament",
      "description": "Tournament Entry Fee",
      "handler": function (response){
        window.location.href = "verify.php?payment_id=" + response.razorpay_payment_id +
                               "&name=<?= $name ?>" +
                               "&email=<?= $email ?>" +
                               "&slot=<?= $slot ?>";
      },
      "prefill": {
        "name": "<?= $name ?>",
        "email": "<?= $email ?>"
      },
      "theme": {
        "color": "#3399cc"
      }
    };
    var rzp = new Razorpay(options);
    rzp.open();
  </script>
</body>
</html>

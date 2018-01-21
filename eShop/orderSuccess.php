<?php
if(!isset($_REQUEST['id'])){
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <script src="/jquery.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <div class="jumbotron">
      <h1>Order Status</h1>
      <p>Your order has placed successfully. Order ID is #<?php echo $_GET['id']; ?></p>
      <a href="home.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left">
      </i> Continue Shopping</a>
    </div>

  </div>
</body>
</html>

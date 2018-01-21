<?php
// Set session variables to be used on home.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['phone'] = $_POST['phone'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$phone = $mysqli->escape_string($_POST['phone']);
$address = $mysqli->escape_string($_POST['address']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM customers WHERE email='$email'") or die($mysqli->error);

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");

}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO customers (first_name, last_name, email, phone, address, password, hash, created, modified) "
            . "VALUES ('$first_name','$last_name','$email','$phone','$address','$password', '$hash','".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 1; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $q = $mysqli->query("SELECT * FROM customers WHERE email='$email'");
        $user = $q->fetch_assoc();
        $_SESSION['sessCustomerID'] = $user['id'];

        header("location: profile.php");

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}

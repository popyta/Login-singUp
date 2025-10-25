<?php
session_start();
include("connect.php");

// Redirect to login if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch user data
$query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
$user = mysqli_fetch_assoc($query);
$fullName = htmlspecialchars($user['firstName'] . ' ' . $user['lastName']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #74ebd5, #acb6e5);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        text-align: center;
        padding: 2rem 3rem;
        background: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .container p {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 2rem;
        color: #004d61;
    }

    .container a {
        text-decoration: none;
        color: #00796b;
        font-weight: bold;
        font-size: 1.2rem;
        border: 2px solid #00796b;
        padding: 10px 20px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .container a:hover {
        background: #00796b;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
        <p>Hello <?php echo $fullName; ?> :)</p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>
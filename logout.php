<?php
session_start();

// Check if the logout confirmation is triggered
if (isset($_POST['confirm_logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the sign-in form
    header("Location: index.php");
    exit();
}

// Check if user declined the logout
if (isset($_POST['cancel_logout'])) {
    // Redirect back to the homepage or wherever you want
    header("Location: home.php"); // or wherever the user should be redirected
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: link to your stylesheet -->
</head>
<body>

    <div class="logout-confirmation">
        <h2>Are you sure you want to log out?</h2>
        <form method="POST">
            <button type="submit" name="confirm_logout" class="btn btn-danger">Yes, Log me out</button>
            <button type="submit" name="cancel_logout" class="btn btn-secondary">No, Take me back</button>
        </form>
    </div>

</body>
</html>

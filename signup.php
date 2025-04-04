<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        form {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 1.1rem;
            color: #333;
        }

        input[type="text"], 
        input[type="password"], 
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus, 
        input[type="password"]:focus, 
        input[type="email"]:focus {
            outline: none;
            border-color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="signup-process1.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required><br><br>
        
        <button type="submit" name="signup">Sign Up</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Basic validation: check if passwords match
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
            exit();
        }

        // Here, you can add logic to insert the new user into your database
        // For example, saving user data into a MySQL database (not implemented here)

        // Redirect to login page after successful signup
        header("Location: login.php");
        exit();
    }
    ?>
</body>
</html>

<?php
// Database connection details
$hostname = "sahrjeelmysql.mysql.database.azure.com";
$username = "sharjeel";
$password = "Sa1234567";
$dbname = "netflix";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into users table if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO users (username, password, FName, LName, Email, ContactNumber) VALUES ('$username', '$password', '$fname', '$lname', '$email', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>You have been registered successfully!</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eef2f7;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 30px;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 25px;
        font-size: 32px;
        font-weight: 600;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 50px;
    }

    .form-container div {
        margin-bottom: 20px;
    }

    .form-container label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
        color: #34495e;
    }

    .form-container input {
        width: 100%;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #ced4da;
        font-size: 16px;
        background-color: #f8f9fa;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .form-container input:focus {
        border-color: #3498db;
        outline: none;
    }

    .form-container button {
        background-color: #3498db;
        color: white;
        padding: 14px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .form-container button:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border: 1px solid #dee2e6;
        font-size: 16px;
    }

    th {
        background-color: #3498db;
        color: white;
        font-weight: 600;
    }

    tr:nth-child(even) {
        background-color: #f9fafb;
    }

    tr:hover {
        background-color: #ecf0f1;
    }

    .no-data {
        text-align: center;
        font-style: italic;
        color: #95a5a6;
        font-size: 18px;
    }

    .success-message {
        color: #155724;
        background-color: #d4edda;
        padding: 15px;
        border: 1px solid #c3e6cb;
        border-radius: 10px;
        margin-top: 30px;
        text-align: center;
    }

    .error-message {
        color: #721c24;
        background-color: #f8d7da;
        padding: 15px;
        border: 1px solid #f5c6cb;
        border-radius: 10px;
        margin-top: 30px;
        text-align: center;
    }
</style>

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Sign Up</h2>
            <form method="POST" action="">
                <div>
                    <label>Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <div>
                    <label>First Name:</label>
                    <input type="text" name="fname" required>
                </div>
                <div>
                    <label>Last Name:</label>
                    <input type="text" name="lname" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>Contact Number:</label>
                    <input type="text" name="contact" required>
                </div>
                <div>
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </div>

        <h2>Users List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["FName"] . "</td>";
                        echo "<td>" . $row["LName"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["ContactNumber"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-data'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Close the connection
    $conn->close();
    ?>
</body>
</html>

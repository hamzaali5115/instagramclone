<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #ff6f61, #ff9e2c, #f7d72d);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main {
            background: white;
            border-radius: 8px;
            padding: 40px;
            width: 300px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            text-align: center;
            color: #ff6f61;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 16px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 5px rgba(255, 111, 97, 0.6);
        }

        .wrap {
            text-align: center;
            margin-top: 20px;
        }

        button[type="submit"] {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #ff9e2c;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: #ff6f61;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="main">
    
        <h3>Enter your login credentials</h3>

        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">Login</button>
            </div>
        </form>

        <p>Not registered?
            <a href="signup.php">Create an account</a>
        </p>
    </div>

    <script>
        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username && password) {
                // Normally, you'd validate the credentials with a server
                alert('Login successful!');
                
                // Redirect to home.php after successful login
                window.location.href = "home.php";  // Change this to the actual path of your home page
            } else {
                alert('Please fill in all fields.');
            }
        });
    </script>
</body>

</html>

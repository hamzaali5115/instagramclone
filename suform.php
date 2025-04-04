<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body */
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 16px;
        }

        /* Container for the form */
        .signup-container {
            background-color: #fff;
            padding: 40px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h2 {
            font-size: 24px;
            color: #333;
        }

        /* Input Fields */
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            border-color: #3b5e95;
            outline: none;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #3b5e95;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #2a4877;
        }

        /* Error Message */
        .error-message {
            color: red;
            font-size: 12px;
            text-align: center;
            margin-top: 10px;
        }

        /* Links */
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            font-size: 14px;
            color: #3b5e95;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="form-header">
            <h2>Sign Up</h2>
        </div>

        <!-- Signup Form -->
        <form action="signup.php" method="post">
            <input type="text" name="username" class="input-field" placeholder="Username" required>
            <input type="email" name="email" class="input-field" placeholder="Email" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <input type="password" name="confirm_password" class="input-field" placeholder="Confirm Password" required>

            <button type="submit" class="submit-btn">Sign Up</button>
        </form>

        <!-- Optional Error Message -->
        <div class="error-message">
            <!-- You can display error messages here if necessary -->
        </div>

        <div class="form-footer">
            <a href="login.html">Already have an account? Log in</a>
        </div>
    </div>
</body>
</html>

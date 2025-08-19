<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
    <script>
        function validateLogin(event) {
            event.preventDefault(); // Prevent form submission

            // Hardcoded username and password
            const validUsername = "admin";
            const validPassword = "123";

            // Get user input
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            // Validate input
            if (username === validUsername && password === validPassword) {
                alert("Login successful!");
                window.location.href = "admin.php"; // Redirect to admin panel
            } else {
                document.getElementById("error").textContent = "Invalid username or password!";
            }
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <p id="error" class="error"></p>
        <form onsubmit="validateLogin(event)">
            <input type="text" id="username" placeholder="Username" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

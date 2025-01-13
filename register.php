<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            padding: 20px;
            margin-top:0;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #30cfd0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 90%;
            padding: 10px;
            margin: 4px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #30cfd0;
            border: none;
            border-radius: 4px;
            color: #000000;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        p {
            text-align: center;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <?php echo validation_errors(); ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="profile">profile picture</label>
        <input type="file" name="profile" accept="uploads/">

        <button type="submit">Register</button>
    </form>
    <p><a href="<?= site_url('auth/login') ?>">Already have an account? Login here.</a></p>
    <p><a href="<?= site_url('auth/admin_login') ?>">Admin Login here.</a></p>
</body>
</html>

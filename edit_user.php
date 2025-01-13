<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            text-align: center;
            margin-top: 15px;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .back-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="<?php echo site_url('admin/manage_users/' . $user->id); ?>" method="post" enctype="multipart/form-data">            <label for="title">Title:</label>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= $user->username ?>" required>

            <label for="password">Password (leave blank to keep current):</label>
            <input type="password" name="password">

            <label for="role">Role:</label>
            <select name="role">
                <option value="user" <?= $user->role == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
            <label for="profile">profile picture</label>
            <input type="file" name="profile" accept="uploads/">

            <button type="submit">Update</button>
        </form>
        <div class="back-link">
            <p><a href="<?= site_url('admin/manage_users') ?>">Back to Users</a></p>
        </div>
    </div>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .dashboard-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px;
            background-color: #007bff;
            border-radius: 4px;
        }
        a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
        .logout {
            text-align: center;
            margin-top: 20px;
        }
        .logout a {
            background-color: #dc3545;
            padding: 10px 15px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .logout a:hover {
            background-color: #c82333;
        }
        .admin{
            float:right;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="dashboard-container">
        <ul>
            <li><a href="<?= site_url('admin/manage_users') ?>">Manage Users</a></li>
            <li><a href="<?= site_url('admin/manage_posts') ?>">Manage Posts</a></li>
            <li><a href="<?= site_url('admin/manage_categories') ?>">Manage Categories</a></li>
        </ul>
        <div class="logout">
            <a href="<?= site_url('auth/logout') ?>">Logout</a>
        </div>
    </div>
    <div class="admin">
    <h2>Welcome to Admin Dashboard</h2>
    </div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox for layout */
            height: 600px; /* Full height */
        }
        .dashboard-container {
            width: 250px; /* Fixed width for the dashboard */
            background-color: #D4FFFF;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column; /* Vertical layout */
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
            width: 100%; /* Ensure it spans the full width */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0; /* Margin only on top and bottom */
            background-color: #007bff;
            border-radius: 4px;
        }
        a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
        .logout {
            text-align: center;
            margin-top: auto; /* Push logout button to the bottom */
        }
        .logout a {
            background-color: #dc3545;
            padding: 10px 15px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .logout a:hover {
            background-color: #c82333;
        }
        .welcome-container {
            flex: 1; /* Take the remaining space */
            background-color: rgba(255, 255, 255, 1) 40%;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex; /* Flexbox for center alignment */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            text-align: center; /* Center text */
        }
        .welcome-container h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        <ul>
            <li><a href="<?= site_url('admin/manage_users') ?>">Manage Users</a></li>
            <li><a href="<?= site_url('admin/manage_posts') ?>">Manage Posts</a></li>
            <li><a href="<?= site_url('admin/manage_categories') ?>">Manage Categories</a></li>
        </ul>
        
        <div class="logout">
            <a href="<?= site_url('auth/logout') ?>">Logout</a>
        </div>
    </div>
    <div class="welcome-container">
        <h1>Welcome to Admin Dashboard</h1>
    </div>

</body>
</html>

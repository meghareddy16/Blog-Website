<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a6c1ee;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .create-user {
            margin-bottom: 20px;
            text-align: right;
        }
        .create-user a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .create-user a:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #e6dee9;

        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ffffff;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        /* tr:nth-child(even) {
            background-color: #f9f9f9;
        } */
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Users</h1>
        <div class="create-user">
            <a href="<?= site_url('admin/create_user') ?>">Create User</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile pic</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td>
                        <?php if (!empty($user->profile)): ?>
                            <img src="<?= base_url('uploads/' . $user->profile) ?>" alt="<?= htmlspecialchars($user->$username) ?>" style="max-width: 100px";>
                        <?php endif; ?>

                        </td>
                        <!-- <td>
                            <img src="<?=base_url('uploads/').$user->profile ?>" style="max-width: 100px";>
                        </td> -->
                        <td><?= $user->username ?></td>
                        <td><?= $user->role ?></td>
                        <td><?= $user->comment ?></td>

                        <td>
                            <a href="<?= site_url('admin/edit_user/' . $user->id) ?>"><button style="background-color:#00b35d; color:white; font-size:1.2em">Edit</button></a>&nbsp
                            <a href="<?= site_url('admin/delete_user/' . $user->id) ?>" onclick="return confirm('Are you sure?')"><button style="background-color:#b30300; color:white; font-size:1.2em">Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table><br>
       <button style="background-color:white; font-size:1.2em"> <a href="dashboard">Back to Dashboard</a></button>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);            
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
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .create-category {
            margin-bottom: 20px;
            text-align: right;
        }
        .create-category a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .create-category a:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
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
            color: #00b0b3;
        }
        button{
            font-size:1.2em;
            color:white;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Categories</h1>
        <div class="create-category">
            <a href="<?= site_url('admin/create_category') ?>">Create Category</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category->id ?></td>
                <td><?= $category->name ?></td>
                <td>
                    <a href="<?= site_url('admin/edit_category/'.$category->id) ?>"><button style="color:green">Edit</button></a>&nbsp
                    <a href="<?= site_url('admin/delete_category/'.$category->id) ?>" onclick="return confirm('Are you sure?')">
                        <button style="color:red">Delete</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <button style="background-color:white"> <a href="dashboard">Back to Dashboard</a></button>
    </div>
</body>
</html>

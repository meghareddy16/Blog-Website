<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);           
             margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #c2e9fb;
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
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c2e9fb;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
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
        <h1>Create Post</h1>
        <form action="<?php echo site_url('admin/create_post'); ?>" method="post" enctype="multipart/form-data">           
            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="body">Content:</label>
            <textarea name="body" rows="6" required></textarea>

            <label for="category_id">Category:</label>
            <select name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>
             <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*" required> 

            <button type="submit">Create Post</button>
        </form>

<!-- 

        <form method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" required>

    <label for="body">Content:</label>
    <textarea name="body" rows="6" required></textarea>

    <label for="category_id">Category:</label>
    <select name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
        <?php endforeach; ?>
    </select> 


    <label for="image">Images</label>
    <input type="file" name="image" accept="uploads/" required>


    <button type="submit">Create Post</button>
</form> -->

<!-- 
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?> -->


        <div class="back-link">
            <p><a href="<?= site_url('admin/manage_posts') ?>">Back to Posts</a></p>
        </div>
    </div>
</body>
</html>

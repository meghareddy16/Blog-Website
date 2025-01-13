<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);            
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
            background-color: #ace0f9;
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
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical; /* Allow vertical resizing for the textarea */
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
        <h1>Edit Post</h1>
        <form action="<?php echo site_url('admin/edit_post/' . $post->id); ?>" method="post" enctype="multipart/form-data">            <label for="title">Title:</label>
            <input type="text" name="title" value="<?= $post->title ?>" required>
            
            <label for="body">Content:</label>
            <textarea name="body" required><?= $post->body ?></textarea>
           
            <label for="category_id">Category:</label>
            <select name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>" <?= $category->id == $post->category_id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="image"> image</label>
            <input type="file" name="image" accept="uploads/" >
            <img src="<?php echo base_url('uploads/' . $post->image); ?>" alt="Current Image" style="max-width: 200px; max-height: 200px;"><br>


            <button type="submit">Update Post</button>
        </form>


        <div class="back-link">
            <p><a href="<?= site_url('admin/manage_posts') ?>">Back to Posts</a></p>
        </div>
    </div>


</body>
</html>

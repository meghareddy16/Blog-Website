<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>
    <h1>Create New Category</h1>
    <form method="post">
        <label for="name">Category Name:</label>
        <input type="text" name="name" required>
        <br>
        <button type="submit">Create</button>
    </form>
    <p><a href="<?= site_url('category/index') ?>">Back to Categories</a></p>
</body>
</html>

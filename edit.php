<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form method="post">
        <label for="name">Category Name:</label>
        <input type="text" name="name" value="<?= $category->name ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <p><a href="<?= site_url('category/index') ?>">Back to Categories</a></p>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="<?= site_url('category/create') ?>">Create New Category</a>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <?= $category->name ?> 
                <a href="<?= site_url('category/edit/' . $category->id) ?>">Edit</a> 
                <a href="<?= site_url('category/delete/' . $category->id) ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>


Project Overview :

Build a basic blog module where users can view posts, filter them by category, and perform CRUD operations (Create, Read, Update, Delete) on posts and categories. 
This will help you get familiar with MVC structure, database handling, routing, and basic form handling in CodeIgniter 3

Steps:

1. Database Design:

Create two tables: posts and categories.

posts table should include fields like id, title, body, category_id, created_at, updated_at.

categories table should include fields like id, name, created_at.


The posts table should have a foreign key referencing the categories table.



2. Create Controllers and Models:

PostsController: Handle all CRUD operations for blog posts.

index() method for listing all posts.

create() method for showing a form to create a new post.

store() method for saving the new post.

edit() and update() methods for editing and updating posts.

delete() method for deleting a post.


CategoriesController: Handle CRUD for categories.

Create corresponding models PostModel and CategoryModel for database interaction.



3. Views:

A main index.php view to list all blog posts, with a dropdown or sidebar to filter by category.

create.php and edit.php views for adding and editing blog posts.

Include simple HTML forms for the title, body, and category_id fields.

List posts on the homepage with links to view, edit, or delete them.



4. Basic Routing:

Add routes for all CRUD operations (e.g., /posts, /posts/create, /posts/edit/{id}).

Add routes for filtering posts by category.



5. Validation and Security:

Use CodeIgniter's built-in form validation for handling empty fields.

Implement CSRF protection on the forms to ensure basic security.



6. Testing:

Test the application by adding, editing, and deleting posts and categories.

Ensure that the posts are properly filtered by category on the homepage.




Outcome:

This task will help you all understand the fundamentals of MVC architecture, working with a database, and building simple dynamic web pages. 
It’s a manageable task for a beginner and provides enough room for learning core CodeIgniter concepts.


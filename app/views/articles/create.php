<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
</head>
<body>
<h1>Create Article</h1>
<form action="/articles/create" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="content">Content:</label>
    <textarea id="content" name="content" required></textarea>
    <br>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image">
    <br>
    <button type="submit">Create</button>
</form>
</body>
</html>

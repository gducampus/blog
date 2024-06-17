<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
</head>
<body>
<h1>Edit Article</h1>
<form action="/articles/edit/<?php echo $article['id']; ?>" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
    <br>
    <label for="content">Content:</label>
    <textarea id="content" name="content" required><?php echo htmlspecialchars($article['content']); ?></textarea>
    <br>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image">
    <br>
    <button type="submit">Update</button>
</form>
</body>
</html>

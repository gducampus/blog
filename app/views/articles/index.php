<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
</head>
<body>
<h1>Articles</h1>
<a href="/articles/create">Create Article</a>
<ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <h2><?php echo htmlspecialchars($article['title']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            <?php if ($article['image']): ?>
                <img src="/uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
            <?php endif; ?>
            <a href="/articles/edit/<?php echo $article['id']; ?>">Edit</a>
            <a href="/articles/delete/<?php echo $article['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>

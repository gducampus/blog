<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>
<h1><?php echo htmlspecialchars($article['title']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
<?php if ($article['image']): ?>
    <img src="/uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
<?php endif; ?>
<a href="/">Back to Articles</a>
</body>
</html>

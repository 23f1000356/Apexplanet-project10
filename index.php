<?php
session_start();
include('db_connection.php');

// Fetch posts from the database
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();

// Check if there are no posts available
$noPosts = count($posts) == 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .container {
            width: 100%;
            max-width: 800px;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            color: #0288d1;
            margin-bottom: 20px;
        }

        .post {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #0288d1;
            border-radius: 8px;
            background-color: #fff;
        }

        .post h2 {
            font-size: 24px;
            color: #0288d1;
        }

        .post p {
            font-size: 16px;
            color: #777;
        }

        .button-group {
            margin-top: 20px;
        }

        .button-group a {
            padding: 12px 25px;
            font-size: 18px;
            color: white;
            background-color: #0288d1;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .button-group a:hover {
            background-color: #0277bd;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Blog Posts</h1>

        <!-- Display posts -->
        <?php if ($noPosts): ?>
            <p>No posts available.</p>

            <!-- Create and Delete Post buttons -->
            <div class="button-group">
                <a href="create_post.php">Create Post</a>
                <!-- Delete Post button can be added later if required -->
            </div>

        <?php else: ?>
            <!-- Display all posts -->
            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <p><strong>Posted on:</strong> <?php echo htmlspecialchars($post['created_at']); ?></p>
                    <div class="button-group">
                        <a href="update_post.php?id=<?php echo $post['id']; ?>">Edit</a>
                        <a href="delete_post.php?id=<?php echo $post['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Additional Links -->
        <div class="footer">
            <p><a href="index.php">Back to Home</a></p>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2025 Blogs | All Rights Reserved</p>
    </div>

</body>
</html>

   

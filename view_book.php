<?php
// Simulating a database (replace dgn file sql)
$books = [
    1 => ["title" => "The Lightning Thief", "author" => "Rick Riordan", "publisher" => "Disney-Hyperion", "pages" => 384, "image" => "https://cdn.gramedia.com/uploads/items/9780786838653.jpg"],
    2 => ["title" => "Onyx Storm", "author" => "Rebecca Yarros", "publisher" => "Red Tower Books", "pages" => 544, "image" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1720446357i/209439446._SX150_.jpg"],
    3 => ["title" => "Beautiful Ugly", "author" => "Alice Feeney", "publisher" => "Flatiron Books", "pages" => 320, "image" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1722587059i/211004123.jpg"],
    4 => ["title" => "Great Big Beautiful Life", "author" => "Emily Henry", "publisher" => "Berkley", "pages" => 432, "image" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1729098091i/218559595._SX150_.jpg"],
    5 => ["title" => "Sunrise on the Reaping", "author" => "Suzanne Collins", "publisher" => "Scholastic Press", "pages" => 400, "image" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1729085500i/214331246._SX150_.jpg"]
];


$id = $_GET['id'] ?? null;
$book = $id && isset($books[$id]) ? $books[$id] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Book Details</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100">
<?php if ($book): ?>
    <h1 class="text-center mb-4 display-4"><?= htmlspecialchars($book['title']) ?></h1>

    <div class="border rounded p-4 shadow-lg bg-white" style="max-width: 600px;">
        <div class="d-flex align-items-start">
            <!-- Book Cover -->
            <img src="<?= htmlspecialchars($book['image']) ?>" width="200px" height="300px" class="me-4">

            <!-- Book Details -->
            <div class="text-start">
                <p><strong>Author:</strong> <?= htmlspecialchars($book['author']) ?></p>
                <p><strong>Publisher:</strong> <?= htmlspecialchars($book['publisher']) ?></p>
                <p><strong>Number of Pages:</strong> <?= htmlspecialchars($book['pages']) ?></p>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
<?php else: ?>
    <h1>Book Not Found</h1>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
<?php endif; ?>

</body>
</html>

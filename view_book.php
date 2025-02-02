<?php
    include 'connect.php';
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "<h1>Book Not Found</h1>";
        echo "<a href='dashboard.php' class='btn btn-secondary mt-3'>Back to Dashboard</a>";
        exit();
    }

    $result = $conn->query("SELECT * FROM books WHERE id=$id");
    $book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column justify-content-center align-items-center min-vh-100 bg-light">
    <?php if ($book): ?>
        <h1 class="text-center mb-4 display-4"><?= htmlspecialchars($book['title']) ?></h1>

        <div class="border rounded p-4 shadow-lg bg-white d-flex align-items-start" 
            style="max-width: 750px; width: 90%;">
            
            <!-- Book Cover -->
            <img src="<?= htmlspecialchars($book['imagePath'] ?? 'default.jpg') ?>" 
                class="me-4 rounded shadow-sm" 
                style="width: 200px; height: 300px; object-fit: cover;">

            <!-- Book Details -->
            <div class="text-start flex-grow-1">
                <p><strong>Author:</strong> <?= htmlspecialchars($book['author'] ?? 'Unknown') ?></p>
                <p><strong>Publisher:</strong> <?= htmlspecialchars($book['publisher'] ?? 'Unknown') ?></p>
                <p><strong>Pages:</strong> <?= htmlspecialchars($book['pageNum'] ?? 'N/A') ?></p>
            </div>
        </div>

        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    <?php else: ?>
        <h1 class="text-center">Book Not Found</h1>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    <?php endif; ?>
</body>
</html>

<?php
include 'db_connect.php';

$id = $_GET['id'] ?? null;
$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $pages = $_POST['pages'];
    
    $update_sql = "UPDATE books SET title=?, author=?, publisher=?, pages=? WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssii", $title, $author, $publisher, $pages, $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Book updated successfully!'); window.location.href='dashboard.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">
<?php if ($book): ?>
    <h1>Edit Book</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($book['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($book['author']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Publisher</label>
            <input type="text" name="publisher" class="form-control" value="<?= htmlspecialchars($book['publisher']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Number of Pages</label>
            <input type="number" name="pages" class="form-control" value="<?= htmlspecialchars($book['pages']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
<?php else: ?>
    <h1>Book Not Found</h1>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
<?php endif; ?>

</body>
</html>
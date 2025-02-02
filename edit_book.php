<?php
    include 'connect.php';

    $id = $_GET['id'] ?? null;
    if (!$id) {
        die("Book ID is required.");
    }

    $sql = "SELECT * FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if (!$book) {
        die("Book not found.");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $pageNum = $_POST['pageNum'];
        $imagePath = $book['imagePath'];

        if (isset($_FILES['book_cover']) && $_FILES['book_cover']['error'] === UPLOAD_ERR_OK) {
            $image_name = $_FILES['book_cover']['name'];
            $image_tmp_name = $_FILES['book_cover']['tmp_name'];
            $image_folder = "uploads/";

            if (!is_dir($image_folder)) {
                mkdir($image_folder, 0777, true);
            }

            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_new_name = time() . "_" . uniqid() . "." . $image_extension;
            $newImagePath = $image_folder . $image_new_name;

            if (move_uploaded_file($image_tmp_name, $newImagePath)) {
                $imagePath = $newImagePath;
            } else {
                echo "Failed to upload image.";
                exit();
            }
        }

        $sql = "UPDATE books SET title = ?, author = ?, publisher = ?, pageNum = ?, imagePath = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $title, $author, $publisher, $pageNum, $imagePath, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Book updated successfully!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Book</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $book['title'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?= $book['author'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="<?= $book['publisher'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="pageNum" class="form-label">Number of Pages</label>
                <input type="number" class="form-control" id="pageNum" name="pageNum" value="<?= $book['pageNum'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Cover</label><br>
                <img src="<?= $book['imagePath'] ?>" width="150px" height="200px" 
                    onerror="this.onerror=null;this.src='default-image.png';">
            </div>

            <div class="mb-3">
                <label for="book_cover" class="form-label">Upload New Cover</label>
                <input type="file" class="form-control" id="book_cover" name="book_cover" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Update Book</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

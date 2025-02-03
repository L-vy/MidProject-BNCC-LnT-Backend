<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="icon" type="image/png" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Add New Book</h2>
            <form action="store_book.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Book Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Publisher</label>
                    <input type="text" name="publisher" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Number of Pages</label>
                    <input type="number" name="pageNum" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Book Cover</label>
                    <input type="file" name="book_cover" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Book</button>
            </form>
        </div>
    </div>
</body>
</html>
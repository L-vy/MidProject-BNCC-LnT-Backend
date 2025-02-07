<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: log_in.php");
    exit();
}
?>

<?php
    include 'connect.php';
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="ms-auto">
                <a href="#" class="btn btn-danger" onclick="confirmLogOut()">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h1>Book List</h1>
            <a href="create_book.php" class="btn btn-primary">Add Book</a>
        </div>

        <table class="table table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Number of Pages</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><img src="<?= $row['imagePath'] ?>" width="100"></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['publisher'] ?></td>
                    <td><?= $row['pageNum'] ?></td>
                    <td>
                        <a href="view_book.php?id=<?= $row['id'] ?>" target="_blank"class='btn btn-primary'>View</a>
                        <a href="edit_book.php?id=<?= $row['id'] ?>" target="_blank"class='btn btn-primary'>Edit</a>
                        <a href="delete_book.php?id=<?= $row['id'] ?>" class='btn btn-danger'>Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
        </table>
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; 2025 Reading Corner | Follow me on <a href="https://www.instagram.com/bncc.bandung/" target="_blank" class="text-white">Instagram</a></p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
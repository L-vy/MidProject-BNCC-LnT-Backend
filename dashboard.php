<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: log_in.php");
    exit();
}

include 'connect.php';
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
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
                <a href="#" class="btn btn-danger" onclick="return confirmLogOut()">Logout</a>
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
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><img src="<?= $row['imagePath'] ?>" width="100"></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['publisher'] ?></td>
                    <td><?= $row['pageNum'] ?></td>
                    <td>
                        <a href="view_book.php?id=<?= $row['id'] ?>" class="btn btn-primary">View</a>
                        <a href="edit_book.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; 2025 Reading Corner | Follow me on <a href="https://www.instagram.com/bncc.bandung/" target="_blank" class="text-white">Instagram</a></p>
    </footer>

    <!-- JavaScript -->
    <script>
        function confirmDelete(bookId) {
            let confirmAction = confirm("Are you sure you want to delete this book?");
            if (confirmAction) {
                window.location.href = "delete_book.php?id=" + bookId;
            }
        }

        function confirmLogOut() {
            let confirmAction = confirm("Are you sure you want to log out?");
            if (confirmAction) {
                window.location.href = "log_out.php";
            } else {
                return false;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'store_book.php'; 

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="favicon.png">
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
                <!-- Sample Books -->
                <?php
                $sample_books = [
                    [
                        "id" => 1,
                        "imagePath" => "https://cdn.gramedia.com/uploads/items/9780786838653.jpg",
                        "name" => "The Lightning Thief (Percy Jackson & the Olympians, Book 1)",
                        "author" => "Rick Riordan",
                        "publisher" => "Disney-Hyperion",
                        "number_of_page" => 384
                    ],
                    [
                        "id" => 2,
                        "imagePath" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1720446357i/209439446._SX150_.jpg",
                        "name" => "Onyx Storm (The Empyrean, #3)",
                        "author" => "Rebecca Yarros",
                        "publisher" => "Red Tower Books",
                        "number_of_page" => 544
                    ],
                    [
                        "id" => 3,
                        "imagePath" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1722587059i/211004123.jpg",
                        "name" => "Beautiful Ugly",
                        "author" => "Alice Feeney",
                        "publisher" => "Flatiron Books",
                        "number_of_page" => 320
                    ],
                    [
                        "id" => 4,
                        "imagePath" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1729098091i/218559595._SX150_.jpg",
                        "name" => "Great Big Beautiful Life",
                        "author" => "Emily Henry",
                        "publisher" => "Berkley",
                        "number_of_page" => 432
                    ],
                    [
                        "id" => 5,
                        "imagePath" => "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1729085500i/214331246._SX150_.jpg",
                        "name" => "Sunrise on the Reaping (The Hunger Games, #0.5)",
                        "author" => "Suzanne Collins",
                        "publisher" => "Scholastic Press",
                        "number_of_page" => 400
                    ]
                ];

                foreach ($sample_books as $book) {
                    echo "<tr>
                        <th scope='row'>{$book['id']}</th>
                        <td><img src='{$book['imagePath']}' width='135px' height='200px'></td>
                        <td>{$book['name']}</td>
                        <td>{$book['author']}</td>
                        <td>{$book['publisher']}</td>
                        <td>{$book['number_of_page']}</td>
                        <td>
                            <a href='view_book.php?id={$book['id']}' class='btn btn-primary'>View</a>
                            <a href='edit_book.php?id={$book['id']}' class='btn btn-primary'>Edit</a>
                            <button onclick='confirmDelete({$book['id']})' class='btn btn-danger'>Delete</button>
                        </td>
                    </tr>";
                }
                ?>

                <!-- User-Submitted Books -->
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <th scope='row'>{$row['id']}</th>
                            <td><img src='{$row['imagePath']}' width='135px' height='200px'></td>
                            <td>{$row['name']}</td>
                            <td>{$row['author']}</td>
                            <td>{$row['publisher']}</td>
                            <td>{$row['number_of_page']}</td>
                            <td>
                                <a href='view_book.php?id={$row['id']}' class='btn btn-primary'>View</a>
                                <a href='edit_book.php?id={$row['id']}' class='btn btn-primary'>Edit</a>
                                <button onclick='confirmDelete({$row['id']})' class='btn btn-danger'>Delete</button>
                            </td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; 2025 Reading Corner | Follow me on <a href="#" class="text-white">Instagram</a></p>
    </footer>

    <script>
        function confirmDelete(bookId) {
            let confirmAction = confirm("Are you sure you want to delete this book?");
            if (confirmAction) {
                window.location.href = "delete_book.php?id=" + bookId;
            }
        }

        function confirmLogOut() {
            let confirmAction = confirm("Are you sure you want to Log Out?");
            if (confirmAction) {
                window.location.href = "#"; // Change this to login page
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>

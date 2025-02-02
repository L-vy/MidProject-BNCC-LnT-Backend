<?php
include 'store_book.php'; 
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
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
          <!-- BACK TO LOG IN PAGE -->
          <a href="#" class="btn btn-danger" onclick = "confirmLogOut()">Logout</a>
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
                <th scope="col">Number of Page</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="row">1</th>
                <td>
                    <img src="https://cdn.gramedia.com/uploads/items/9780786838653.jpg" width="135px" height="200px">
                </td>
                <td>The Lightning Thief (Percy Jackson & the Olympians, Book 1)</td>
                <td>Rick Riordan</td>
                <td>Disney-Hyperion</td>
                <td>384</td>
                <td>
                    <a href="view_book.php?id=1" class="btn btn-primary">View</a>
                    <a href="edit_book.php?id=1" class="btn btn-primary">Edit</a>
                    <button onclick="confirmDelete(1)" class="btn btn-danger">Delete</button>
                </td>
            </tr>

            <tr>
                <th scope="row">2</th>
                <td>
                    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1720446357i/209439446._SX150_.jpg" width="135px" height="200px">
                </td>
                <td>Onyx Storm (The Empyrean, #3)</td>
                <td>Rebecca Yarros</td>
                <td>Red Tower Books</td>
                <td>544</td>
                <td>
                    <a href="view_book.php?id=2" class="btn btn-primary">View</a>
                    <a href="edit_book.php?id=2" class="btn btn-primary">Edit</a>
                    <button onclick="confirmDelete(2)" class="btn btn-danger">Delete</button>
                </td>
            </tr>

            <tr>
                <th scope="row">3</th>
                <td>
                    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1722587059i/211004123.jpg" width="135px" height="200px">
                </td>
                <td>Beautiful Ugly</td>
                <td>Alice Feeney</td>
                <td>Flatiron Books</td>
                <td>320</td>
                <td>
                    <a href="view_book.php?id=3" class="btn btn-primary">View</a>
                    <a href="edit_book.php?id=3" class="btn btn-primary">Edit</a>
                    <button onclick="confirmDelete(3)" class="btn btn-danger">Delete</button>
                </td>
            </tr>

            <tr>
                <th scope="row">4</th>
                <td>
                    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1729098091i/218559595._SX150_.jpg" width="135px" height="200px">
                </td>
                <td>Great Big Beautiful Life</td>
                <td>Emily Henry</td>
                <td>Berkley</td>
                <td>432</td>
                <td>
                    <a href="view_book.php?id=4" class="btn btn-primary">View</a>
                    <a href="edit_book.php?id=4" class="btn btn-primary">Edit</a>
                    <button onclick="confirmDelete(4)" class="btn btn-danger">Delete</button>
                </td>
            </tr>

            <tr>
                <th scope="row">5</th>
                <td>
                    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1729085500i/214331246._SX150_.jpg" width="135px" height="200px">
                </td>
                <td>Sunrise on the Reaping (The Hunger Games, #0.5)</td>
                <td>Suzanne Collins</td>
                <td>Scholastic Press</td>
                <td>400</td>
                <td>
                    <a href="view_book.php?id=5" class="btn btn-primary">View</a>
                    <a href="edit_book.php?id=5" class="btn btn-primary">Edit</a>
                    <button onclick="confirmDelete(5)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
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
                window.location.href = "#"; // ubah ke log in page (.php)
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php $conn->close(); ?> 
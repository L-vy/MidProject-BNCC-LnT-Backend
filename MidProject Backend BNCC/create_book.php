<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Add a New Book</h2><br>
        <form action="store_book.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Book Title</label>
                <input type="text" class="form-control" name="name" required>
                <br>

                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" placeholder = "Type 'Anonymous' if needed" name="author" required>
                <br>

                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" name="publisher" required>
                <br>

                <label for="number_of_page" class="form-label">Number of Pages</label>
                <input type="number" class="form-control" name="number_of_page" required>
                <br>

                <label for="book_cover" class="form-label">Upload Book Cover</label>
                <input type="file" class="form-control" name="book_cover">
                <br>
                <br>
            </div>
            <button type="button" class="btn btn-primary" onclick="window.location.href='dashboard.php';">Add Book</button>
        </form>
    </div>

	<script>
        function validateForm() {
            var name = document.forms["bookForm"]["name"].value;
            var author = document.forms["bookForm"]["author"].value;
            var publisher = document.forms["bookForm"]["publisher"].value;
            var numberOfPage = document.forms["bookForm"]["number_of_page"].value;

            if (name == "" || author == "" || publisher == "" || numberOfPage == "") {
                alert("All fields must be filled out!");
                return false;
            }
        }
    </script>
</body>
</html>
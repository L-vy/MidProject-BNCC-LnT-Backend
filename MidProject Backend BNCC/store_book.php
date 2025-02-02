<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "library";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $number_of_page = $_POST['number_of_page'];

    $imagePath = "";

    if (isset($_FILES['book_cover']) && $_FILES['book_cover']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['book_cover']['name'];
        $image_tmp_name = $_FILES['book_cover']['tmp_name'];
        $image_folder = "uploads/";

        if (!is_dir($image_folder)) {
            mkdir($image_folder, 0777, true);
        }

        $imagePath = $image_folder . time() . "_" . basename($image_name);

        if (move_uploaded_file($image_tmp_name, $imagePath)) {
        } else {
            echo "Failed to upload image.";
            exit();
        }
    }

    $sql = "INSERT INTO books (imagePath, name, author, publisher, number_of_page) 
            VALUES ('$imagePath', '$name', '$author', '$publisher', '$number_of_page')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully!";
        echo "<br><a href='create_book.php'>Add Another</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
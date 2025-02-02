<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "book_store"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $number_of_page = $_POST['number_of_page'];

    $sql = "INSERT INTO books (name, author, publisher, number_of_page) 
            VALUES ('$name', '$author', '$publisher', '$number_of_page')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully!";
        echo "<br><a href='create_book.php'>Add Another</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

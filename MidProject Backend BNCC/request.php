<?php
include("connection.php");

if(isset($_POST['create_book'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $pages = $_POST['pages'];

    $imagePath = "";

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
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

    $query = "INSERT INTO books(imagePath, title, author, publisher, pageNum) VALUES('$imagePath', '$title', '$author', '$publisher', '$pages')";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

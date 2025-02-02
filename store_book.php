<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $pageNum = $_POST['pageNum'];

        $imagePath = "";

        if (isset($_FILES['book_cover']) && $_FILES['book_cover']['error'] === UPLOAD_ERR_OK) {
            $image_name = $_FILES['book_cover']['name'];
            $image_tmp_name = $_FILES['book_cover']['tmp_name'];
            $image_folder = "uploads/";

            if (!is_dir($image_folder)) {
                mkdir($image_folder, 0777, true);
            }

            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_new_name = time() . "_" . uniqid() . "." . $image_extension;

            $imagePath = $image_folder . $image_new_name;

            if (!move_uploaded_file($image_tmp_name, $imagePath)) {
                echo "Failed to upload image.";
                exit();
            }
        }

        $sql = "INSERT INTO books (imagePath, title, author, publisher, pageNum) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $imagePath, $title, $author, $publisher, $pageNum);

        if ($stmt->execute()) {
            echo "<script>alert('New book added successfully!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
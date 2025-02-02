<?php
    include 'connect.php';
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $pageNum = $_POST['pageNum'];
    $imagePath = $_POST['oldImage'];

    if ($_FILES['image']['name']) {
        $imagePath = "uploads/" . time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    $sql = "UPDATE books SET imagePath='$imagePath', title='$title', author='$author', publisher='$publisher', pageNum='$pageNum' WHERE id=$id";
    $conn->query($sql);
    header("Location: dashboard.php");
?>
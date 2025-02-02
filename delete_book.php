<?php
    include 'connect.php';

    $id = $_GET['id'] ?? null;

    if ($id) {
        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $reindexQuery = "
                SET @num := 0;
                UPDATE books SET id = @num := @num + 1;
                ALTER TABLE books AUTO_INCREMENT = 1;
            ";

            if ($conn->multi_query($reindexQuery)) {
                echo "<script>alert('Book deleted and IDs reindexed successfully!'); window.location.href='dashboard.php';</script>";
            } else {
                echo "<script>alert('Book deleted but reindexing failed!'); window.location.href='dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Error deleting book!'); window.location.href='dashboard.php';</script>";
        }

        $stmt->close();
    }

    $conn->close();
?>

<?php
include 'store_book.php';

$sample_books = [
    1 => ["title" => "The Lightning Thief"],
    2 => ["title" => "Onyx Storm"],
    3 => ["title" => "Beautiful Ugly"],
    4 => ["title" => "Great Big Beautiful Life"],
    5 => ["title" => "Sunrise on the Reaping"]
];

$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "DELETE FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Book deleted successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        if (isset($sample_books[$id])) {
            unset($sample_books[$id]);
            echo "<script>alert('Sample book deleted successfully!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: Book not found!'); window.location.href='dashboard.php';</script>";
        }
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Error: No book ID provided!'); window.location.href='dashboard.php';</script>";
}

$conn->close();
?>

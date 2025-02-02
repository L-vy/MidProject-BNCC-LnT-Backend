<?php
// Simulating a database (replace dgn file sql)
$books = [
    1 => ["title" => "The Lightning Thief"],
    2 => ["title" => "Onyx Storm"],
    3 => ["title" => "Beautiful Ugly"],
    4 => ["title" => "Great Big Beautiful Life"],
    5 => ["title" => "Sunrise on the Reaping"]
];

$id = $_GET['id'] ?? null;

if ($id && isset($books[$id])) {
    unset($books[$id]);

    echo "<script>
        alert('Book deleted successfully!');
        window.location.href = 'dashboard.php';
    </script>";
} else {
    echo "<script>
        alert('Error: Book not found!');
        window.location.href = 'dashboard.php';
    </script>";
}
?>

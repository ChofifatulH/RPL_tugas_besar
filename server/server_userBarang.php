<?php

session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_nama']) && isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {
    $nama = $_SESSION['user_nama'];
    $email = $_SESSION['user_email'];
    $produk = json_encode(json_decode($_POST['produk'])); // Decoding and encoding to ensure correct format
    $total = $_POST['total'];

    $insertSql = "INSERT INTO pesanan(nama, email, produk, total) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($insertSql);
    $stmt->bind_param("sssd", $nama, $email, $produk, $total);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: /RPL/listProduct.php");
        exit;
    } else {
        die("Error executing query: " . $stmt->error);
    }
} else {
    die("Session data not set or invalid request method.");
}

?>

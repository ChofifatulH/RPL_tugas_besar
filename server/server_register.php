<?php

session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    
    if (!isset($_POST['nama']) || empty($_POST['nama'])) {
        $errors[] = 'Nama is required.';
    }
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $errors[] = 'Email is required.';
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $errors[] = 'Password is required.';
    }
    if (!isset($_POST['password_confirmation']) || empty($_POST['password_confirmation'])) {
        $errors[] = 'Password confirmation is required.';
    }
    if ($_POST['password'] !== $_POST['password_confirmation']) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $checkSql = "SELECT email FROM users WHERE email = ?";
        $checkStmt = $db->prepare($checkSql);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $_SESSION['error'] = "Email has registered. Please use another email!.";
            $checkStmt->close();
            header("Location: /RPL/register.php");
            exit;
        } else {
            $checkStmt->close();

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $insertSql = "INSERT INTO users(nama, email, password) VALUES (?, ?, ?)";
            $stmt = $db->prepare($insertSql);
            $stmt->bind_param("sss", $nama, $email, $hashed_password);

            if ($stmt->execute()) {
                $stmt->close();
                header("Location: /RPL/login.php");
                exit;
            } else {
                die("Error executing query: " . $stmt->error);
            }
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: /RPL/register.php");
        exit;
    }
}
    

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
//     $nama = $_POST['nama'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $produk = json_encode(json_decode($_POST['produk'])); // Decoding and encoding to ensure correct format
//     $total = $_POST['total'];

//     $insertSql = "INSERT INTO penyewa(nama, email, phone, produk, total) VALUES (?, ?, ?, ?, ?)";
//     $stmt = $db->prepare($insertSql);
//     $stmt->bind_param("sssss", $nama, $email, $phone, $produk, $total);

//     if ($stmt->execute()) {
//         $stmt->close();
//         header("Location: /views/konfirmasi.php");
//         exit;
//     } else {
//         die("Error executing query: " . $stmt->error);
//     }
// }

?>

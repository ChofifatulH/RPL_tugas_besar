<?php
session_start();

include 'db_connection.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $errors[] = 'Email is required.';
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $errors[] = 'Password is required.';
    }

    if (empty($errors)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($query); 
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) { 
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_nama'] = $row['nama'];
                $_SESSION['user_email'] = $row['email'];

                header("Location: /RPL/index.php");
                exit;
            } else {
                $_SESSION['error'] = "Passwords do not match.";
                header("Location: /RPL/login.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Account is not found.";
            header("Location: /RPL/login.php");
            exit;
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: /RPL/login.php");
        exit;
    }

}
?>

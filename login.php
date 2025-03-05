<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // JSONレスポンス用

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 入力値を取得
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Username and password are required."]);
        exit;
    }

    // データベース接続
    $connection = new mysqli("localhost", "root", "root", "user");

    if ($connection -> connect_error) {
        echo json_encode(["status" => "error", "message" => "Database connection failed."]);
        exit;
    }

    // SQL実行（準備されたステートメント）
    $stmt = $connection -> prepare("SELECT password FROM users WHERE username = ?");
    $stmt -> bind_param("s", $username);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
        
        if (password_verify($password, $row["password"])) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Incorrect password."]);
        }
        
    } else {
        echo json_encode(["status" => "error", "message" => "User not found."]);
    }

    // 接続を閉じる
    $stmt->close();
    $connection->close();
}
?>

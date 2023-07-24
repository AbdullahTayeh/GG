<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$executionStartTime = microtime(true);

header('Content-Type: application/json; charset=UTF-8');

$connect = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "group_project";

if (!$connect) {
    $output['status']['code'] = "500";
    $output['status']['name'] = "error";
    $output['status']['description'] = "Connection to database failed";
    $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
    $output['data'] = [];

    echo json_encode($output);
    exit;
}

try {
    $signupUsername = $_POST['signupUsername'];
    $signupEmail = $_POST['signupEmail'];
    $signupPw = password_hash($_POST['signupPw'], PASSWORD_DEFAULT); // Hash the password

    $query = "INSERT INTO vuser (name, email, passw) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $signupUsername, $signupEmail, $signupPw);
    mysqli_stmt_execute($stmt);

    $output['status']['code'] = "200";
    $output['status']['name'] = "ok";
    $output['status']['description'] = "success";
    $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
    $output['data'] = [];

    echo json_encode($output);

    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} catch (Exception $e) {
    $output['status']['code'] = "400";
    $output['status']['name'] = "executed";
    $output['status']['description'] = "query failed: " . $e->getMessage(); // Add the error message to the response
    $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
    $output['data'] = [];

    echo json_encode($output);
    exit;
}
?>
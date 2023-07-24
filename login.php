<?php
session_start();

$connect = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "group_project";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$uname = validate($_REQUEST['uname']);
$pass = validate($_REQUEST['password']);

if (empty($uname)) {
    header("Location: login-register-buttons.php?error=User Name is required");
    exit();
} else if (empty($pass)) {
    header("Location: login-register-buttons.php?error=Password is required");
    exit();
} else {
    $sql = "SELECT * FROM vuser WHERE name ='$uname'";

    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row['passw'];

        // Verify the input password against the stored hashed password
        if (password_verify($pass, $storedHashedPassword)) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: login-register-buttons.php?error=Incorrect User name or password");
            exit();
        }
    } else {
        header("Location: login-register-buttons.php?error=Incorrect User name or password");
        exit();
    }
}
?>

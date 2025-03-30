<?php
$conn = new PDO('mysql:host=localhost;dbname=bmis', 'root', '');


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    $stmt_admin = $connection->prepare("SELECT * FROM tbl_admin WHERE email = ? AND password = ?");
    $stmt_admin->execute([$email, $hashed_password]);
    $admin = $stmt_admin->fetch();

    if ($admin) {
        // Redirect the admin to the admin dashboard
        // $this->set_userdata($admin);
        // header('Location: admin_dashboard.php');
        // exit;
        echo 'Success';
    }
}

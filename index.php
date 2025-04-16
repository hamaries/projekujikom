<?php
include "boot.php";
session_start();

if (isset($_SESSION['username'])) {
    header("Location: tampil.php");
    exit();
}

if (isset($_POST['login'])) {
    include "koneksi.php";

    $username = $konek->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM aman WHERE username = '$username' AND password = '$password'";
    $result = $konek->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $user['level'];
        session_regenerate_id(true);

        if ($user['level'] == 'admin') {
            header("Location: tampil.php");
            exit();
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show col-6' style='margin-left:350px;' role='alert'>
                <strong><i class='bi bi-exclamation-triangle-fill'></i></strong> GAGAL LOGIN Username dan Password tidak sesuai.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body style="background-image: url(image/bg-login.jpg); background-position: no-repeat; background-size: cover;">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="shadow-lg col-3 p-3 bg-body-tertiary rounded">
            <div class="p-3 bg-light" style="max-width: 25rem;"></div>
            <h1 class="text-center"><b>LOGIN</b></h1>
            <div class="container mt-4"></div>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                </div>
                <div class="mb-3 ">
                    <label for="password" class="form-label">Password</label>
                    <div class="d-flex">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                            <i class="bi bi-eye-slash" id="eyeIcon"></i>
                        </button>
                        </div>
                </div>
                <div class="text-center">
                <input type="submit" name="login" class="btn btn-primary mt-2" value="Login">
                </div>
            </form>
        </div>
    </div>
    <script>
    // Toggle password visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");


    togglePassword.addEventListener("click", function () {
        // Toggle password visibility
        const type = passwordField.type === "password" ? "text" : "password";
        passwordField.type = type;


        // Toggle eye icon
        eyeIcon.classList.toggle("bi-eye");
        eyeIcon.classList.toggle("bi-eye-slash");
    });
</script>

</body>
</html>
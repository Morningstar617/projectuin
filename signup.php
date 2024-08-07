<?php
require 'conection.php';

if (isset($_POST['register'])) {
    $username = $_POST['nama'];
    $nim = $_POST['nim'];
    $password = $_POST['pass'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    
    $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = ? or email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $nim, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('NIM atau email sudah terdaftar!');</script>";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO mahasiswa (id_mahasiswa, nama_mahasiswa, id_prodi, password, email) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $nim, $username, $prodi, $password_hash, $email);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: home.php');
            exit;
        } else {
            $error = mysqli_error($conn);
            echo "<script>alert('Registrasi gagal: $error'); </script>";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <link rel="stylesheet" href="css/signup.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="banner">
        <div class="box1">
            <h1>Sign up</h1>
            <form action="" method="POST">
                <div class="form1">
                    <input type="text" name="nama" id="nama" required placeholder="Nama Lengkap" />
                    <i class='bx bxs-user'></i>
                </div>
                <div class="form2">
                    <input type="text" name="nim" id="nim"  required placeholder="NIM" oninput="filterInput(this)"  />
                    <i class="bx bxs-key"></i>
                </div>
                <div class="form3">
                    <input type="password" name="pass" id="pass" required placeholder="Password" />
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="form4">
                    <input type="text" name="prodi" id="prodi" required placeholder="Prodi" />
                    <i class='bx bxs-graduation'></i>
                </div>
                <div class="form5">
                    <input type="email" name="email" id="email" required placeholder="Email" />
                    <i class='bx bxs-envelope'></i> 
                </div>

                <div class="box1-link">
                    <p>Already have account? <a href="index.php">Sign in</a></p>
                </div>
                <div class="box1-btn-signup">
                    <button type="submit" id="btn-login-signup" name="register">
                        <p>Register</p>
                    </button>
                </div>
            </form>
        </div>
        <div class="box2">
            <img src="img/logo uin.png" />
            <p>pinjamin.</p>
        </div>
    </div>


    <script>
        function filterInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>
</body>

</html>
<?php
require "conection.php";

if (isset($_POST['login'])) {
  $nim = $_POST['nim'];
  $password = $_POST['pass'];

  $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $nim);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $hashed_password = $user_data['password'];

    if (password_verify($password, $hashed_password)) {
      header('Location: home.php');
      exit;
    } else {
      $err = "<script>alert('PASSWORD SALAH'); </script>";
    }
  } else {
    $err = "<script>alert('AKUN TIDAK DITEMUKAN'); </script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in</title>
  <link rel="stylesheet" href="css/index.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="banner">
    <div class="box1">
      <h1>Sign in</h1>
      <form action="" method="POST">
        <div class="form1">
          <input type="text" name="nim" id="nim" required placeholder="NIM" />
          <i class="bx bxs-key"></i>
        </div>
        <div class="form2">
          <input type="password" name="pass" id="pass" required placeholder="Password" />
          <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="box1-link">
          <p><a href="email.php">Forgot password?</a></p>
          <p>Don't have account? <a href="signup.php">Sign up</a></p>
        </div>
        <div class="box1-btn">
          <button type="submit" id="btn-login" name="login"><a>Login</a></button>
        </div>
      </form>
    </div>
    <div class="box2">
      <img src="img/logo uin.png" />
      <p>pinjamin.</p>
    </div>
  </div>

  <?php if (isset($err)) { ?>
    <p style="color: blue;"><?php echo $err; ?></p>
  <?php } ?>

</body>

</html>
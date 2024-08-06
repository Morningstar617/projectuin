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
                    <input type="text" name="nim" id="nim" required placeholder="NIM" />
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
            <p>pinjamaja.</p>
        </div>
    </div>
</body>

</html>
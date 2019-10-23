<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../_assets/css/bulma.min.css">
    <script type=text/javascript src="../_assets/script/fontawesome-all.js"></script>
    <title>Document</title>
</head>

<style>
    .go_out {
        animation: go_out;
        animation-duration: 0.5s;
        opacity: 0;
    }

    @keyframes go_out {
        0% {
            transform: scale(1, 1);
            opacity: 1;
        }

        100% {
            transform: scale(0.7, 0.7);
            opacity: 0;
        }
    }

    .go_in {
        animation: go_in;
        animation-duration: 0.5s;
        opacity: 1;
    }

    @keyframes go_in {
        0% {
            transform: scale(0.7, 0.7);
            opacity: 0;
        }

        100% {
            transform: scale(1, 1);
            opacity: 1;
        }
    }
</style>

<?php
$login_style = "";
$register_style = "position: absolute; width: 100%; display: none";
if(isset($_GET["page"])){                   //   - jika "register", maka tampilan akan form daftar
    if($_GET["page"] == "login"){           //   - jika "login", maka tampilan akan form login
        $login_style = "";
        $register_style = "position: absolute; width: 100%; display: none";
    } else if($_GET["page"] == "register") {
        $login_style = "position: absolute; width: 100%; display: none";
        $register_style = "";
    } else {
        $login_style = "";
        $register_style = "position: absolute; width: 100%; display: none";
    }
}

$login_status = NULL;                           // value hanya mungkin 0/false
if(isset($_GET["login_status"])){               //  - jika value 0 maka login gagal
    if($_GET["login_status"] == "0"){           //  - jika value 1 maka registrasi berhasil
        $login_status = "<h2 class='subtitle has-text-danger'>Login Gagal !</h2>";
    } else if ($_GET["login_status"] == "1") {
        $login_status = "<h2 class='subtitle has-text-success'>Registrasi Berhasil ! Silahkan Login !</h2>";
    } else if ($_GET["login_status"] == "2") {
        $login_status = "<h2 class='subtitle has-text-success'>Registrasi Gagal !</h2>";
    }
}

$reg_nim = NULL;
$reg_password = NULL;
if(isset($_GET["reg_nim"])){
    $reg_nim = "<p class=\"help is-danger\">NISN SUDAH TERDAFTAR !</p>";
}
if(isset($_GET["reg_password"])){
    $reg_password = "<p class=\"help is-danger\">PASSWORD TIDAK SAMA !</p>";
}

session_start();
if(isset($_SESSION["nim"])){
    header("Location: dashboard/");
}
?>
<body>
    <div class="container">
        <div class="columns" style="margin-top: 1rem">
            <div class="column"></div>
            <div class="column">
                <figure class="image" style="margin-left: auto; margin-right: auto; margin-bottom: 8vh">
                    <img style="margin-left: auto; margin-right: auto; width: 25vh; height: auto; filter: drop-shadow(0 5px 15px #aaa)"
                        src="../_assets/image/logo_smk.png">
                </figure>
                <div class="box has-background-grey-lighter"
                    style="padding-bottom: 0.1rem; filter: drop-shadow(0 5px 15px #aaa);">
                    <h2 class="is-paddingless is-marginless subtitle has-text-centered"><strong id="form_title">Login</strong></h2>
                    <p class="is-paddingless is-marginless subtitle has-text-centered">
                        <?php echo $login_status; ?>
                    </p>
                    <hr>
                    <div class="container">
                        <form autocomplete="off" style="<?php echo $login_style; ?>" action="./login/" method="POST" id="login">
                            <input autocomplete="false" name="hidden" type="search" style="display:none;">
                            <div class="field">
                                <label class="label">NIM</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="text" placeholder="NIM" name="nim_login" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Kata Sandi</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="password" placeholder="Password" name="password_login" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <div class="buttons is-right">
                                        <button type="button" class="button is-medium is-warning" onclick="buka_register()">Registrasi</button>
                                        <input type="submit" class="button is-medium is-info" value="Masuk">
                                    </div>
                                </p>
                            </div>
                        </form>
                        <form autocomplete="off" style="<?php echo $register_style; ?>" action="./register/" method="POST" id="register">
                            <input autocomplete="false" name="hidden" type="search" style="display:none;">
                            <div class="field">
                                <label class="label">NIM</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="text" placeholder="NIM" name="nim_register" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </p>
                                <?php echo $reg_nim; ?>
                            </div>
                            <div class="field">
                                <label class="label">Nama Lengkap</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="text" placeholder="Nama Lengkap" name="nama_register" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Daerah Asal</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="text" placeholder="Daerah Asal" name="daerah_register" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Kata Sandi</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="password" placeholder="Password" name="password_register"required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                                <?php echo $reg_password; ?>
                            </div>
                            <div class="field">
                                <label class="label">Ulangi Kata Sandi</label>
                                <p class="control has-icons-left">
                                    <input class="input" type="password" placeholder="Ulangi Password" name="confirm_register" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                                <?php echo $reg_password; ?>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control">
                                    <div class="buttons is-right">
                                        <button type="button" class="button is-medium is-warning" onclick="buka_login()">Masuk</button>
                                        <input type="submit" class="button is-medium is-info" value="Registrasi">
                                    </div>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
    <footer>
        <small style="color: #aaa; position: fixed; bottom: 0; left: 0;">Copyright © Bima Titani, <i>Et Al</i> -
            2019</small>
    </footer>
    <script>
        function buka_login(){
            var login = document.getElementById("login");
            var register = document.getElementById("register");
            var form_title = document.getElementById("form_title");

            login.className = "go_in";
            register.className = "go_out";
            form_title.innerHTML="Login";

            setTimeout(function(){
                login.style.display = "";
                login.style.position = "";
                login.style.width = "";
                register.style.position = "absolute";
                register.style.width = "100%";
                register.style.display = "none";
            }, 250);

            console.log(login.style);
        }

        function buka_register(){
            var login = document.getElementById("login");
            var register = document.getElementById("register");

            login.className = "go_out";
            register.className = "go_in";
            form_title.innerHTML="Daftar";
            
            setTimeout(function(){
                login.style.display = "none";
                login.style.position = "absolute";
                login.style.width = "100%";
                register.style.position = "";
                register.style.width = "";
                register.style.display = "";
            }, 250);
            
        }
    </script>
</body>

</html>
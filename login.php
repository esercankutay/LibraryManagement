<?php
session_start();

require 'php/database.php';
if (isset($_SESSION['kul_adi'])){
    header("Location:./index.php");
}

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giriş yap</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="light-blue accent-4">
<div class="row" >
    <div class="col s4 m4 l4"></div>
    <div class="col s4 m4 l4 card-panel " style="margin-top: 300px">
        <form action="login.php" method="post" style="margin: 30px">
            <input type="text" placeholder="Kullanıcı adı" name="loginname">
            <input type="password" placeholder="Parola" name="loginpass">
            <div id="button" style="margin-top: 20px">
                <input type="button" class="btn btn-flat modal-trigger red white-text right" value="Kaydol" data-target="kaydol-modal">
                <input type="submit" class="btn btn-flat light-blue accent-4 white-text" value="Giriş" name="login-submit">
            </div>
        </form>
    </div>

</div>



<!-- Modal Kullanıcı Ekle -->
<div id="kaydol-modal" class="modal">
    <div class="modal-content">
        <h3>Kaydol</h3>
        <form action="login.php" method="post">
            <div class="row">
                <div class="col s6 m6 l6">
                    <input type="text" placeholder="Kullanıcı adı" name="ekle-kul-adi">
                    <input type="text" placeholder="TC" name="ekle-tc">
                    <input type="text" placeholder="Ad" name="ekle-ad">
                </div>
                <div class="col s6 m6 l6">
                    <input type="password" placeholder="Parola" name="ekle-pass">
                    <input type="text" placeholder="Soyad" name="ekle-soyad">
                    <input type="text" placeholder="Telefon" name="ekle-tel">
                </div>
                <div class="input-field col">
                    <select name="kul_kat">
                        <?php foreach ($kat as $item): ?>
                        <option value="<?= $item->kat_ad ?>"><?= $item->kat_ad ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <input type="submit" class="hide" id="kullanici-ekle-submit" name="kullanici-ekle-submit">
            <input type="reset" class="hide" id="register-reset">
        </form>
    </div>
    <div class="modal-footer">
        <label for="register-submit" class="btn light-blue accent-4 left" >Kaydol</label>
        <label for="register-reset" class="btn red accent-4">Temizle</label>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
    });
</script>
</body>
</html>
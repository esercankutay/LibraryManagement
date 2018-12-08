<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Library Management</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom StyleSheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<!-- Logo,Slogan and Input -->
<section id="topbar" class="light-blue accent-4">
    <div class="container center-align" id="topbarcontent">
        <img id="mainlogo" src="asset/book.svg" alt="Library Logo">
        <h3 class="white-text">Kütüphanenizi kolayca yönetin!</h3>
        <!-- Search Form -->
        <div class="row">
            <form class="col m12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="keyword" type="search" class="white black-text" placeholder="Ne aramak istersin?">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<!-- Modal Odunc Ver -->
<div id="modal-odunc" class="modal">
    <div class="modal-content">
        <h3>Odünç ver</h3>
        <form action="index.php">
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Kullanıcı adı">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Kitap Numarası">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="text" placeholder="Tarih" class="datepicker">
                </div>
            </div>
            <div style="height: 120px">

            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat left">Kaydet</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Vazgeç</a>
    </div>
</div>

<!-- Modal Kitap Ekle -->
<div id="modal-kit" class="modal">
    <div class="modal-content">
        <h3 class="heading">Kitap ekle</h3>
        <form action="index.php">
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Kitap adı">
                </div>
                <div class="col s6">
                    <input type="number" placeholder="Yazar No">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="ISBN">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Yayınevi">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="Basım yılı">
                </div>
                <div class="col s6">
                    <input type="number" placeholder="Baskı No">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Dil">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Cilt">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="Sayfa">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Raf Yeri">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Kategori">
                </div>
                <div class="col s6">
                    <input type="number" placeholder="Durum">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat left">Kaydet</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Vazgeç</a>
    </div>
</div>


<!-- Modal Yazar Ekle -->
<div id="modal-yaz" class="modal">
    <div class="modal-content">
        <h3>Yazar ekle</h3>
        <form action="index.php">
            <div class="row">
                <div class="col s12">
                    <input type="text" placeholder="Yazar No">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Ad">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Soyad">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat left">Kaydet</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Vazgeç</a>
    </div>
</div>


<!-- Floating action button(Add record) -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large light-blue accent-4 white-text">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text"
               data-target="modal-odunc" data-position="left" data-tooltip="Odunc ver"><i class="material-icons">control_point</i></a>
        </li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="modal-kit"
               data-position="left" data-tooltip="Kitap ekle"><i class="material-icons">library_books</i></a></li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="modal-yaz"
               data-position="left" data-tooltip="Yazar ekle"><i class="material-icons">person_add</i></i></a></li>
    </ul>
</div>


<script type="text/javascript" src="js/script.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.fixed-action-btn').floatingActionButton();
        $('.dropdown-trigger').dropdown();
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
</body>
</html>
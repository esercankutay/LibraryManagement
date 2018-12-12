<?php
session_start();

$host = 'localhost';
$user = 'cankutay_user';
$dbname = 'cankutay_odev';
$password = '*-123qweasd*-';
$dsn = 'mysql:host='.$host.';dbname='.$dbname;
$pdo = new PDO($dsn,$user,$password);

if(isset($_POST['kit-submit'])){
    try{
        $sql = $pdo->query('insert into kitap values(:yazar_id,:kit_adi,:isbn,:yayinevi,:baski_no,:basim_yili,:dil,:cilt,:sayfa,:rafyeri,:kategori,:durum)');
        $stmt = $pdo->prepare($sql);
        $stmt->exec(array(':yazar_id'=>$_POST['yad'],':kit_adi'=>$_POST['kad'],':isbn'=>$_POST['isbn'],':yayinevi'=>$_POST['yevi'],':baski_no'=>$_POST['bno'],':basim_yili'=>$_POST['byil'],':dil'=>$_POST['dil'],':cilt'=>$_POST['cilt'],':sayfa'=>$_POST['sayfa'],':rafyeri'=>$_POST['rafyer'],':kategori'=>$_POST['kateg'],':durum'=>$_POST['durum']));
    }
    catch (PDOException $e){
        $e->getMessage();
    }
}
if (isset($_POST['']))

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
                    <div class="col s12">
                        <select>
                            <option value="book" selected>Kitaplarda</option>
                            <option value="user">Kullanıcılarda</option>
                            <option value="author">Yazarlarda</option>
                            <option value="borrow">Odünç listesinde</option>
                        </select>
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
            <input type="submit" class="hide" id="odunc-submit">
            <input type="reset" class="hide" id="odunc-reset">
        </form>

    </div>
    <div class="modal-footer">
        <label for="odunc-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="odunc-reset" class="btn light-blue accent-4">Temizle</label>
    </div>
</div>

<!-- Modal Kitap Ekle -->
<div id="modal-kit" class="modal">
    <div class="modal-content">
        <h3 class="heading">Kitap ekle</h3>
        <form action="index.php" method="post" name="kitapekle">
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Kitap adı" name="kad">
                </div>
                <div class="col s6">
                    <input class="modal-trigger" type="number" data-target="modal-yaz" placeholder="Yazar No" name="yad">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="ISBN" name="isbn">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Yayınevi" name="yevi">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="Basım yılı" name="byil">
                </div>
                <div class="col s6">
                    <input type="number" placeholder="Baskı No" name="bno">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Dil" name="dil">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Cilt" name="cilt">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="Sayfa" name="sayfa">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Raf Yeri" name="rafyer">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Kategori" name="kateg">
                </div>
                <div class="col s6">
                    <input type="number" placeholder="Durum" name="durum">
                </div>
            </div>
            <input type="submit" class="hide" id="kit-submit">
            <input type="reset" class="hide" id="kit-reset">
        </form>
    </div>
    <div class="modal-footer">
        <label for="kit-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="kit-reset" class="btn light-blue accent-4">Temizle</label>
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
            <input type="submit" class="hide" id="yaz-submit">
            <input type="reset" class="hide" id="yaz-reset">
        </form>
    </div>
    <div class="modal-footer">
        <label for="yaz-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="yaz-reset" class="btn light-blue accent-4">Temizle</label>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Custom Javascript -->
<script type="text/javascript" src="javascript/javascript.js"></script>
<script>
    $(document).ready(function () {
        $('.fixed-action-btn').floatingActionButton();
        $('.dropdown-trigger').dropdown();
        $('.tooltipped').tooltip();
        $('.modal').modal({classes: 'rounded'});
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
</body>
</html>
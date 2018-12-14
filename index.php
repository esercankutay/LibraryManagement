<?php
session_start();

$host = 'localhost';
$user = 'cankutay_user';
$dbname = 'cankutay_odev';
$password = '*-123qweasd*-';
$charset = 'utf8mb4_turkish_ci';
$dsn = "mysql:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $user, $password);
if(isset($_POST['kit-submit'])){

    kitapekle($_POST['kit_adi'],$_POST['isbn'],$_POST['baski_no'],$_POST['basim_yili'],$_POST['dil'],$_POST['cilt'],$_POST['sayfa'],$_POST['kategori']);
    $durum='rafta';
    echo durum;
    try{
        $sql = $this->pdo->query('insert into kitap (kit_adi, isbn, baski_no, basim_yili,dil,cilt,sayfa,kategori,durum) values(:kit_adi,:isbn,:baski_no,:basim_yili,:dil,:cilt,:sayfa,:kategori,:durum)');
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':kit_adi', $kit_id);$stmt->bindParam(':isbn', $isbn);$stmt->bindParam(':baski_no', $baski_no);
        $stmt->bindParam(':basim_yili', $basim_yili);$stmt->bindParam(':dil', $dil);$stmt->bindParam(':cilt', $cilt);
        $stmt->bindParam(':sayfa', $sayfa);$stmt->bindParam(':kategori', $kategori);$stmt->bindParam(':durum', $durum);
        $stmt->execute($kit_id,$isbn,$baski_no,$basim_yili,$dil,$cilt,$sayfa,$kategori,$durum);
        echo "Kitap eklendi!";
    }
    catch (PDOException $e){
        $e->getMessage($kit_id,$isbn,$baski_no,$basim_yili,$dil,$cilt,$sayfa,$kategori,$durum);
    }
}

$stmt = $pdo->query('SELECT * FROM kitap');
while ($row = $stmt->fetch())
{
    echo $row['kit_adi'] . "\n";
}



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
<header>
    <div class="row s1 l2 center">
        <img id="book" class="responsive-img center" src="asset/book.svg" alt="book svg">
        <h3 class="center white-text">Kütüphanenizi kolayca yönetin!</h3>
    </div>
    <div class="row">
        <div class="col s2 m3 l4"></div>
        <div class="col s4 m6 l4">
            <form action="index.php" method="post">
                <input class="white black-text" type="search" placeholder="Ne aramak istersin?">
            </form>
        </div>
        <div class="col s2 m3 l2 ">
            <select>
                <option value="book" selected>Kitaplarda</option>
                <option value="user">Kullanıcılarda</option>
                <option value="author">Yazarlarda</option>
                <option value="borrow">Odünç listesinde</option>
            </select>
        </div>
    </div>
</header>

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
                    <input type="text" placeholder="Kitap adı" name="kit_adi">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="ISBN" name="isbn">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="number" placeholder="Baskı" name="baski_no">
                </div>
                <div class="col s6">
                    <input type="number" placeholder="Basım yılı" name="basim_yili">
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
                    <input type="text" placeholder="Kategori" name="kategori">
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
<div class="row">
    <div class="col s1 m2 l2"></div>
    <div class="col s10 m8 l8 xl8 offset s1-m2-l2-xl2">
        <ul class="collection with-header">
            <li class="collection-header"><h4>Kitaplar</h4></li>
            <li class="collection-item">Alvin</li>
            <li class="collection-item">Alvin</li>
            <li class="collection-item">Alvin</li>
            <li class="collection-item">Alvin</li>
        </ul>
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
<script>
    $(document).ready(function () {
        $('.fixed-action-btn').floatingActionButton();
        $('.dropdown-trigger').dropdown();
        $('.tooltipped').tooltip();
        $('.modal').modal({classes: 'rounded'});
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('select').formSelect({
            classes: 'white darken-1 white-text '
        });
    });
</script>
</body>
</html>
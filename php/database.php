<?php
$dsn = 'mysql:host=localhost;dbname=cankutay_odev;charset=utf8;';
$username = 'cankutay_user';
$password = '*-123qweasd*-';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo 'Connection failed! Check database status!';
}

$sql = <<<sql
select * from kul_kat;
sql;
$stmt = $connection->query($sql);
$kat = $stmt->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['login-submit'])){
    $sql = <<<sql
select kul_adi,parola from kullanici where kul_adi='{$_POST['loginname']}' and parola = '{$_POST['loginpass']}'
sql;
    $stmt = $connection->query($sql);
    $login = $stmt->fetch(PDO::FETCH_OBJ);
    if ($login){
        $_SESSION['kul_adi'] = $login->kul_adi;
        header("Location:./index.php");
    }
}
if (isset($_POST['logout'])){
    session_unset();
    session_destroy();
}

if (isset($_POST['selectmain'])){
    if($_POST['selectmain']=='kullanici'){$cname='tc';
        $sql = "SELECT * FROM {$_POST['selectmain']} where {$cname} like '%{$_POST['main-search']}%'" ;
    }
    elseif($_POST['selectmain']=='kitap'){$cname='kit_adi';
        $sql = <<<SQL
SELECT kitap.kit_id, kitap.kit_adi, yazar.yad as yazar , yayinevi.yeviad as yayinevi ,kitap.isbn,kitap.basim_yili,kitap.baski_no,kitap.dil,kitap.cilt,kitap.sayfa,kitap.kategori,kitap.durum
FROM kitap WHERE kitap.kit_adi LIKE '%{$_POST['main-search']}%' INNER JOIN
kitapyayinevi ON kitap.kit_id = kitapyayinevi.kit_id INNER JOIN
kitapyazar ON kitap.kit_id = kitapyazar.kit_id INNER JOIN
yayinevi ON kitapyayinevi.yevi_id = yayinevi.yevi_id INNER JOIN
yazar ON kitapyazar.yazar_id = yazar.yazar_id
SQL;
    }
    $stmt = $connection->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}
else{
    $sql = <<<SQL
SELECT kitap.kit_id, kitap.kit_adi, yazar.yad as yazar , yayinevi.yeviad as yayinevi,kitap.isbn,kitap.basim_yili,kitap.baski_no,kitap.dil,kitap.cilt,kitap.sayfa,kitap.kategori,kitap.durum
FROM kitap INNER JOIN
kitapyayinevi ON kitap.kit_id = kitapyayinevi.kit_id INNER JOIN
kitapyazar ON kitap.kit_id = kitapyazar.kit_id INNER JOIN
yayinevi ON kitapyayinevi.yevi_id = yayinevi.yevi_id INNER JOIN
yazar ON kitapyazar.yazar_id = yazar.yazar_id
SQL;
    $stmt = $connection->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}
if (isset($_POST['iade-submit'])){
    $sql = <<<SQL
SELECT * FROM odunc
LEFT JOIN kitap ON odunc.kit_id = kitap.kit_id WHERE odunc.kul_adi='{$_POST['iade-kul-adi']}' AND iade_tar IS NULL
UNION
SELECT * FROM odunc
RIGHT JOIN kitap ON odunc.kit_id = kitap.kit_id WHERE odunc.kul_adi='{$_POST['iade-kul-adi']}' AND iade_tar IS NULL;
SQL;
    $stmt = $connection->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}
if (isset($_POST['odunc-submit'])){
    $sql = <<<SQL
insert into odunc (kul_adi,kit_id,alma_tar) 
values ('{$_POST['odunc_kul_adi']}',{$_POST['odunc_kit_id']},now());
SQL;
    try{
       $connection->query($sql);
    }catch (PDOException $e){
        $e->getMessage();
    }
    $sql = <<<sql
update kitap
set durum='kullanici'
where kit_id={$_POST['odunc_kit_id']}
sql;
    $connection->query($sql);
}
if (isset($_POST['kit-submit'])){
    $sql = <<<SQL
insert into kitap (kit_adi, isbn, baski_no, basim_yili, dil, cilt, sayfa, kategori, durum)
values ('{$_POST['kit_adi']}','{$_POST['isbn']}',{$_POST['baski_no']},{$_POST['basim_yili']},'{$_POST['dil']}','{$_POST['cilt']}',{$_POST['sayfa']},'{$_POST['kategori']}','rafta')
SQL;
    $connection->query($sql);

    $sql = <<<sql
insert into yazar (yad)
value ('{$_POST['kit_yazar']}')
sql;
    $connection->query($sql);

    $sql = <<<sql
insert into yayinevi (yeviad)
value ('{$_POST['kit_yevi']}')
sql;
    $connection->query($sql);


    $stmt = $connection->query("SELECT kit_id FROM kitap ORDER BY kit_id DESC limit 1");
    $kitap = $stmt->fetch(PDO::FETCH_OBJ);


    $stmt = $connection->query("SELECT yazar_id FROM yazar ORDER BY yazar_id DESC limit 1");
    $yazar = $stmt->fetch(PDO::FETCH_OBJ);

    $stmt = $connection->query("SELECT yevi_id FROM yayinevi ORDER BY yevi_id DESC limit 1");
    $yevi = $stmt->fetch(PDO::FETCH_OBJ);

    $sql = <<<sql
insert into kitapyazar (kit_id, yazar_id) 
values ({$kitap->kit_id},{$yazar->yazar_id})
sql;
    $connection->query($sql);


    $sql = <<<sql
insert into kitapyayinevi(yevi_id, kit_id)
values ({$yevi->yevi_id},{$kitap->kit_id})
sql;
    $connection->query($sql);
}
if (isset($_POST['kullanici-ekle-submit'])){
    $sql = <<<sql
insert into kullanici (kul_adi, parola, tc, ad, soyad, kul_tip, tel)
values ('{$_POST['ekle-kul-adi']}','{$_POST['ekle-pass']}','{$_POST['ekle-tc']}','{$_POST['ekle-ad']}','{$_POST['ekle-soyad']}','{$_POST['ekle-unvan']}','{$_POST['ekle-tel']}');
sql;
    $stmt = $connection->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['kul_adi'])&&isset($_GET['kit_id'])&&isset($_GET['alma_tar'])){

    $sql = <<<sql
update kitap,odunc
set odunc.iade_tar= now(),
kitap.durum ='rafta'
where kitap.kit_id = {$_GET['kit_id']} and odunc.alma_tar = '{$_GET['alma_tar']}'
sql;

    $stmt = $connection->query($sql);
}
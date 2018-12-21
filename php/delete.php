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

if (isset($_GET['kit_id'])){
    $sql = <<<sql
delete from kitap where kit_id={$_GET['kit_id']}
sql;
    if ($connection->query($sql)) {
        header("Location: ../");
    }
}
if (isset($_GET['kul_adi'])){
    $sql = <<<sql
delete from kullanici where kul_adi='{$_GET['kul_adi']}'
sql;
    if ($connection->query($sql)) {
        header("Location: ../");
    }
}
?>
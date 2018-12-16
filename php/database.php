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


if (!isset($_POST['selectmain'])){
    $sql = <<<SQL
    select * from kitap;
SQL;
    $stmt = $connection->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}
/*else{
    echo $_POST['selectmain'];
    $sql = <<<SQL
SELECT * FROM ? where ? = ?;
SQL ;
    if($_POST['selectmain']=='kullanici')
        $cname='kul_ad';
    elseif($_POST['selectmain']=='kitap')
        $cname='kit_adi';
    $stmt = $connection->prepare($sql);
    $stmt->execute(array($_POST['selectmain'],$cname,$_POST['selectmain']));
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}*/
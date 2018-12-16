<?php
session_start();

require 'php/database.php';


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
?>
<?php require 'php/header.php'?>
<?php require 'php/body.php'?>
<?php require 'php/modalsAndTriggers.php' ?>
<?php require 'php/footer.php'?>
<?php
$dsn = 'mysql:host=localhost;dbname=cankutay_odev;charset=utf8;';
$username = 'cankutay_user';
$password = '*-123qweasd*-';
$options = [];
$result;
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
else{
    if($_POST['selectmain']=='kullanici'){$cname='tc';}
    elseif($_POST['selectmain']=='kitap'){$cname='kit_adi';}
    $sql = "SELECT * FROM {$_POST['selectmain']} where {$cname} like '%{$_POST['main-search']}%'" ;
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
    echo $_POST['odunc_kul_adi'],$_POST['odunc_kit_id'];
    $sql = <<<SQL
insert into odunc (kul_adi,kit_id,alma_tar) 
values ('{$_POST['odunc_kul_adi']}',{$_POST['odunc_kit_id']},'now()');
SQL;
    try{
        $connection->query($sql);
    }catch (PDOException $e){
        $e->getMessage();
    }

}

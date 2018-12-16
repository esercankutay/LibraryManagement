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
        <form action="index.php" method="post">
            <div class="col s4 m6 l4 pull-s2-m2-l2">
                <input class="white black-text" type="search" name="main-search" placeholder="Ne aramak istersin?">
                <input type="submit" class="hide">
            </div>
            <div class="col s2 m3 l2 ">
                <select name="selectmain" >
                    <option value="kitap" selected>Kitaplarda</option>
                    <option value="kullanici">Kullanıcılarda</option>
                    <option value="odunc">Ödünçlerde</option>
                </select>
            </div>
        </form>
    </div>
</header>
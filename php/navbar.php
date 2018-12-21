<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="php/logout.php">Çıkış</a></li>
</ul>
<nav>
    <div class="nav-wrapper light-blue accent-4">
        <ul class="right">
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="php/logout.php" data-target="dropdown1"><?= $_SESSION['kul_adi'] ?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>
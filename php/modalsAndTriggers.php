<!-- Modal Odunc Ver -->
<div id="modal-odunc" class="modal">
    <div class="modal-content">
        <h3>Odünç ver</h3>
        <form action="index.php" method="post">
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Kullanıcı adı" name="odunc_kul_adi">
                </div>
                <div class="col s6">
                    <input type="text" placeholder="Kitap Numarası" name="odunc_kit_id">
                </div>
            </div>
            <input type="submit" class="hide" id="odunc-submit" name="odunc-submit">
            <input type="reset" class="hide" id="odunc-reset">
        </form>
    </div>
    <div class="modal-footer">
        <label for="odunc-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="odunc-reset" class="btn red accent-4">Temizle</label>
    </div>
</div>

<!-- İade al-->
<div id="iade-al" class="modal">
    <div class="modal-content">
        <h3>İade al</h3>
        <form action="index.php" method="post">
            <div class="row">
                <div class="col s12">
                    <input type="text" placeholder="Kullanıcı adı" name="iade-kul-adi">
                </div>
            </div>
            <input type="submit" class="hide" id="iade-submit" name="iade-submit">
            <input type="reset" class="hide" id="iade-al">
        </form>
    </div>
    <div class="modal-footer">
        <label for="iade-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="iade-al" class="btn red accent-4">Temizle</label>
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
                    <input type="text" placeholder="Yazar" name="kit_yazar">
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <input type="text" placeholder="Yayınevi" name="kit_yevi">
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
            <input type="submit" class="hide" id="kit-submit" name="kit-submit">
            <input type="reset" class="hide" id="kit-reset">
        </form>
    </div>
    <div class="modal-footer">
        <label for="kit-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="kit-reset" class="btn red accent-4">Temizle</label>
    </div>
</div>

<!-- Modal Kullanıcı Ekle -->
<div id="kullanici-ekle" class="modal">
    <div class="modal-content">
        <h3>Kullanıcı Ekle</h3>
        <form action="index.php" method="post">
            <div class="row">
                <div class="col s6 m6 l6">
                    <input type="text" placeholder="Kullanıcı adı" name="ekle-kul-adi">
                    <input type="text" placeholder="TC" name="ekle-tc">
                    <input type="text" placeholder="Ad" name="ekle-ad">
                </div>
                <div class="col s6 m6 l6">
                    <input type="password" placeholder="Parola" name="ekle-pass">
                    <input type="text" placeholder="Soyad" name="ekle-soyad">
                    <input type="text" placeholder="Telefon" name="ekle-tel">
                </div>
            </div>

            <input type="submit" class="hide" id="kullanici-ekle-submit" name="kullanici-ekle-submit">
            <input type="reset" class="hide" id="k-ekle">
        </form>
    </div>
    <div class="modal-footer">
        <label for="kullanici-ekle-submit" class="btn light-blue accent-4 left" >Kaydet</label>
        <label for="k-ekle" class="btn red accent-4">Temizle</label>
    </div>
</div>



<!-- Floating action button(Add record) -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large light-blue accent-4 white-text">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="iade-al"
               data-position="left" data-tooltip="İade al"><i class="material-icons">low_priority</i></i></a></li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text"
               data-target="modal-odunc" data-position="left" data-tooltip="Odunc ver"><i class="material-icons">redo</i></a>
        </li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="modal-kit"
               data-position="left" data-tooltip="Kitap ekle"><i class="material-icons">library_books</i></a></li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="kullanici-ekle"
               data-position="left" data-tooltip="Kullanıcı Ekle"><i class="material-icons">supervised_user_circle</i></i></a></li>
    </ul>
</div>
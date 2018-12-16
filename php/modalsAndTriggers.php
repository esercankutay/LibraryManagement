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
        <label for=""odunc-submit" class=btn light-blue accent-4 left" >Kaydet</label>
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

<!-- Floating action button(Add record) -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large light-blue accent-4 white-text">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text"
               data-target="modal-odunc" data-position="left" data-tooltip="Kullanıcı Listesi"><i class="material-icons">list</i></a>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text"
               data-target="modal-odunc" data-position="left" data-tooltip="Odunc ver"><i class="material-icons">control_point</i></a>
        </li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="modal-kit"
               data-position="left" data-tooltip="Kitap ekle"><i class="material-icons">library_books</i></a></li>
        <li><a class="btn modal-trigger tooltipped btn-floating light-blue accent-4 white-text" data-target="modal-yaz"
               data-position="left" data-tooltip="Yazar ekle"><i class="material-icons">person_add</i></i></a></li>
    </ul>
</div>
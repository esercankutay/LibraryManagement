<?php if (isset($_POST['selectmain'])): ?>
<table class="striped">
    <thead>
    <?php if (!isset($_POST['selectmain']) || $_POST['selectmain'] == 'kitap'): ?>
        <tr>
            <th class="hide">ID</th>
            <th>Kitap Adı</th>
            <th>Yazar</th>
            <th>Yayınevi</th>
            <th>ISBN</th>
            <th>Baski No</th>
            <th>Basim Yılı</th>
            <th>Dil</th>
            <th>Cilt</th>
            <th>Sayfa</th>
            <th>Kategori</th>
            <th>Durum</th>
            <th>Eylem</th>
        </tr>
    <?php elseif ($_POST['selectmain'] == 'kullanici'): ?>
        <tr>
            <th class="hide">ID</th>
            <th>Kullanıcı Adı</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>TC</th>
            <th>Parola</th>
            <th>Tip</th>
            <th>Telefon</th>
            <th>Eylem</th>
        </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php if (!isset($_POST['selectmain']) || $_POST['selectmain'] == 'kitap'): ?>
        <?php foreach ($result as $item): ?>
            <tr>
                <td class="hide"><?= $item->kit_id; ?></td>
                <td><?= $item->kit_adi; ?></td>
                <td><?= $item->yazar; ?></td>
                <td><?= $item->yayinevi; ?></td>
                <td><?= $item->isbn; ?></td>
                <td><?= $item->baski_no; ?></td>
                <td><?= $item->basim_yili; ?></td>
                <td><?= $item->dil; ?></td>
                <td><?= $item->cilt; ?></td>
                <td><?= $item->sayfa; ?></td>
                <td><?= $item->kategori; ?></td>
                <?php
                if ($item->durum == 'rafta') {
                    $num = ceil($item->kit_id / 100);
                    echo "<td>Raf No: " . $num . "</td>";
                } else {
                    echo "<td>".$item->durum."</td>";
                }

                ?>
                <td>
                <a href="index.php?kit_id=<?= $item->kit_id ?>" class="btn light-blue accent-4"><i class="material-icons text-light-blue">edit</i></a>
                <a onclick="return confirm('Silmek istediğine emin misin?')" href="php/delete.php?kit_id=<?= $item->kit_id ?>" class='btn red'><i class="material-icons red">delete</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php elseif ($_POST['selectmain'] == 'kullanici'): ?>
        <?php foreach ($result as $item): ?>
            <tr>
                <td class="hide"><?= $item->kit_id; ?></td>
                <td><?= $item->kul_adi; ?></td>
                <td><?= $item->ad; ?></td>
                <td><?= $item->soyad; ?></td>
                <td><?= $item->tc; ?></td>
                <td><?= $item->parola; ?></td>
                <td><?= $item->kul_tip; ?></td>
                <td><?= $item->tel; ?></td>
                </td>
                <td>
                <a onclick="" href="index.php?kul_adi=<?= $item->kul_adi  ?>" class="btn light-blue accent-4"><i class="material-icons">edit</i></a>
                <a onclick="return confirm('Silmek istediğine emin misin?')" href="php/delete.php?kul_adi=<?= $item->kul_adi  ?>" class='btn red'><i class="material-icons red">delete</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<?php endif; ?>

<?php if (isset($_POST['iade-submit'])): ?>
    <table>
        <thead>
        <tr>
            <td>Kullanıcı adı</td>
            <td>Kitap adı</td>
            <td>Kitap ID</td>
            <td>Alma Tarihi</td>
            <td>Ceza</td>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $item): ?>
            <tr>
                <td><?= $item->kul_adi; ?></td>
                <td><?= $item->kit_adi; ?></td>
                <td><?= $item->kit_id; ?></td>
                <td><?= $item->alma_tar; ?></td>
                <?php
                $date2 = date_create()->format('Y-m-d');
                $date1 = date($item->alma_tar);
                $diff = abs(strtotime($date2) - strtotime($date1));
                $gun = $diff/86400;
                if ($gun<7)
                    echo '<td>' . '0' . '</td>';
                else
                    echo '<td>' . ($gun-7) . '₺</td>';

                ?>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if (isset($_GET['kit_id'])):
    $sql = <<<sql
select * from kitap where kit_id = {$_GET['kit_id']}
sql;
    ?>
    <!-- Modal Kitap Ekle -->
    <div id="duz-kit" class="modal">
        <div class="modal-content">
            <h3 class="heading">Kitabı ekle</h3>
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
<?php endif; ?>

<?php if (isset($_GET['kul_adi'])): ?>

<?php endif; ?>

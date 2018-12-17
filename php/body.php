<?php if (isset($_POST['selectmain'])): ?>
<table class="striped">
    <thead>
    <?php if (!isset($_POST['selectmain']) || $_POST['selectmain'] == 'kitap'): ?>
        <tr>
            <th class="hide">ID</th>
            <th>Kitap Adı</th>
            <th>ISBN</th>
            <th>Baski No</th>
            <th>Basim Yılı</th>
            <th>Dil</th>
            <th>Cilt</th>
            <th>Sayfa</th>
            <th>Kategori</th>
            <th>Durum</th>
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
        </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php if (!isset($_POST['selectmain']) || $_POST['selectmain'] == 'kitap'): ?>
        <?php foreach ($result as $item): ?>
            <tr>
                <td class="hide"><?= $item->kit_id; ?></td>
                <td><?= $item->kit_adi; ?></td>
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
                    echo $item->durum;
                }

                ?>
                <!--<td>
                <a href="edit.php?id=<? /*= $person->id */ ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<? /*= $person->id */ ?>" class='btn btn-danger'>Delete</a>
        </td>-->
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
                <!--<td>
                <a href="edit.php?id=<? /*= $person->id */ ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<? /*= $person->id */ ?>" class='btn btn-danger'>Delete</a>
        </td>-->
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
                <td><?= $item->isbn; ?></td>
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

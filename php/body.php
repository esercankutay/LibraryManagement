<table class="striped">
    <thead>
        <?php if (!isset($_POST['selectmain'])): ?>
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
        <?php elseif ($_POST['selectmain']=='kullanıcı'): ?>
            <tr>
                <th class="hide">ID</th>
                <th>Kullanıcı Adı</th>
                <th>ISBN</th>
                <th>Baski No</th>
                <th>Basim Yılı</th>
                <th>Dil</th>
                <th>Cilt</th>
                <th>Sayfa</th>
                <th>Kategori</th>
                <th>Durum</th>
            </tr>
        <?php endif; ?>
    </thead>
    <tbody>
    <tr>
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
        <td><?= $item->durum; ?></td>
        <!--<td>
                <a href="edit.php?id=<?/*= $person->id */?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?/*= $person->id */?>" class='btn btn-danger'>Delete</a>
        </td>-->
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
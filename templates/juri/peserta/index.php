<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Peserta <?= session()->get('kategori')->name ?></h1>
</div>

<?php if($msg = session()->get_flash('success')): ?>
<div class="alert alert-success" role="alert">
    <?=$msg?>
</div>
<?php endif ?>

<?php if($msg = session()->get_flash('fail')): ?>
<div class="alert alert-danger" role="alert">
    <?=$msg?>
</div>
<?php endif ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Urut</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($participants)): ?>
            <tr>
                <td colspan="6"><i>Tidak ada data</i></td>
            </tr>
            <?php endif ?>
            <?php foreach($participants as $key => $participant): ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$participant->name?></td>
                <td><?=$participant->gender?></td>
                <td><?=$participant->order_number?></td>
                <td><?=$participant->score??0?></td>
                <td>
                    <?php if($participant->score == null): ?>
                    <a href="index.php?r=juri/peserta/nilai&id=<?=$participant->id?>" class="btn btn-sm btn-warning">Nilai</a>
                    <?php else: ?>
                    <i>Sudah di nilai</i><br>
                    <a href="index.php?r=juri/peserta/print&id=<?=$participant->id?>" class="btn btn-sm btn-warning">Cetak</a>
                    <?php endif ?>
                    <?php if($participant->status == "tampil" ):?>
                        <a href="index.php?r=juri/peserta/show&id=<?=$participant->id?>" class="btn btn-sm btn-warning">Tampilkan Nilai</a>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
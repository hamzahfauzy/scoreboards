<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kategori</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            <a href="index.php?r=admin/kategori/create" class="btn btn-sm btn-primary">+ Tambah</a>
        </div>
    </div>
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($categories)): ?>
            <tr>
                <td colspan="3"><i>Tidak ada data</i></td>
            </tr>
            <?php endif ?>
            <?php foreach($categories as $key => $category): ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$category->name?></td>
                <td>
                    <a href="index.php?r=admin/kategori/edit&id=<?=$category->id?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?r=admin/kategori/delete&id=<?=$category->id?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
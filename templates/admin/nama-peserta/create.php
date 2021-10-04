<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Nama Peserta</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php?r=admin/nama-peserta" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>

<?php if($msg = session()->get_flash('fail')): ?>
<div class="alert alert-danger" role="alert">
    <?=$msg?>
</div>
<?php endif ?>

<form action="" method="post" class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
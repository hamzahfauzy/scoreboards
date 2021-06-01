<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Juri</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php?r=admin/juri" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>

<form action="" method="post" class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="name" value="<?=$user->name?>" required>
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" value="<?=$user->email?>" required>
    </div>
    <div class="mb-3">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
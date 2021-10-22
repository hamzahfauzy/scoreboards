<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Setting</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php?r=admin" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>

<form action="" method="post" class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">Font Size</label>
        <input type="text" class="form-control" value="<?=$data->font_size?>" name="font_size" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
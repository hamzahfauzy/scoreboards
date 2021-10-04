<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Peserta</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php?r=admin/peserta" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>

<form action="" method="post" class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">Kategori Lomba</label>
        <select name="category_id" class="form-control" required>
            <option value="">- Pilih -</option>
            <?php foreach($categories as $category): ?>
            <option value="<?=$category->id?>"><?=$category->name?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Nama</label>
        <select name="name" class="form-control" required>
            <option value="">- Pilih -</option>
            <?php foreach($participant_names as $participant): ?>
            <option value="<?=$participant->name?>"><?=$participant->name?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Jenis Kelamin</label>
        <select name="gender" class="form-control" required>
            <option value="">- Pilih -</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Campuran">Campuran</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="">No Urut</label>
        <input type="number" class="form-control" name="order_number" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
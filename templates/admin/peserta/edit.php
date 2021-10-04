<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Peserta</h1>
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
            <option value="<?=$category->id?>" <?=$participant->category_id==$category->id?'selected=""':''?>><?=$category->name?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Nama</label>
        <select name="name" class="form-control" required>
            <option value="">- Pilih -</option>
            <?php foreach($participant_names as $p): ?>
            <option value="<?=$p->name?>" <?=$participant->name==$p->name?'selected=""':''?>><?=$p->name?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="">Jenis Kelamin</label>
        <select name="gender" class="form-control" required>
            <option value="">- Pilih -</option>
            <option value="Laki-laki" <?=$participant->gender=='Laki-laki'?'selected=""':''?>>Laki-laki</option>
            <option value="Perempuan" <?=$participant->gender=='Perempuan'?'selected=""':''?>>Perempuan</option>
            <option value="Campuran" <?=$participant->gender=='Campuran'?'selected=""':''?>>Campuran</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="">No Urut</label>
        <input type="number" class="form-control" name="order_number" value="<?=$participant->order_number?>" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
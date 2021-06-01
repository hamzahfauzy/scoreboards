<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Nilai Peserta</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php?r=admin/peserta" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>

<form action="" method="post" class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">Nama Peserta</label>
        <input type="text" class="form-control" readonly value="<?=$participant->name?>">
    </div>
    <div class="mb-3">
        <label for="">No Urut</label>
        <input type="text" class="form-control" readonly value="<?=$participant->order_number?>">
    </div>
    <div class="mb-3">
        <label for="">Nilai</label>
        <input type="number" class="form-control" name="score" min="1" max="10" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
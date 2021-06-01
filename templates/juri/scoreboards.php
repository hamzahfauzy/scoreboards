<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Scoreboards</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
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
                <th>Jenis Kelamin</th>
                <th>Nomor Urut</th>
                <th>Total Skor</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($participants)): ?>
            <tr>
                <td colspan="5"><i>Tidak ada data</i></td>
            </tr>
            <?php endif ?>
            <?php foreach($participants as $key => $participant): ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$participant->name?></td>
                <td><?=$participant->gender?></td>
                <td><?=$participant->order_number?></td>
                <td><?=$participant->total_score??0?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
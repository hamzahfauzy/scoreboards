<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Scoreboards</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php?r=admin/cleanboards" class="btn btn-sm btn-danger">Clean Records</a>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="exportTableToExcel('scoreboards_data', 'Hasil Score')">Export</button>
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
    <table class="table table-bordered table-striped" id="scoreboards_data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Urut</th>
                <th>Total Skor</th>
                <th>Emas</th>
                <th>Perak</th>
                <th>Perunggu</th>
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
                <td><?php if($participant->total_score >= 80)echo "1";else echo "0" ?></td>
                <td><?php if($participant->total_score >= 65 && $participant->total_score <= 79.99)echo "1";else echo "0"  ?></td>
                <td><?php if($participant->total_score <= 65 && $participant->total_score >= 0.01)echo "1";else echo "0"  ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
function exportTableToExcel(e,a=""){var l,n="application/vnd.ms-excel",o=document.getElementById(e).outerHTML.replace(/ /g,"%20");a=a?a+".xls":"excel_data.xls",l=document.createElement("a"),document.body.appendChild(l),navigator.msSaveOrOpenBlob?(e=new Blob(["\ufeff",o],{type:n}),navigator.msSaveOrOpenBlob(e,a)):(l.href="data:"+n+", "+o,l.download=a,l.click())}
</script>
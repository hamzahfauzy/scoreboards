<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Nilai Peserta</h1>
</div>

<div class="col-12 col-md-6">
    <div class="mb-3">
        <label for="">Nama : <b><?=$participant->name?></b></label>
    </div>
    <div class="mb-3">
        <label for="">Kategori Lomba : <b><?= session()->get('kategori')->name ?></b></label>
    </div>
    <div class="mb-3">
        <label for="">Jenis Kelamin : <b><?=$participant->gender?></b></label>
    </div>
    <div>
        <table border="1" width="100%">
            <tr>
                <?php
                $skor = unserialize($valuation->score_serialize);
                foreach($skor as $key => $value): 
                ?>
                <td>JURI <?=($key+1)?></td>
                <?php endforeach ?>
                <td>TOTAL NILAI</td>
            </tr>
            <tr>
                <?php foreach($skor as $key => $value): ?>
                <td><?=$value?></td>
                <?php endforeach ?>
                <td><?=$valuation->score?></td>
            </tr>
        </table>
        <br><br><br><br>
        <table>
            <tr>
                <?php foreach($skor as $key => $value): ?>
                <td>JURI <?=($key+1)?></td>
                <?php endforeach ?>
            </tr>
        </table>
    </div>
</div>
<script>window.print()</script>
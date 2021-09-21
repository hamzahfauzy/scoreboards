<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->update('participants',[
    'status'      => "selesai",
],[
    'id' => $_GET['id']
]);

return redirect()->route('juri/peserta')->withMessage('success','Data Berhasil Ditampilkan!');


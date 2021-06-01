<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('participants',[
    'id' => $_GET['id']
]);

return redirect()->route('admin/peserta')->withMessage('success','Data Berhasil Dihapus!');
<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('participant_names',[
    'id' => $_GET['id']
]);

return redirect()->route('admin/nama-peserta')->withMessage('success','Data Berhasil Dihapus!');
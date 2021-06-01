<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('users',[
    'id' => $_GET['id']
]);

return redirect()->route('admin/juri')->withMessage('success','Data Berhasil Dihapus!');
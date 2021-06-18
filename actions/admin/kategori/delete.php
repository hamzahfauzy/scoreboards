<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('categories',[
    'id' => $_GET['id']
]);

return redirect()->route('admin/kategori')->withMessage('success','Data Berhasil Dihapus!');
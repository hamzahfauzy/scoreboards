<?php
$conn = get_connection();
$db   = new src\Database($conn);

$participants = $db->all('categories');

return view('admin/kategori/index',[
    'categories' => $participants
]);
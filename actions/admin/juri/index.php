<?php
$conn = get_connection();
$db   = new src\Database($conn);

$users = $db->all('users',[
    'level' => 'juri'
]);

return view('admin/juri/index',[
    'users' => $users
]);
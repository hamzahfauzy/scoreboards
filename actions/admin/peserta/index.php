<?php
$conn = get_connection();
$db   = new src\Database($conn);

$participants = $db->all('participants',[],[
    'order_number' => 'ASC'
]);

return view('admin/peserta/index',[
    'participants' => $participants
]);
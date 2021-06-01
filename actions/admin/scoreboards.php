<?php
$conn = get_connection();
$db   = new src\Database($conn);

$participants = $db->all('participants',[],[
    'total_score' => 'DESC',
    'order_number' => 'ASC'
]);

return view('admin/scoreboards',[
    'participants' => $participants
]);
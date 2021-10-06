<?php
$conn = get_connection();
$db   = new src\Database($conn);

$participants = $db->all('participants',[
    'category_id' => session()->get('kategori')->id
],[
    'total_score' => 'DESC',
    'order_number' => 'ASC'
]);

return view('juri/scoreboards',[
    'participants' => $participants
]);
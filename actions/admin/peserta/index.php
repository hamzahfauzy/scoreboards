<?php
$conn = get_connection();
$db   = new src\Database($conn);

$query = "SELECT participants.*, categories.name cat_name, categories.id cat_id FROM participants JOIN categories ON categories.id = participants.category_id ORDER BY order_number ASC";
$db->query = $query;

$participants = $db->exec('all');

// return $participants;

// $participants = $db->all('participants',[],[
//     'order_number' => 'ASC'
// ]);

return view('admin/peserta/index',[
    'participants' => $participants
]);
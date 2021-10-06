<?php
$conn = get_connection();
$db   = new src\Database($conn);

// $participants = $db->all('participants',[],[
//     'total_score' => 'DESC',
//     'order_number' => 'ASC'
// ]);

$query = "SELECT participants.*, categories.name cat_name, categories.id cat_id FROM participants JOIN categories ON categories.id = participants.category_id ORDER BY total_score DESC, order_number ASC";
$db->query = $query;

$participants = $db->exec('all');

return view('admin/scoreboards',[
    'participants' => $participants
]);
<?php
$conn = get_connection();
$db   = new src\Database($conn);
$user = session()->get('user');
$query = "SELECT p.*, v.score, v.id as val_id, categories.name cat_name, categories.id cat_id FROM participants p JOIN categories ON categories.id = p.category_id LEFT JOIN valuations v ON v.participant_id = p.id AND v.user_id = $user->id WHERE p.category_id = ".session()->get('kategori')->id." ORDER BY order_number ASC";
$db->query = $query;
$participants = $db->exec('all');

return view('juri/peserta/index',[
    'participants' => $participants
]);
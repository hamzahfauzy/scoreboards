<?php
$conn = get_connection();
$db   = new src\Database($conn);
$user = session()->get('user');
$query = "SELECT p.*,v.score FROM participants p LEFT JOIN valuations v ON v.participant_id = p.id AND v.user_id = $user->id ORDER BY order_number ASC";
$db->query = $query;
$participants = $db->exec('all');

return view('juri/peserta/index',[
    'participants' => $participants
]);
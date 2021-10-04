<?php
$conn = get_connection();
$db   = new src\Database($conn);

$participants = $db->all('participant_names');

return view('admin/nama-peserta/index',[
    'participants' => $participants
]);